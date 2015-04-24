<?php

if (!defined('QA_VERSION')) { // don't allow this page to be requested directly from browser
	header('Location: ../');
	exit;
}


function qa_send_email($params)
{

    include QA_INCLUDE_DIR.'vendor/aws.phar';

    $client = Aws\Ses\SesClient::factory(array(
            'region'  => (string)qa_opt('plugin_mail_ses_region'),
            'secret'  => (string)qa_opt('plugin_mail_ses_secret'),
            'key'  => (string)qa_opt('plugin_mail_ses_key'),
    ));
    $param = array();
    $param['Source'] =  '=?utf-8?B?' . base64_encode($params['fromname']) . '?= <' . $params['fromemail'] . '>';
    $param['Destination'] = array();
    if (isset($params['toemail'])) {
        $param['Destination']['ToAddresses'] = array();
        $param['Destination']['ToAddresses'][] =  '=?utf-8?B?' . base64_encode($params['toname']) . '?= <' . $params['toemail'] . '>';
    }
    $param['Message'] = array();
    $param['Message']['Subject'] = array(
            'Data' => $params['subject'],
            'Charset' => 'utf-8',
    );
    $param['Message']['Body'] = array(
            'Text' => array(
                    // Data is required
                    'Data' => $params['body'],
                    'Charset' => 'utf-8',
            ),
    );
    try {
        $result = $client->sendEmail($param);
    }
    catch(Exception $e) {

    }
}
