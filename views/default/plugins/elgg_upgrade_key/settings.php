<?php

$plugin = elgg_extract('entity', $vars);

if ($plugin->upgrade_key) {
	echo '<div>';
	echo '<label>' . elgg_echo('upgrade_key:url') . '</label>';
	echo '<p>' . elgg_view('output/url', array(
		'href' => elgg_http_add_url_query_elements(elgg_normalize_url('upgrade.php'), array(
			'key' => $plugin->upgrade_key
		))
	)) . '</p>';
	echo '</div>';
}

echo '<div>';
echo '<label>' . elgg_echo('upgrade_key:setting') . '</label>';
echo elgg_view('input/text', array(
	'name' => 'params[upgrade_key]',
	'value' => $plugin->upgrade_key
));
echo '</div>';