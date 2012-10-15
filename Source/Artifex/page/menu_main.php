<?php
  $root = ART_Root::GetInstance();
  $root->OpenGroup( "menu_main" );

		// Add the menu title
    $topic_title = new ART_Text();
    $topic_title->SetID( "menu_title" );
    $topic_title->SetText( "Menu" );
    $root->AddComponent( $topic_title );

		// Add the menu items
    $menu_main = new ART_Text();
    $menu_main->SetText( "Home" );
    $menu_main_link = new ART_Link( "/Artifex/", $menu_main );
    $menu_main_link->SetID( "menu_item" );
    $root->AddComponent( $menu_main_link );

    $menu_weblog = new ART_Text();
    $menu_weblog->SetText( "Weblog" );
    $menu_weblog_link = new ART_Link( "/Artifex/Weblog", $menu_weblog );
    $menu_weblog_link->SetID( "menu_item" );
    $root->AddComponent( $menu_weblog_link );

    $menu_weblog_add = new ART_Text();
    $menu_weblog_add->SetText( "New topic" );
    $menu_weblog_add_link = new ART_Link( "/Artifex/AddWeblog", $menu_weblog_add );
    $menu_weblog_add_link->SetID( "menu_item" );
    $root->AddComponent( $menu_weblog_add_link );

  $root->CloseGroup();
?>
