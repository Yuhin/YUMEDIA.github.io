<?php

require_once("meta-box-class.php");

if (is_admin()){

	//All meta boxes prefix
	$prefix = 'allure_';


	$config1 = array(
	'id' => 'featured_post',          			// meta box id, unique per meta box
	'title' => 'Post is Featured?',          		// meta box title
	'pages' => array('post'),      		// post types, accept custom post types as well, default is array('post'); optional
	'context' => 'normal',            		// where the meta box appear: normal (default), advanced, side; optional
	'priority' => 'high',            		// order of meta box: high (default), low; optional
	'fields' => array(),            		// list of meta fields (can be added by field arrays)
	'local_images' => true,          		// Use local or hosted images (meta box images for add/remove)
	'use_with_theme' => true          		//change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
	);


	//Initiate bio info meta box
	$my_meta1 =  new AT_Meta_Box($config1);


	//Bio info fields
	$my_meta1->addCheckbox($prefix.'f_is_featured',array('name'=> 'Show as featured?', 'desc'=>'Эта запись будет показана на главной странице'));
	$my_meta1->addCheckbox($prefix.'f_is_hot',array('name'=> 'Show as hot story? ', 'desc'=>'Это сообщение будет показано, как горячая история'));

    //Finish bio info meta mox decleration
	$my_meta1->Finish();
	
	


}