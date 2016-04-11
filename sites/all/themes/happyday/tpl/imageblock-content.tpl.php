<?php

/**
 * @file
 * Default theme implementation to display image block content.
 *
 * Available variables:
 * - $image: Block image.
 * - $content: Block content.
 * - $block: Block object.
 *
 * @see template_preprocess()
 * @see template_preprocess_imageblock_content()
 */
?>
<?php if ($image): ?>
    <?php print $image ?>
<?php endif; ?>

<?php if ($content): ?>
  <div class="block-body">
    <?php print $content ?>
  </div>
<?php endif; ?>
