<?php
/**
 * Elgg failsafe upgrade pageshell
 * @uses $vars['title'] The page title
 * @uses $vars['body'] The main content of the page
 */
$url = elgg_http_add_url_query_elements($_SERVER['REQUEST_URI'], array(
	'upgrade' => 'upgrade'
		));

// we won't trust server configuration but specify utf-8
header('Content-type: text/html; charset=utf-8');
?>
<html>
	<head>
		<title><?php echo $vars['title']; ?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="refresh" content="1;url=<?php echo $url ?>"/>

		<style type="text/css">

			html, body {
				width: 100%;
				height: 100%;
			}
			.elgg-ajax-loader {
				width: 100%;
				height: 100%;
				background: url(<?php echo elgg_normalize_url('_graphics/ajax_loader.gif') ?>) 50% 50% no-repeat;
			}
		</style>

	</head>
	<body>
		<div class="elgg-ajax-loader"></div>
	</body>
</html>
