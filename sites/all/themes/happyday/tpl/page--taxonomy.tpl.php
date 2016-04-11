<?php require_once(drupal_get_path('theme','happyday').'/tpl/header.tpl.php'); 

global $base_url;
?>
<div class="page">
	<section class="inside_intro home_intro white_txt parallax2" data-image="<?php print $base_url.'/'.path_to_theme(); ?>/images/back.jpg">   
    	<div class="home_txt" data-0="opacity:1" data-top-bottom="opacity:0">
            <div class="container">
                <h1><span><?php print t('Our');?></span> <?php print t('Blog');?></h1>
                <?php if ($breadcrumb): ?>
				<div class="breadcrumbs">
					<?php print $breadcrumb; ?>
				</div>
				<?php endif; ?>
            </div>
        </div>
    	<div class="into_firefly"></div>   
    </section>
    <section class="content clearfix" id="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <?php print render($page['section_content_1']); ?>
                </div>
            </div>
        </div>
    </section>
    
    <?php require_once(drupal_get_path('theme','happyday').'/tpl/footer.tpl.php'); ?>
</div>

