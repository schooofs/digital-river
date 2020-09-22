<?php

namespace DigitalRiver\Admin\Menu;

class Options
{


    /*** Sections Array ***/
    private $sections_array = array();

    /*** Fields Array ***/
    private $fields_array = array();

    /*** Constructor ***/
    public function __construct() {

    }

    public function instance()
    {
        // Enqueue admin scripts
        add_action( 'admin_enqueue_scripts', array( $this, 'admin_scripts' ) );
        // Hook it up
        add_action( 'admin_init', array( $this, 'admin_init' ) );
        // Menu
        add_action( 'admin_menu', array( $this, 'admin_menu' ) );
    }

    /*** Admin Scripts ***/
    public function admin_scripts() {
        // jQuery
        wp_enqueue_script( 'jquery' );
        // Color Picker
        wp_enqueue_script(
            'iris',
            admin_url( 'js/iris.min.js' ),
            array( 'jquery-ui-draggable', 'jquery-ui-slider', 'jquery-touch-punch' ),
            false,
            1
        );
        // Media Uploader
        wp_enqueue_media();
    }

    /*** Set Sections ***/
    public function set_sections( $sections ) {
        // Bail if not array.
        if ( ! is_array( $sections ) ) {
            return false;
        }
        // Assign to sections array
        $this->sections_array = $sections;
        return $this;
    }

    /*** Add Single Section ***/
    public function add_section( $section ) {
        // Bail if not array.
        if ( ! is_array( $section ) ) {
            return false;
        }
        // Assign the section to sections array.
        $this->sections_array[] = $section;
        return $this;
    }

    /*** Set Fields ***/
    public function set_fields( $fields ) {
        // Bail if not array
        if ( ! is_array( $fields ) ) {
            return false;
        }
        // Assign the fields
        $this->fields_array = $fields;
        return $this;
    }

    /*** Add Single Field ***/
    public function add_field( $section, $field_array ) {
        // Set the defaults
        $defaults = array(
            'id'   => '',
            'name' => '',
            'desc' => '',
            'type' => 'text',
        );
        // Combine the defaults with user arguements
        $arg = wp_parse_args( $field_array, $defaults );
        // Each field is an array named against its section
        $this->fields_array[ $section ][] = $arg;
        return $this;
    }

    /*** Initialize API ***/
    function admin_init() {
        // Register sections
        foreach ( $this->sections_array as $section ) {
            if ( false == get_option( $section['id'] ) ) {
                // Add a new field as section ID.
                add_option( $section['id'] );
            }
            // Section description
            if ( isset( $section['desc'] ) && ! empty( $section['desc'] ) ) {
                // Build HTML.
                $section['desc'] = '<div class="inside">' . $section['desc'] . '</div>';
                // Create the callback for description.
                $callback = function() use ( $section ) {
                    echo str_replace( '"', '\"', $section['desc'] );
                };
            } elseif ( isset( $section['callback'] ) ) {
                $callback = $section['callback'];
            } else {
                $callback = null;
            }

            /*** Add a new section to a settings page ***/
            add_settings_section( $section['id'], $section['title'], $callback, $section['id'] );
        }

        /*** Register Field Settings ***/
        foreach ( $this->fields_array as $section => $field_array ) {
            foreach ( $field_array as $field ) {
                // ID
                $id = isset( $field['id'] ) ? $field['id'] : false;
                // Type
                $type = isset( $field['type'] ) ? $field['type'] : 'text';
                // Name
                $name = isset( $field['name'] ) ? $field['name'] : 'No Name Added';
                // Label for
                $label_for = "{$section}[{$field['id']}]";
                // Description
                $description = isset( $field['desc'] ) ? $field['desc'] : '';
                // Size
                $size = isset( $field['size'] ) ? $field['size'] : null;
                // Options
                $options = isset( $field['options'] ) ? $field['options'] : '';
                // Standard default value
                $default = isset( $field['default'] ) ? $field['default'] : '';
                // Standard default placeholder
                $placeholder = isset( $field['placeholder'] ) ? $field['placeholder'] : '';
                // Sanitize Callback
                $sanitize_callback = isset( $field['sanitize_callback'] ) ? $field['sanitize_callback'] : '';

                $args = array(
                    'id'                => $id,
                    'type'              => $type,
                    'name'              => $name,
                    'label_for'         => $label_for,
                    'desc'              => $description,
                    'section'           => $section,
                    'size'              => $size,
                    'options'           => $options,
                    'std'               => $default,
                    'placeholder'       => $placeholder,
                    'sanitize_callback' => $sanitize_callback,
                );

                /*** Add a New Field to Section Setting ***/
                $field_id = $section . '[' . $field['id'] . ']';

                add_settings_field(
                    $field_id,
                    $name,
                    array( $this, 'callback_' . $type ),
                    $section,
                    $section,
                    $args
                );
            }
        }

        // Create settings in the fields table.
        foreach ( $this->sections_array as $section ) {
            /*** Registers a setting and its sanitization callback ***/
            register_setting( $section['id'], $section['id'], array( $this, 'sanitize_fields' ) );
        }
    }

    /*** Sanitize callback for Settings API fields ***/
    public function sanitize_fields( $fields ) {
        foreach ( $fields as $field_slug => $field_value ) {
            $sanitize_callback = $this->get_sanitize_callback( $field_slug );

            // If callback is set, call it.
            if ( $sanitize_callback ) {
                $fields[ $field_slug ] = call_user_func( $sanitize_callback, $field_value );
                continue;
            }
        }
        return $fields;
    }

    /*** Get sanitization callback for given option slug ***/
    function get_sanitize_callback( $slug = '' ) {
        if ( empty( $slug ) ) {
            return false;
        }

        // Iterate over registered fields and see if we can find proper callback.
        foreach ( $this->fields_array as $section => $field_array ) {
            foreach ( $field_array as $field ) {
                if ( $field['name'] != $slug ) {
                    continue;
                }

                // Return the callback name.
                return isset( $field['sanitize_callback'] ) && is_callable( $field['sanitize_callback'] ) ? $field['sanitize_callback'] : false;
            }
        }
        return false;
    }


    /*** Get field description for display ***/
    public function get_field_description( $args ) {
        if ( ! empty( $args['desc'] ) ) {
            $desc = sprintf( '<p class="description">%s</p>', $args['desc'] );
        } else {
            $desc = '';
        }
        return $desc;
    }

    /*** Displays a title field for a settings field ***/
    function callback_title( $args ) {
        $value = esc_attr( $this->get_option( $args['id'], $args['section'], $args['std'] ) );
        if ( '' !== $args['name'] ) {
            $name = $args['name'];
        } else {
        };
        $type = isset( $args['type'] ) ? $args['type'] : 'title';

        $html = '';
        echo $html;
    }


    /*** Displays a text field for a settings field ***/
    function callback_text( $args ) {

        $value = esc_attr( $this->get_option( $args['id'], $args['section'], $args['std'], $args['placeholder'] ) );
        $size  = isset( $args['size'] ) && ! is_null( $args['size'] ) ? $args['size'] : 'regular';
        $type  = isset( $args['type'] ) ? $args['type'] : 'text';

        $html  = sprintf( '<input type="%1$s" class="%2$s-text" id="%3$s[%4$s]" name="%3$s[%4$s]" value="%5$s"placeholder="%6$s"/>', $type, $size, $args['section'], $args['id'], $value, $args['placeholder'] );
        $html .= $this->get_field_description( $args );

        echo $html;
    }


    /***  Displays a url field for a settings field ***/
    function callback_url( $args ) {
        $this->callback_text( $args );
    }

    /*** Displays a number field for a settings field ***/
    function callback_number( $args ) {
        $this->callback_text( $args );
    }

    /*** Displays a checkbox for a settings field ***/
    function callback_checkbox( $args ) {

        $value = esc_attr( $this->get_option( $args['id'], $args['section'], $args['std'] ) );

        $html  = '<fieldset>';
        $html .= sprintf( '<label for="wposa-%1$s[%2$s]">', $args['section'], $args['id'] );
        $html .= sprintf( '<input type="hidden" name="%1$s[%2$s]" value="off" />', $args['section'], $args['id'] );
        $html .= sprintf( '<input type="checkbox" class="checkbox" id="wposa-%1$s[%2$s]" name="%1$s[%2$s]" value="on" %3$s />', $args['section'], $args['id'], checked( $value, 'on', false ) );
        $html .= sprintf( '%1$s</label>', $args['desc'] );
        $html .= '</fieldset>';

        echo $html;
    }

    /*** Displays a multicheckbox a settings field ***/
    function callback_multicheck( $args ) {

        $value = $this->get_option( $args['id'], $args['section'], $args['std'] );

        $html = '<fieldset>';
        foreach ( $args['options'] as $key => $label ) {
            $checked = isset( $value[ $key ] ) ? $value[ $key ] : '0';
            $html   .= sprintf( '<label for="wposa-%1$s[%2$s][%3$s]">', $args['section'], $args['id'], $key );
            $html   .= sprintf( '<input type="checkbox" class="checkbox" id="wposa-%1$s[%2$s][%3$s]" name="%1$s[%2$s][%3$s]" value="%3$s" %4$s />', $args['section'], $args['id'], $key, checked( $checked, $key, false ) );
            $html   .= sprintf( '%1$s</label><br>', $label );
        }
        $html .= $this->get_field_description( $args );
        $html .= '</fieldset>';

        echo $html;
    }

    /*** Displays a multicheckbox a settings field ***/
    function callback_radio( $args ) {

        $value = $this->get_option( $args['id'], $args['section'], $args['std'] );

        $html = '<fieldset>';
        foreach ( $args['options'] as $key => $label ) {
            $html .= sprintf( '<label for="wposa-%1$s[%2$s][%3$s]">', $args['section'], $args['id'], $key );
            $html .= sprintf( '<input type="radio" class="radio" id="wposa-%1$s[%2$s][%3$s]" name="%1$s[%2$s]" value="%3$s" %4$s />', $args['section'], $args['id'], $key, checked( $value, $key, false ) );
            $html .= sprintf( '%1$s</label><br>', $label );
        }
        $html .= $this->get_field_description( $args );
        $html .= '</fieldset>';

        echo $html;
    }

    /*** Displays a selectbox for a settings field ***/
    function callback_select( $args ) {

        $value = esc_attr( $this->get_option( $args['id'], $args['section'], $args['std'] ) );
        $size  = isset( $args['size'] ) && ! is_null( $args['size'] ) ? $args['size'] : 'regular';

        $html = sprintf( '<select class="%1$s" name="%2$s[%3$s]" id="%2$s[%3$s]">', $size, $args['section'], $args['id'] );
        foreach ( $args['options'] as $key => $label ) {
            $html .= sprintf( '<option value="%s"%s>%s</option>', $key, selected( $value, $key, false ), $label );
        }
        $html .= sprintf( '</select>' );
        $html .= $this->get_field_description( $args );

        echo $html;
    }

    /*** Displays a textarea for a settings field ***/
    function callback_textarea( $args ) {

        $value = esc_textarea( $this->get_option( $args['id'], $args['section'], $args['std'] ) );
        $size  = isset( $args['size'] ) && ! is_null( $args['size'] ) ? $args['size'] : 'regular';

        $html  = sprintf( '<textarea rows="5" cols="55" class="%1$s-text" id="%2$s[%3$s]" name="%2$s[%3$s]">%4$s</textarea>', $size, $args['section'], $args['id'], $value );
        $html .= $this->get_field_description( $args );

        echo $html;
    }

    /*** Displays a textarea for a settings field ***/
    function callback_html( $args ) {
        echo $this->get_field_description( $args );
    }

    /*** Displays a rich text textarea for a settings field ***/
    function callback_wysiwyg( $args ) {

        $value = $this->get_option( $args['id'], $args['section'], $args['std'] );
        $size  = isset( $args['size'] ) && ! is_null( $args['size'] ) ? $args['size'] : '500px';

        echo '<div style="max-width: ' . $size . ';">';

        $editor_settings = array(
            'teeny'         => true,
            'textarea_name' => $args['section'] . '[' . $args['id'] . ']',
            'textarea_rows' => 10,
        );
        if ( isset( $args['options'] ) && is_array( $args['options'] ) ) {
            $editor_settings = array_merge( $editor_settings, $args['options'] );
        }

        wp_editor( $value, $args['section'] . '-' . $args['id'], $editor_settings );

        echo '</div>';

        echo $this->get_field_description( $args );
    }

    /*** Displays a file upload field for a settings field ***/
    function callback_file( $args ) {

        $value = esc_attr( $this->get_option( $args['id'], $args['section'], $args['std'] ) );
        $size  = isset( $args['size'] ) && ! is_null( $args['size'] ) ? $args['size'] : 'regular';
        $id    = $args['section'] . '[' . $args['id'] . ']';
        $label = isset( $args['options']['button_label'] ) ?
            $args['options']['button_label'] :
            __( 'Choose File' );

        $html  = sprintf( '<input type="text" class="%1$s-text wpsa-url" id="%2$s[%3$s]" name="%2$s[%3$s]" value="%4$s"/>', $size, $args['section'], $args['id'], $value );
        $html .= '<input type="button" class="button wpsa-browse" value="' . $label . '" />';
        $html .= $this->get_field_description( $args );

        echo $html;
    }

    /*** Displays an image upload field with a preview ***/
    function callback_image( $args ) {

        $value = esc_attr( $this->get_option( $args['id'], $args['section'], $args['std'] ) );
        $size  = isset( $args['size'] ) && ! is_null( $args['size'] ) ? $args['size'] : 'regular';
        $id    = $args['section'] . '[' . $args['id'] . ']';
        $label = isset( $args['options']['button_label'] ) ?
            $args['options']['button_label'] :
            __( 'Choose Image' );

        $html  = sprintf( '<input type="text" class="%1$s-text wpsa-url" id="%2$s[%3$s]" name="%2$s[%3$s]" value="%4$s"/>', $size, $args['section'], $args['id'], $value );
        $html .= '<input type="button" class="button wpsa-browse" value="' . $label . '" />';
        $html .= $this->get_field_description( $args );
        $html .= '<p class="wpsa-image-preview"><img src=""/></p>';

        echo $html;
    }

    /*** Displays a password field for a settings field ***/
    function callback_password( $args ) {

        $value = esc_attr( $this->get_option( $args['id'], $args['section'], $args['std'] ) );
        $size  = isset( $args['size'] ) && ! is_null( $args['size'] ) ? $args['size'] : 'regular';

        $html  = sprintf( '<input type="password" class="%1$s-text" id="%2$s[%3$s]" name="%2$s[%3$s]" value="%4$s"/>', $size, $args['section'], $args['id'], $value );
        $html .= $this->get_field_description( $args );

        echo $html;
    }

    /***  Displays a color picker field for a settings field ***/
    function callback_color( $args ) {

        $value = esc_attr( $this->get_option( $args['id'], $args['section'], $args['std'], $args['placeholder'] ) );
        $size  = isset( $args['size'] ) && ! is_null( $args['size'] ) ? $args['size'] : 'regular';

        $html  = sprintf( '<input type="text" class="%1$s-text color-picker" id="%2$s[%3$s]" name="%2$s[%3$s]" value="%4$s" data-default-color="%5$s" placeholder="%6$s" />', $size, $args['section'], $args['id'], $value, $args['std'], $args['placeholder'] );
        $html .= $this->get_field_description( $args );

        echo $html;
    }


    /*** Displays a separator field for a settings field ***/
    function callback_separator( $args ) {
        $type = isset( $args['type'] ) ? $args['type'] : 'separator';

        $html  = '';
        $html .= '<div class="wpsa-settings-separator"></div>';
        echo $html;
    }


    /*** Get the value of a settings field ***/
    function get_option( $option, $section, $default = '' ) {

        $options = get_site_option( $section );

        if ( isset( $options[ $option ] ) ) {
            return $options[ $option ];
        }

        return $default;
    }

    /*** Add to menu ***/
    // public function admin_menu( $page_title = 'Page Title', $menu_title = 'Menu Title', $capability = 'manage_options', $menu_slug = 'settings_page', $callable = 'plugin_page' ) {
    public function admin_menu() {
        // add_options_page( $page_title, $menu_title, $capability, $menu_slug, array( $this, $callable ) );
        add_menu_page(
            'Digital River', // page_title
            'Digital River', // menu_title
            'manage_options', // capability
            'digital-river', // menu_slug
            array( $this, 'plugin_page' ), // function
            'dashicons-chart-bar', // icon_url
            66 // position
        );
    }

    public function plugin_page() {
        echo '<div class="wrap">';
        echo '<h1>Digital River <span style="font-size:50%;">Marshmallow v1.0</span></h1>';
        $this->show_navigation();
        $this->show_forms();
        echo '</div>';
    }

    /*** Show navigation as tab ***/
    function show_navigation() {
        $html = '<h2 class="nav-tab-wrapper">';

        foreach ( $this->sections_array as $tab ) {
            $html .= sprintf( '<a href="#%1$s" class="nav-tab" id="%1$s-tab">%2$s</a>', $tab['id'], $tab['title'] );
        }

        $html .= '</h2>';

        echo $html;
    }

    /*** Show the section settings forms - This function displays every sections in a different form ***/
    function show_forms() {
        ?>
        <div class="metabox-holder">
            <?php foreach ( $this->sections_array as $form ) { ?>
                <!-- style="display: none;" -->
                <div id="<?php echo $form['id']; ?>" class="group" >
                    <form method="post" action="options.php">
                        <?php
                        do_action( 'wsa_form_top_' . $form['id'], $form );
                        settings_fields( $form['id'] );
                        do_settings_sections( $form['id'] );
                        do_action( 'wsa_form_bottom_' . $form['id'], $form );
                        ?>
                        <?php submit_button(null, 'primary', 'submit_'.$form['id']); ?>
                    </form>
                </div>
            <?php } ?>
        </div>
        <?php
        $this->script();
    }

    /*** Tabs, Color Picker, Local Storage ***/
    function script() {
        ?>
        <script>
            jQuery( document ).ready( function( $ ) {

                //Initiate Color Picker.
                $('.color-picker').iris();

                // Switches option sections
                $( '.group' ).hide();
                var activetab = '';
                if ( 'undefined' != typeof localStorage ) {
                    activetab = localStorage.getItem( 'activetab' );
                }
                if ( '' != activetab && $( activetab ).length ) {
                    $( activetab ).fadeIn();
                } else {
                    $( '.group:first' ).fadeIn();
                }
                $( '.group .collapsed' ).each( function() {
                    $( this )
                        .find( 'input:checked' )
                        .parent()
                        .parent()
                        .parent()
                        .nextAll()
                        .each( function() {
                            if ( $( this ).hasClass( 'last' ) ) {
                                $( this ).removeClass( 'hidden' );
                                return false;
                            }
                            $( this )
                                .filter( '.hidden' )
                                .removeClass( 'hidden' );
                        });
                });

                if ( '' != activetab && $( activetab + '-tab' ).length ) {
                    $( activetab + '-tab' ).addClass( 'nav-tab-active' );
                } else {
                    $( '.nav-tab-wrapper a:first' ).addClass( 'nav-tab-active' );
                }
                $( '.nav-tab-wrapper a' ).click( function( evt ) {
                    $( '.nav-tab-wrapper a' ).removeClass( 'nav-tab-active' );
                    $( this )
                        .addClass( 'nav-tab-active' )
                        .blur();
                    var clicked_group = $( this ).attr( 'href' );
                    if ( 'undefined' != typeof localStorage ) {
                        localStorage.setItem( 'activetab', $( this ).attr( 'href' ) );
                    }
                    $( '.group' ).hide();
                    $( clicked_group ).fadeIn();
                    evt.preventDefault();
                });

                $( '.wpsa-browse' ).on( 'click', function( event ) {
                    event.preventDefault();

                    var self = $( this );

                    // Create the media frame.
                    var file_frame = ( wp.media.frames.file_frame = wp.media({
                        title: self.data( 'uploader_title' ),
                        button: {
                            text: self.data( 'uploader_button_text' )
                        },
                        multiple: false
                    }) );

                    file_frame.on( 'select', function() {
                        attachment = file_frame
                            .state()
                            .get( 'selection' )
                            .first()
                            .toJSON();

                        self
                            .prev( '.wpsa-url' )
                            .val( attachment.url )
                            .change();
                    });

                    // Finally, open the modal
                    file_frame.open();
                });

                $( 'input.wpsa-url' )
                    .on( 'change keyup paste input', function() {
                        var self = $( this );
                        self
                            .next()
                            .parent()
                            .children( '.wpsa-image-preview' )
                            .children( 'img' )
                            .attr( 'src', self.val() );
                    })
                    .change();
            });
        </script>

        <style type="text/css">
            .metabox-holder form h2 {
                display: none;
            }
        </style>
        <?php
    }

}
