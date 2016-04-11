<!DOCTYPE html>
<html lang="<?php print $language->language; ?>">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php print $head_title; ?></title>
<?php print $styles; ?><?php print $head; ?>
<?php
	//Tracking code
	$tracking_code = theme_get_setting('general_setting_tracking_code', 'happyday');
	print $tracking_code;
	//Custom css
	$custom_css = theme_get_setting('custom_css', 'happyday');
	if(!empty($custom_css)):
?>
<style type="text/css" media="all">
<?php print $custom_css;?>
</style>
<?php
	endif;
?>
</head>

<body class="<?php print $classes;?>" <?php print $attributes;?>>
	<?php print $page_top; ?><?php print $page; ?><?php print $page_bottom; ?>
<?php print $scripts; ?>
</body>
</html>

