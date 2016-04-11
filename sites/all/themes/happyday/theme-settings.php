<?php

function happyday_form_system_theme_settings_alter(&$form, $form_state) {
	$theme_path = drupal_get_path('theme', 'happyday');
  	$form['settings'] = array(
      '#type' =>'vertical_tabs',
      '#title' => t('Theme settings'),
      '#weight' => 2,
      '#collapsible' => TRUE,
      '#collapsed' => FALSE,
	  '#attached' => array(
					'css' => array(drupal_get_path('theme', 'happyday') . '/css/drupalet_base/admin.css'),
					'js' => array(
						drupal_get_path('theme', 'happyday') . '/js/drupalet_admin/admin.js',
					),
			),
  	);
	
	// Tracking code & Css custom
	//==============================
	$form['settings']['general_setting'] = array(
		'#type' => 'fieldset',
		'#title' => t('General Settings'),
		'#collapsible' => TRUE,
		'#collapsed' => FALSE,
	);
	$form['settings']['general_setting']['general_setting_tracking_code'] = array(
		'#type' => 'textarea',
		'#title' => t('Tracking Code'),
		//'#default_value' => theme_get_setting('general_setting_tracking_code', 'happyday'),
	);
	$form['settings']['custom_css'] = array(
		'#type' => 'fieldset',
		'#title' => t('Custom CSS'),
		'#collapsible' => TRUE,
		'#collapsed' => FALSE,
	);
	$form['settings']['custom_css']['custom_css'] = array(
		'#type' => 'textarea',
		'#title' => t('Custom CSS'),
		//'#default_value' => theme_get_setting('custom_css', 'happyday'),
		'#description'  => t('<strong>Example:</strong><br/>h1 { font-family: \'Metrophobic\', Arial, serif; font-weight: 400; }')
	);
	//========= End ================
	
	
	// Style
	//==============================
	$form['settings']['style'] = array(
      '#type' => 'fieldset',
      '#title' => t('Style Settings'),
      '#collapsible' => TRUE,
      '#collapsed' => FALSE,
  	);
	$form['settings']['style']['style_color'] = array(
      '#type' => 'select',
      '#title' => t('Style Color'),
      '#options' => array('blue' => t('Blue'), 'brown' => t('Brown'), 'pink' => t('Pink'), 'red' => t('Red')),
      '#default_value' => theme_get_setting('style_color','happyday'),
  	);
	$form['settings']['style']['slider'] = array(
      '#type' => 'select',
      '#title' => t('Slider'),
      '#options' => array('on' => t('On'), 'off' => t('Off')),
      '#default_value' => theme_get_setting('slider','happyday'),
  	);
	$form['settings']['style']['music'] = array(
      '#type' => 'select',
      '#title' => t('Music'),
      '#options' => array('on' => t('On'), 'off' => t('Off')),
      '#default_value' => theme_get_setting('music','happyday'),
  	);

	//========= End ================
	
}