<?php 
global $base_url;
?>


<div class="answer">
	<div class="col-md-2 col-sm-2">
    	<?php
			if(render($content['picture'])){
			  print render($content['picture']);
			}  else {
			  print '<img src="http://dummyimage.com/90x90" alt="Default User Picture" class="img-comments"/>';
			}
		?>
    </div>
    <div class="col-md-10">
    	<div class="content-cmt">
        	<span class="name-cmt"><?php print theme('username', array('account' => $content['comment_body']['#object'], 'attributes' => array('class' => 'url'))) ?></span>
            <span class="date-cmt"><?php print format_date($node->created, 'custom', 'F d, Y'); ?></span>
            <?php print render($content['links']);?>
            <p class="content-reply">
            	<?php print strip_tags(render($content['comment_body']));?>
            </p>
        </div>
    </div>
</div>