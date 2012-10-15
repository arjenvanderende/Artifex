<?php
  $root = ART_Root::GetInstance();
  $root->OpenGroup( "menu_layout" );

    // Add the title of the menu
    $topic_title = new ART_Text();
    $topic_title->SetID( "menu_title" );
    $topic_title->SetText( "Uiterlijk" );
    $root->AddComponent( $topic_title );

    // Add the menu items
    $menu_css0 = new ART_Text();
    $menu_css0->SetText( "FOK!" );
    $menu_css0_link = new ART_Link( "?css=fok", $menu_css0 );
    $menu_css0_link->SetID( "menu_item" );
    $root->AddComponent( $menu_css0_link );

    $menu_css1 = new ART_Text();
    $menu_css1->SetText( "Tweakers" );
    $menu_css1_link = new ART_Link( "?css=tweakers", $menu_css1 );
    $menu_css1_link->SetID( "menu_item" );
    $root->AddComponent( $menu_css1_link );

    $menu_css2 = new ART_Text();
    $menu_css2->SetText( "Geen Stijl" );
    $menu_css2_link = new ART_Link( "?css=geenstijl", $menu_css2 );
    $menu_css2_link->SetID( "menu_item" );
    $root->AddComponent( $menu_css2_link );

  $root->CloseGroup();

?>
