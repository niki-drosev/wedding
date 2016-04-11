<?php 
global $base_url;

if(!empty($_REQUEST["music"])){
	$music = $_REQUEST["music"];
} else {
	$music = theme_get_setting('music', 'happyday'); 
}
if(empty($music)) $music = 'off';

$music_op = '';
if($music == 'off') {
	$music_op = 'off-music';	
}
?>

<header class="header <?php print $music_op; ?>">

    <a class="main_menu_btn"> <p class="menu-front"><?php print t('MENU');?></p>
    	<span class="line line1"></span>
        <span class="line line2"></span>
        <span class="line line3"></span>
  	</a>
    <!--<span class="header_plane anim" style="font-weight:bold;font-size:25px;color:white;text-align: right;">Menu</span>
        -->
    <?php  if($page['header_menu']):?>
    <div class="main_menu_block">
        <div class="menu_wrapper">
            <div class="sub_menu anim">
               	<?php print render($page['header_menu']); ?>
            </div>
            <div class="sub_img anim"></div>
        </div>
    </div>
    <?php endif; ?>

    <?php  if($page['header_social']):?>
    	<?php print render($page['header_social']); ?>
    <?php endif; ?>
</header>
