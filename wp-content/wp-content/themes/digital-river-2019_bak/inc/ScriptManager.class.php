<?php

class ScriptManager
{

    function __construct()
    {
        add_action('wp_enqueue_scripts', array(&$this, 'enqueue'));

    }

    public function enqueue()
    {
        // CDN scripts

        wp_enqueue_script('font-awesome', 'https://kit.fontawesome.com/dad134531f.js');
        wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.4.1.min.js');
        wp_enqueue_script('jquery-ui', 'https://code.jquery.com/ui/1.12.1/jquery-ui.min.js');
        wp_enqueue_script('popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js');
        wp_enqueue_script('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js');
        wp_enqueue_script('mf-interactive', get_template_directory_uri() . '/vendor/mf-interactive/scripts.js');
        wp_enqueue_script('bootstrap-select-new', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.11/js/bootstrap-select.min.js');
        wp_enqueue_script('marketo-forms', '//app-sj03.marketo.com/js/forms2/js/forms2.min.js');

        // Legacy js
//        wp_enqueue_script('main', get_template_directory_uri() . '/assets/javascripts/main.min.js');

        // Enqueues the webpack output script and styles
        wp_enqueue_script('bundle', get_template_directory_uri() . '/dist/bundle.js');


        wp_deregister_script('wp-embed');

        if (get_current_blog_id() !== 3) {
            wp_enqueue_script('vimeo-defer', 'https://player.vimeo.com/api/player.js', array(), '2.0.2', true);
        }
        wp_enqueue_script('marketo-defer', '//app-sjqe.marketo.com/js/forms2/js/forms2.js', array(), '2.0.2', true);
        wp_enqueue_script('global', get_template_directory_uri() . '/assets/javascripts/main.min.js', array(), '2.0.3', true);
        wp_localize_script('global', 'global', array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'rest_root' => esc_url_raw(rest_url()),
            'rest_nonce' => wp_create_nonce('wp_rest')
        ));

        if (is_page_template('template-demo-now.php')) {

            wp_enqueue_script('demoNow', get_template_directory_uri() . '/assets/javascripts/demoNow.js', array(), '2.0.2', true);

        } else if (is_page_template('template-adobe.php')) {

            wp_enqueue_script('adobe-defer', get_template_directory_uri() . '/assets/javascripts/adobe.js', array(), '2.0.3', true);

        } else if (get_post_type() === InfographicPostType::$post_type_key) {

            wp_enqueue_script('clipboard-defer', get_template_directory_uri() . '/assets/javascripts/vendor/clipboard.min.js', array(), '2.0.2', true);

        }

    }

}
