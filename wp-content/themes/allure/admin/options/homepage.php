<?php
	$options[] = array("name" => "Homepage",
						"sicon" => "user-home.png",
						"type" => "heading");
    
    $options[] = array( "name" => "Homepage Image",
                        "desc" => "Click to 'Upload Image' button and upload your default homepage image. If nothing is uploaded, default WWWH svg logo will be used.",
                        "id" => SN."homepageimg",
                        "std" => "$blogpath/img/large.jpg",
                        "type" => "upload");

    $options[] = array( "name" => "Homepage Intro Text",
                        "desc" => "",
                        "id" => SN."homepagetext",
                        "std" => "WELCOME TO
                        My Fashion Blog",
                        "type" => "textarea");
    

    $options[] = array( "name" => "Enable New Stories Section",
						"desc" => "",
						"id" => SN."newstories",
						"std" => "1",
						"type" => "checkbox");
    $options[] = array( "name" => "New Stories Section - Title",
						"desc" => "",
						"id" => SN."newstories_title",
						"std" => "New Stories",
						"type" => "text");

    $options[] = array( "name" => "Enable Hot Stories Section",
						"desc" => "",
						"id" => SN."hotstories",
						"std" => "1",
						"type" => "checkbox");
    $options[] = array( "name" => "Hot Stories Section - Title",
						"desc" => "",
						"id" => SN."hotstories_title",
						"std" => "Hot Stories",
						"type" => "text");
						
?>