<?php

elgg_register_event_handler('ready', 'system', 'elgg_upgrade_key_init');

/**
 * Initialize the plugin
 */
function elgg_upgrade_key_init() {

	// Make sure we have an upgrade key; generate one if empty
	$upgrade_key = elgg_get_plugin_setting('upgrade_key', 'elgg_upgrade_key');
	if (!$upgrade_key) {
		$upgrade_key = generate_random_cleartext_password();
		elgg_set_plugin_setting('upgrade_key', $upgrade_key, 'elgg_upgrade_key');
		elgg_add_admin_notice('upgrade_key:empty', elgg_echo('upgrade_key:empty', array($upgrade_key)));
	}

	if (defined('UPGRADING')) {
		elgg_set_viewtype('failsafe');
		$key = (elgg_is_admin_logged_in()) ? $upgrade_key : urldecode(get_input('key', '', false));
		if ($upgrade_key !== $key) {
			register_error(elgg_echo('upgrade_key:key_mismatch'));
			forward('error', '403');
		}
	}
}
