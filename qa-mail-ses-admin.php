<?php

class qa_mail_ses_admin {

    function option_default($option) {
        switch($option) {
            case 'plugin_mail_ses_region' :
                return 'eu-west-1';
            default :
                return null;
        }
    }

    function admin_form(&$qa_content) {
        $saved = false;
        if (qa_clicked('plugin_mail_ses_save')) {
            qa_opt('plugin_mail_ses_region', (string)qa_post_text('plugin_mail_ses_region'));
            qa_opt('plugin_mail_ses_key', (string)qa_post_text('plugin_mail_ses_key'));
            qa_opt('plugin_mail_ses_secret', (string)qa_post_text('plugin_mail_ses_secret'));
            $saved=true;
        }
        return array(
                'ok' => $saved ? 'Mail SES settings saved' : null,
                'fields' => array(
                        array(
                                'label' => 'Region :',
                                'type' => 'text',
                                'value' => (string)qa_opt('plugin_mail_ses_region'),
                                'suffix' => '',
                                'tags' => 'NAME="plugin_mail_ses_region"',
                        ),
                        array(
                                'label' => 'Key :',
                                'type' => 'text',
                                'value' => (string)qa_opt('plugin_mail_ses_key'),
                                'suffix' => '',
                                'tags' => 'NAME="plugin_mail_ses_key"',
                        ),
                        array(
                                'label' => 'Secret :',
                                'type' => 'password',
                                'value' => (string)qa_opt('plugin_mail_ses_secret'),
                                'suffix' => '',
                                'tags' => 'NAME="plugin_mail_ses_secret"',
                        ),
                ),
                'buttons' => array(
                        array(
                                'label' => 'Save Changes',
                                'tags' => 'NAME="plugin_mail_ses_save"',
                        ),
                ),

        );
    }

};

