<?php print render($title_prefix); ?>



<?php if ($rows): ?>
<h2><?php print t('Our Story');?></h2>
<div class="story_wrapper">
  	<?php print $rows; ?>
</div>
<?php endif; ?>
