<?php require_once(drupal_get_path('theme','happyday').'/tpl/header.tpl.php'); 

global $base_url;
?>

<div class="page">
    <div class="container">
        <div class="row">
            <?php 
                if (!empty($tabs['#primary']) || !empty($tabs['#secondary'])):
                    print render($tabs);
                endif;
                print $messages;
                //unset($page['content']['system_main']['default_message']);
            ?>
            <h1 class="text-center">404</h1>
            <h2>Page not found !!</h2>
            <div class="text-center home">
            	<a href="<?php print $base_url; ?>" class="btn">Home</a>
            </div>
        </div>
    </div>
    <?php require_once(drupal_get_path('theme','happyday').'/tpl/footer.tpl.php'); ?>
</div>

