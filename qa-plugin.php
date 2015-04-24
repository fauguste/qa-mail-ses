<?php

/*
	Plugin Name: Amazon SES Email
	Plugin URI:
	Plugin Description: Use Amazon SES API (not SMTP API)
	Plugin Version: 1.0
	Plugin Date: 2015-04-24
	Plugin Author: Frédéric AUGUSTE
	Plugin Author URI:
	Plugin License: MIT
	Plugin Minimum Question2Answer Version: 1.5
	Plugin Update Check URI:
*/

if (!defined('QA_VERSION')) { // don't allow this page to be requested directly from browser
	header('Location: ../../');
	exit;
}


qa_register_plugin_overrides('qa-send-mail-overrides.php');


qa_register_plugin_module('module', 'qa-mail-ses-admin.php', 'qa_mail_ses_admin', 'SES Admin');
