<?php 
global $base_url;
$out = '';

if($block->region == 'section_content'){
	$out .= '<div class="contextual-links-region">';
	$out .= render($title_suffix);
	$out .= '<section class="clearfix '.$block->css_class.'">';
	$out .= $content;
	$out .= '</section>';
	$out .= '</div>';
	
} elseif($block->region == 'section_content_1'){
	$out .= '<div class="contextual-links-region">';
	$out .= $content;
	$out .= '</div>';
	
} elseif($block->region == 'section_content_2'){
	$out .= '<div class="contextual-links-region">';
	$out .= render($title_suffix);
	$out .= '<section class="clearfix '.$block->css_class.'">';
	$out .= $content;
	$out .= '</section>';
	$out .= '</div>';
	
} elseif($block->region == 'header_social' && $block->delta != 'user_profile-block'){
	$out .= '<div class="contextual-links-region">';
	$out .= render($title_suffix);
	$out .= '<div class="header_social '.$block->css_class.'">';
	$out .= strip_tags($content,'<a><i>');	
	$out .= '</div>';
	$out .= '</div>';

} elseif($block->region == 'header_social' && $block->delta == 'user_profile-block'){
    $out .= '<div class="contextual-links-region">';
    $out .= render($title_suffix);
    $out .= '<div class="header_social_profile '.$block->css_class.'">';
    $out .= $content;
    $out .= '</div>';
    $out .= '</div>';


} elseif($block->region == 'top_content'){
	$out .= $content;

} elseif($block->region == 'footer'){
	$out .= '<section class="'.$block->css_class.' contextual-links-region set-bg" id="footer" data-image="'.$base_url.'/'.path_to_theme().'/images/back6.jpg">';
	$out .= render($title_suffix);
	$out .= '<div class="over"></div><div class="container">';
	$out .= '<div class="footer_txt">';
	if ($block->subject):		
		$out .= '<div class="thanks"><div class="title1">'.$block->subject.'</div></div>';
	endif;
	$out .= '<div class="copyrights">';
	$out .= $content;	
	$out .= '</div>';
	$out .= '</div>';
	$out .= '</div></section>';
	
} elseif($block->region == 'header_menu'){
	$out .= $content;
	
} elseif($block->region == 'sidebar'){
	$out .= '<div class="contextual-links-region">';
	$out .= render($title_suffix);
	if ($block->subject):		
		$out .= '<h3 class="right_title">'.$block->subject.'</h3>';
	endif;
	$out .= '<div class="'.$block->css_class.'">';
	$out .= $content;
	$out .= '</div>';
	$out .= '</div>';
		
} else {
	$out .= '<div class="'.$block->css_class.' contextual-links-region">';
	$out .= render($title_suffix);
	$out .= $content;
	$out .= '</div>';
}
print $out;

?>
