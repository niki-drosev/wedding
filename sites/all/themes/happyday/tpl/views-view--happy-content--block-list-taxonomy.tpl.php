<?php print render($title_prefix); ?>



<?php if ($rows): ?>
    <div class="row">
        <?php print $rows; ?>
    </div>
    
    <?php if ($pager): ?>
    <div class="pagination">
        <?php print $pager; ?>
    </div>
    <?php endif; ?>
<?php endif; ?>
