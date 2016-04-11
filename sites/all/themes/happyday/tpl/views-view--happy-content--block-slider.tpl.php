<?php print render($title_prefix); ?>

<?php
global $base_url;

if(!empty($_REQUEST["slider"])){
	$slider = $_REQUEST["slider"];
} else {
	$slider = theme_get_setting('slider', 'happyday');
}
if(empty($slider)) $slider = 'off';

if(!empty($_REQUEST["music"])){
	$music = $_REQUEST["music"];
} else {
	$music = theme_get_setting('music', 'happyday');
}
if(empty($music)) $music = 'off';

?>
<?php if($slider == 'off'){ ?>

<?php if ($attachment_before): ?>
<section class="home_intro white_txt parallax2" data-image="<?php print strip_tags($attachment_before); ?>">
<?php endif; ?>

<?php } else { ?>

<?php if ($rows): ?>
<section class="home_intro white_txt intro_slider">
    <div class="slider">
        <?php print $rows; ?>
    </div>
<?php endif; ?>

<?php } ?>

<?php if($music == 'on'): ?>
	<div class="player">
		<iframe width="100%" height="166" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/107825192&amp;color=ff5500&amp;auto_play=true&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false"></iframe>
	</div>
<?php endif; ?>

    <?php if ($header): ?>
    <div class="home_txt" data-0="opacity:1" data-top-bottom="opacity:0">
        <?php print $header; ?>
        <a href="#married" class="intro_down">
            <span><i class="fa fa-angle-down"></i></span>
        </a>
    </div>
    <div class="into_firefly"></div>
    <?php endif; ?>
</section>