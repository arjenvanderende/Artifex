<?php
  $root = ART_Root::GetInstance();
  $root->OpenGroup( "menu_weblog" );

		// Add the menu title
    $topic_title = new ART_Text();
    $topic_title->SetID( "menu_title" );
    $topic_title->SetText( "Weblog" );
    $root->AddComponent( $topic_title );

		// Add the latest weblog topics as menu items
    $database = ART_Database::GetInstance();
    $query = "SELECT id, title, UNIX_TIMESTAMP( date ) AS date FROM topic ORDER BY id DESC LIMIT 10;";
    $result = $database->Query( $query );
    while( $object = mysql_fetch_object( $result ) )
    {
      $topic_list_item = new ART_Text();
      $topic_list_item->SetText( date('H:i', $object->date) . "&nbsp&nbsp" . $object->title );
      $topic_list_item_link = new ART_Link( "/Artifex/Weblog/".$object->id,$topic_list_item, ART_Link::SELF );
      $topic_list_item_link->SetID( "menu_item" );
      $root->AddComponent( $topic_list_item_link );
    }

  $root->CloseGroup();
?>