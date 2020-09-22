<?php

namespace DigitalRiver\Admin\Fields;

use DigitalRiver\Admin\Menu\Options;

class Fields
{

    public $options;

    public function __construct(Options $options)
    {
        $this->options = $options;
    }

    public function defineFields()
    {

// Section: SalesForce
        $this->options->add_section(
            array(
                'id' => 'digitalriver_crm',
                'title' => __('CRM', 'digitalriver'),
            )
        );

// Section: MaxMind
        $this->options->add_section(
            array(
                'id' => 'digitalriver_geo',
                'title' => __('TARGETING', 'digitalriver'),
            )
        );

// Section: Message
        $this->options->add_section(
            array(
                'id' => 'digitalriver_message',
                'title' => __('MESSAGING', 'digitalriver'),
            )
        );

// Field: Title.
        $this->options->add_field(
            'digitalriver_crm',
            array(
                'id' => 'title_salesforce',
                'type' => 'title',
                'name' => '<h3>Salesforce Settings</h3>',
            )
        );

// Field: Salesforce - Account ID
        $this->options->add_field(
            'digitalriver_crm',
            array(
                'id' => 'dr_salesforce_url',
                'type' => 'text',
                'name' => __('Url', 'digitalriver'),
                'desc' => __('Enter your Salesforce Url', 'digitalriver'),
                'default' => '',
            )
        );

        // Field: Salesforce - Version
        $this->options->add_field(
            'digitalriver_crm',
            array(
                'id' => 'dr_salesforce_version',
                'type' => 'text',
                'name' => __('Version', 'digitalriver'),
                'desc' => __('Enter your Salesforce Version (43.0)', 'digitalriver'),
                'default' => '',
            )
        );
// Field: Salesforce - Account Username
        $this->options->add_field(
            'digitalriver_crm',
            array(
                'id' => 'dr_salesforce_username',
                'type' => 'text',
                'name' => __('Account Username', 'digitalriver'),
                'desc' => __('Enter your Salesforce username', 'digitalriver'),
                'default' => '',
            )
        );

// Field: Salesforce - Account Password
        $this->options->add_field(
            'digitalriver_crm',
            array(
                'id' => 'dr_salesforce_password',
                'type' => 'password',
                'name' => __('Account Password', 'digitalriver'),
                'desc' => __('Enter your Salesforce password', 'digitalriver'),
            )
        );
// Field: Salesforce - Account Password
        $this->options->add_field(
            'digitalriver_crm',
            array(
                'id' => 'dr_salesforce_security_token',
                'type' => 'password',
                'name' => __('Security Token', 'digitalriver'),
                'desc' => __('Enter your Salesforce Security Token', 'digitalriver'),
            )
        );
// Field: Salesforce - Account Client ID
        $this->options->add_field(
            'digitalriver_crm',
            array(
                'id' => 'dr_salesforce_clientid',
                'type' => 'text',
                'name' => __('Consumer Key', 'digitalriver'),
                'desc' => __('Enter your Salesforce Consumer Key', 'digitalriver'),
                'default' => '',
            )
        );

// Field: Salesforce - Account Client password
        $this->options->add_field(
            'digitalriver_crm',
            array(
                'id' => 'dr_salesforce_client_secret',
                'type' => 'password',
                'name' => __('Consumer Secret', 'digitalriver'),
                'desc' => __('Enter your Salesforce Consumer Secret', 'digitalriver'),
            )
        );

// Field: Prospect Title
        $this->options->add_field(
            'digitalriver_crm',
            array(
                'id' => 'title_prospect',
                'type' => 'title',
                'name' => '<h3>Prospect Settings</h3>',
            )
        );

// Field: Salesforce - Prospect ID
        $this->options->add_field(
            'digitalriver_crm',
            array(
                'id' => 'salesforce_prospect_field',
                'type' => 'text',
                'name' => __('Salesforce Prospect Field Name', 'digitalriver'),
                'desc' => __('Enter the Salesforce Prospect Field to match against', 'digitalriver'),
                'default' => '',
            )
        );

// Field: Salesforce - Prospect ID
        $this->options->add_field(
            'digitalriver_crm',
            array(
                'id' => 'salesforce_prospect_value',
                'type' => 'text',
                'name' => __('Salesforce Prospect Prospect Value', 'digitalriver'),
                'desc' => __('Enter the Salesforce Prospect Value', 'digitalriver'),
                'default' => '',
            )
        );
// Field: Salesforce - Prospect Title
        $this->options->add_field(
            'digitalriver_geo',
            array(
                'id' => 'title_geo',
                'type' => 'title',
                'name' => '<h3>MaxMind Settings</h3>',
            )
        );

// Field: MaxMind User ID
        $this->options->add_field(
            'digitalriver_geo',
            array(
                'id' => 'dr_maxmind_username',
                'type' => 'text',
                'name' => __('User ID', 'digitalriver'),
                'desc' => __('Enter your MaxMind User ID', 'digitalriver'),
                'default' => '',
            )
        );

// Field: MaxMind License Key
        $this->options->add_field(
            'digitalriver_geo',
            array(
                'id' => 'dr_maxmind_licensekey',
                'type' => 'text',
                'name' => __('License Key', 'digitalriver'),
                'desc' => __('Enter your MaxMind License Key', 'digitalriver'),
                'default' => '',
            )
        );

// Field: Message - Message Title
        $this->options->add_field(
            'digitalriver_message',
            array(
                'id' => 'title_message_general',
                'type' => 'title',
                'name' => '<h3>General Settings</h3>',
            )
        );

        // Field: Message - Message Prospect
        $this->options->add_field(
            'digitalriver_message',
            array(
                'id' => 'message_enable',
                'type' => 'select',
                'name' => __('Enable Message', 'digitalriver'),
                'desc' => __('Enable or disable the message', 'digitalriver'),
                'options' => array(
                    'yes' => 'Yes',
                    'no' => 'No',
                ),
            )
        );

        // Field: Message - Message Close
        $this->options->add_field(
            'digitalriver_message',
            array(
                'id' => 'message_close',
                'type' => 'select',
                'name' => __('Close or Toggle', 'digitalriver'),
                'desc' => __('Enable or disable the user being able to close the message', 'digitalriver'),
                'options' => array(
                    'yes' => 'Close',
                    'no' => 'Toggle',
                ),
            )
        );

        // Field: Message - Message Top
        $this->options->add_field(
            'digitalriver_message',
            array(
                'id' => 'message_top',
                'type' => 'select',
                'name' => __('Sticky to Top', 'digitalriver'),
                'desc' => __('Keep the message fixed on the top of the page', 'digitalriver'),
                'options' => array(
                    'ramain-top' => 'No',
                    'fixtop' => 'Yes',
                ),
            )
        );

        // Field: Message - Message Push
        $this->options->add_field(
            'digitalriver_message',
            array(
                'id' => 'message_push',
                'type' => 'select',
                'name' => __('Push Page Down', 'digitalriver'),
                'desc' => __('Push the page content down, only if Sticky', 'digitalriver'),
                'options' => array(
                    'yes' => 'Yes',
                    'no' => 'No',
                ),
            )
        );

        // Field: Message - Message Title
        $this->options->add_field(
            'digitalriver_message',
            array(
                'id' => 'title_message_settings',
                'type' => 'title',
                'name' => '<h3>Message Settings</h3>',
            )
        );

        // Field: Message - Message Text, Custom
        $this->options->add_field(
            'digitalriver_message',
            array(
                'id' => 'message_text_custom',
                'type' => 'text',
                'name' => __('Custom Message Text', 'digitalriver'),
                'desc' => __('Enter the custom message. Use {{company_name}} to bring in the company name', 'digitalriver'),
            )
        );

        // Field: Message - Message Text, Default
        $this->options->add_field(
            'digitalriver_message',
            array(
                'id' => 'message_text_default',
                'type' => 'text',
                'name' => __('Default Message Text', 'digitalriver'),
                'desc' => __('Enter the default message', 'digitalriver'),
            )
        );

        // Field: Message - Message Link Text
        $this->options->add_field(
            'digitalriver_message',
            array(
                'id' => 'message_link_text',
                'type' => 'text',
                'name' => __('Link Text', 'digitalriver'),
                'desc' => __('Enter the link text, leave blank to have no link', 'digitalriver'),
            )
        );

        // Field: Message - Message Link URL
        $this->options->add_field(
            'digitalriver_message',
            array(
                'id' => 'message_link_url',
                'type' => 'text',
                'name' => __('URL', 'digitalriver'),
                'desc' => __('Enter the full URL', 'digitalriver'),
            )
        );

        // Field: Message - Message Title
        $this->options->add_field(
            'digitalriver_message',
            array(
                'id' => 'title_message_style',
                'type' => 'title',
                'name' => '<h3>Style Settings</h3>',
            )
        );

        // Field: Message - Message Link Target
        $this->options->add_field(
            'digitalriver_message',
            array(
                'id' => 'message_link_target',
                'type' => 'select',
                'name' => __('Link Target', 'digitalriver'),
                'desc' => __('Open the link in a new tab', 'digitalriver'),
                'options' => array(
                    '_blank' => 'Yes',
                    '' => 'No',
                ),
            )
        );

        // Field: Message - Message Style, Font Size
        $this->options->add_field(
            'digitalriver_message',
            array(
                'id' => 'message_font',
                'type' => 'text',
                'name' => __('Font Size', 'digitalriver'),
                'desc' => __('Enter the font size (ex. 18)', 'digitalriver'),
            )
        );


        // Field: Message - Message Style, Background Color
        $this->options->add_field(
            'digitalriver_message',
            array(
                'id' => 'message_bgcolor',
                'type' => 'color',
                'name' => __('Background Color', 'digitalriver'),
                'desc' => __('Choose the message background color', 'digitalriver'),
                'placeholder' => __('', 'digitalriver'),
            )
        );

        // Field: Message - Message Style, text Color
        $this->options->add_field(
            'digitalriver_message',
            array(
                'id' => 'message_textcolor',
                'type' => 'color',
                'name' => __('Text Color', 'digitalriver'),
                'desc' => __('Choose the message text color', 'digitalriver'),
                'placeholder' => __('', 'digitalriver'),
            )
        );

        // Field: Message - Message Style, Border Color
        $this->options->add_field(
            'digitalriver_message',
            array(
                'id' => 'message_bordercolor',
                'type' => 'color',
                'name' => __('Border Color', 'digitalriver'),
                'desc' => __('Choose the message border color', 'digitalriver'),
                'placeholder' => __('', 'digitalriver'),
            )
        );

        // Field: Message - Message Style, Link Color
        $this->options->add_field(
            'digitalriver_message',
            array(
                'id' => 'message_link_color',
                'type' => 'color',
                'name' => __('Link Color', 'digitalriver'),
                'desc' => __('Choose the message link color', 'digitalriver'),
                'placeholder' => __('', 'digitalriver'),
            )
        );

        // Field: Message - Message Style, Link Color
        $this->options->add_field(
            'digitalriver_message',
            array(
                'id' => 'message_buttoncolor',
                'type' => 'color',
                'name' => __('Button Color', 'digitalriver'),
                'desc' => __('Choose the Button color', 'digitalriver'),
                'placeholder' => __('', 'digitalriver'),
            )
        );

        // Field: Message - Message Link Style
        $this->options->add_field(
            'digitalriver_message',
            array(
                'id' => 'message_link_style',
                'type' => 'select',
                'name' => __('Link Style', 'digitalriver'),
                'desc' => __('Choose the link style', 'digitalriver'),
                'options' => array(
                    'dr-button' => 'Button',
                    '' => 'Hyperlink',
                ),
            )
        );


        // Field: Message - Custom CSS
        $this->options->add_field(
            'digitalriver_message',
            array(
                'id' => 'message_customcss',
                'type' => 'textarea',
                'name' => __('Custom CSS', 'digitalriver'),
                'desc' => __('Enter any custom CSS', 'digitalriver'),
            )
        );

    }
}
