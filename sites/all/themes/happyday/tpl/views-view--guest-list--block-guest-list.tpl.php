<?php print render($title_prefix); ?>
<?php if ($rows): ?>

<div class="container">
	<h2><?php print t('Our Bridal Party');?></h2>
    <div class="guest_wrapper" ><?php print $rows; ?></div>
</div>
<?php endif; ?>
