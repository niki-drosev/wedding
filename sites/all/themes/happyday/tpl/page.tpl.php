<?php require_once(drupal_get_path('theme','happyday').'/tpl/header.tpl.php'); 

global $base_url;
?>

<div class="page">
	<section class="content clearfix" id="content">
        <div class="container">
            <div class="row">
            	<?php 
					if (!empty($tabs['#primary']) || !empty($tabs['#secondary'])):
						print render($tabs);
					endif;
					print $messages;
					//unset($page['content']['system_main']['default_message']);
				?>
            	<?php print render($page['content']); ?>
            </div>
        </div>
    </section>
    <?php require_once(drupal_get_path('theme','happyday').'/tpl/footer.tpl.php'); ?>
</div>

