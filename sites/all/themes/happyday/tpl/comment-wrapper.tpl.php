<?php
	if ($content['#node']->comment and !($content['#node']->comment == 1 and $content['#node']->comment_count)) { ?>
    
<section class="comments clearfix">
	<div class="comments-title">
        <h3 class="title"><?php print t('Comments');?></h3>
    </div>
	<div class="comments-content">
    	<?php print render($content['comments']); ?>
        <section class="form-comment">
        	<div class="form-comment-title">
                <h3 class="title"><?php print t('Leave a Comments');?></h3>
            </div>
            <div id="form-comment">
            	<div class="row">
                	<?php print render($content['comment_form'])?>
                </div>
            </div>
        </section>
    </div>
</section>
<?php
	}
?>
