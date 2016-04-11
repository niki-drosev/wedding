<?php
global $base_url;

function happyday_preprocess_html(&$variables){
    drupal_add_css('https://fonts.googleapis.com/css?family=Dancing+Script', array('type' => 'external','media' => 'all'));
	drupal_add_css('https://fonts.googleapis.com/css?family=EB+Garamond', array('type' => 'external','media' => 'all'));
	drupal_add_css('http://fonts.googleapis.com/css?family=Great+Vibes', array('type' => 'external','media' => 'all'));
	drupal_add_css('http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,700', array('type' => 'external','media' => 'all'));
    drupal_add_css('http://allfont.net/allfont.css?fonts=andantino-script', array('type' => 'external','media' => 'all'));
    drupal_add_css('http://allfont.net/allfont.css?fonts=presentscript-cyrillic', array('type' => 'external','media' => 'all'));

    if(!empty($_REQUEST["style_color"])){
		$style_color = $_REQUEST["style_color"];
	} else {
		$style_color = theme_get_setting('style_color', 'happyday'); 
	}
	if(empty($style_color)) $style_color = 'blue';
	
	if($style_color == 'blue'){
		$color = array(
		'#tag' => 'link',
		'#attributes' => array(
			'href' => base_path().path_to_theme().'/css/blue.css', 
			'rel' => 'stylesheet',
			'type' => 'text/css',
			),
		'#weight' => 1,
		);
		drupal_add_html_head($color, 'color');
	
	} elseif($style_color == 'brown') {
		$color = array(
		'#tag' => 'link',
		'#attributes' => array(
			'href' => base_path().path_to_theme().'/css/brown.css', 
			'rel' => 'stylesheet',
			'type' => 'text/css',
			),
		'#weight' => 1,
		);
		drupal_add_html_head($color, 'color');
	
	} elseif($style_color == 'pink') {
		$color = array(
		'#tag' => 'link',
		'#attributes' => array(
			'href' => base_path().path_to_theme().'/css/pink.css', 
			'rel' => 'stylesheet',
			'type' => 'text/css',
			),
		'#weight' => 1,
		);
		drupal_add_html_head($color, 'color');
	
	} else {
		$color = array(
		'#tag' => 'link',
		'#attributes' => array(
			'href' => base_path().path_to_theme().'/css/red.css', 
			'rel' => 'stylesheet',
			'type' => 'text/css',
			),
		'#weight' => 1,
		);
		drupal_add_html_head($color, 'color');
	}

	
}

// Remove superfish css files.
function happyday_css_alter(&$css) {
	unset($css[drupal_get_path('module', 'system') . '/system.menus.css']);
	unset($css[drupal_get_path('module', 'system') . '/system.theme.css']);
	//unset($css[drupal_get_path('module', 'system') . '/system.base.css']);
}


function happyday_form_alter(&$form, &$form_state, $form_id) {
	if ($form_id == 'search_block_form') {
		$form['search_block_form']['#title_display'] = 'invisible'; // Toggle label visibilty
		$form['search_block_form']['#default_value'] = t('Search'); // Set a default value for the textfield
		$form['search_block_form']['#attributes']['id'] = array("mod-search-searchword");
		//disabled submit button
		//unset($form['actions']['submit']);
		unset($form['search_block_form']['#title']);
		$form['search_block_form']['#attributes']['onblur'] = "if (this.value == '') {this.value = 'Search';}";
		$form['search_block_form']['#attributes']['onfocus'] = "if (this.value == 'Search') {this.value = '';}";
		
	}
}

function hook_preprocess_page(&$variables) {	
	if (arg(0) == 'node' && is_numeric($nid)) {
    	if (isset($variables['page']['content']['system_main']['nodes'][$nid])) {
      		$variables['node_content'] =& $variables['page']['content']['system_main']['nodes'][$nid];
      		if (empty($variables['node_content']['field_show_page_title'])) {
        		$variables['node_content']['field_show_page_title'] = NULL;
      		}
    	}
  	}
	
  if (arg(0) == 'taxonomy' && arg(1) == 'term' )
  {
    $term = taxonomy_term_load(arg(2));
    $vocabulary = taxonomy_vocabulary_load($term->vid);
    $variables['theme_hook_suggestions'][] = 'page__taxonomy_vocabulary_' . $vocabulary->machine_name;
  }
}

function happyday_preprocess_page(&$vars){

	if (isset($vars['node'])) {
		$vars['theme_hook_suggestions'][] = 'page__'. $vars['node']->type;
	}

	if (isset($vars['node'])) {
		$vars['theme_hook_suggestions'][] = 'page__node__'. $vars['node']->nid;
	}
	
	//404 page
	$status = drupal_get_http_header("status");
	if($status == "404 Not Found") {
		$vars['theme_hook_suggestions'][] = 'page__404';
	}


	if (isset($vars['node'])) :
		//print $vars['node']->type;
        if($vars['node']->type == 'page'):
            $node = node_load($vars['node']->nid);
            $output = field_view_field('node', $node, 'field_show_page_title', array('label' => 'hidden'));
            $vars['field_show_page_title'] = $output;
			//sidebar
			$output = field_view_field('node', $node, 'field_sidebar', array('label' => 'hidden'));
            $vars['field_sidebar'] = $output;
        endif;
    endif;
}

function happyday_breadcrumb($variables) {
	$crumbs ='';
	$breadcrumb = $variables['breadcrumb'];
	if (!empty($breadcrumb)) {
		$crumbs .= '';
		foreach($breadcrumb as $value) {

			$crumbs .= $value.' - ';
		}
		$crumbs .= drupal_get_title();
		return $crumbs;
	}else{
		return NULL;
	}
}

//custom main menu
function happyday_menu_tree__main_menu(array $variables) {
	return '<ul class="nav navbar-nav">' . $variables['tree'] . '</ul>';
}

function happyday_form_contact_site_form_alter(&$form, &$form_state) {
  $form['attending'] = array(
    '#type'     => 'textfield',
    '#required' => TRUE,
	'#attributes' => array(
					'id' => 'attending_block_1',
					'placeholder' => t('# Attending'),
					'class' => array('form-control'),
						   ),
  );
  $form['guest'] = array(
    '#type'     => 'textfield',
    '#required' => TRUE,
	'#attributes' => array(
					'id' => 'guest_block_1',
					'placeholder' => t("Your Guest's Name"),
					'class' => array('form-control'),
						   ),
  );
 	
  $order = array(
    'name',
	'guest',
	'mail',
	'attending',
    'subject',
    'cid',
    'message',
    'copy',
    'submit'
  );
 
  foreach ($order as $key => $field) {
    $form[$field]['#weight'] = $key;
  }
  unset($form['message']);
  unset($form['copy']);
  unset($form['subject']);
  
  unset($form['name']['#title']);
  unset($form['mail']['#title']);
  
  $form['name']['#attributes'] = array('id' => 'name_block_1','placeholder' => 'Your Name','class' => array('form-control'));
  $form['mail']['#attributes'] = array('id' => 'email_block_1','placeholder' => 'Your E-mail','class' => array('form-control'));
  
   $form['actions']['submit']['#attributes'] = array('value' => 'Send','class' => array('btn','btn-lg','submit_block_1'));

}

function happyday_form_comment_form_alter(&$form, &$form_state) {
	global $user;
	unset($form['author']);
	unset($form['subject']);
	unset($form['comment_body']);
	unset($form['actions']['preview']);
	
	$form['name'] = array(
    '#type'     => 'textfield',
	'#default_value' => $user->uid ? format_username($user) : '',
    '#required' => TRUE,
	'#attributes' => array(
					'placeholder' => 'Your Name',
					'class' => array('form-control'),
						   ),
	'#prefix' => '<div class="col-sm-6">',
  	);
	$form['mail'] = array(
    '#type'     => 'textfield',
	'#default_value' => $user->uid ? $user->mail : '',
    '#required' => TRUE,
	'#attributes' => array(
					'placeholder' => 'Your Email',
					'class' => array('form-control'),
						   ),
  	);
	$form['web'] = array(
    '#type'     => 'textfield',
    '#required' => TRUE,
	'#attributes' => array(
					'placeholder' => 'Your Website',
					'class' => array('form-control'),
						   ),
  	);
	$form['title'] = array(
    '#type'     => 'textfield',
    '#required' => TRUE,
	'#attributes' => array(
					'placeholder' => 'Title',
					'class' => array('form-control'),
						   ),
	'#suffix' => '</div>',
  	);
	
	$form['message'] = array(
    '#type'     => 'textarea',
    '#required' => TRUE,
	'#attributes' => array(
					'id' => 'message',
					'placeholder' => 'Your Message',
					'class' => array('form-control','control'),
						   ),
	'#prefix' => '<div class="col-sm-6">',
	'#suffix' => '</div>',
  	);
	
	$form['actions']['submit']['#prefix'] = '<div class="col-xs-12">';
	$form['actions']['submit']['#suffix'] = '</div>';
	$form['actions']['submit']['#attributes'] = array('value' => 'Submit Comment','class' => array('btn-submit','btn_red','btn'));
	
	$order = array(
    'name',
	'mail',
	'web',
    'title',
    'message',
	'actions'
  	);
 
  	foreach ($order as $key => $field) {
    	$form[$field]['#weight'] = $key;
  	}

}