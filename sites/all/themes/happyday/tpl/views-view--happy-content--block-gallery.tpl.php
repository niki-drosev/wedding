<?php print render($title_prefix); ?>



<?php if ($rows): ?>
<h2><?php print t('Our Gallery');?></h2>
<div class="gallery_wrapper">
  	<?php print $rows; ?>
</div>
<?php endif; ?>
