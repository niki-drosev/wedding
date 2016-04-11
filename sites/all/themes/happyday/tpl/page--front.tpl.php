<?php
global $user;
global $base_url;
if ($user->uid) {

require_once(drupal_get_path('theme','happyday').'/tpl/header.tpl.php');
$dest = drupal_get_destination();


    ?>

    <div class="page">
        <?php print render($page['top_content']); ?>
        <?php print render($page['section_content']); ?>
        <?php print render($page['section_content_1']); ?>
        <?php print render($page['section_content_2']); ?>
        <?php require_once(drupal_get_path('theme', 'happyday') . '/tpl/footer.tpl.php'); ?>
    </div>
<?php
} else {
    print render(drupal_get_form('user_login'));
}
    ?>
