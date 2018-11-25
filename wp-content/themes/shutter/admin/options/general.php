<?php
$options[] = array( "name" => "General",
						"sicon" => "advancedsettings.png",
                        "type" => "heading");

    $options[] = array( "name" => "Company Logo",
                        "desc" => "Click to 'Upload Image' button and upload your logo.",
                        "id" => SN."clogo",
                        "std" => "",
                        "type" => "upload");

    $options[] = array( "name" => "Company Text",
                        "desc" => "Use text as logo",
                        "id" => SN."clogo_text",
                        "std" => "Shutter",
                        "type" => "text");

    $options[] = array( "name" => "Company Slogan",
                        "desc" => "",
                        "id" => SN."cslogan",
                        "std" => "",
                        "type" => "text");

	$options[] = array( "name" => "Custom Favicon",
                        "desc" => "You can use your own custom favicon. Click to 'Upload Image' button and upload your favicon.",
                        "id" => SN."custom_shortcut_favicon",
                        "std" => "",
                        "type" => "upload"); 

    $options[] = array( "name" => "Homepage Category for Posts",
                        "desc" => "select the category of posts to be displayed on the homepage",
                        "id" => SN."homepage_category",
                        "std" => "",
                        "type" => "select",
                        "options" => $options_categories
                      ); 
?>