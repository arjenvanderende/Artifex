<?php
  $root = ART_Root::GetInstance();
  $root->OpenGroup( "menu_search" );

		// Add the menu title
    $topic_title = new ART_Text();
    $topic_title->SetID( "menu_title" );
    $topic_title->SetText( "Zoeken" );
    $root->AddComponent( $topic_title );

		// Add a submit form
		$form = new ART_Form();
		$form->SetID( "submit_form" );
		$form->SetAction( "/Artifex/Zoek" );  
    $root->AddComponent( $form ); 

		// Add a search-field to the form
		$topic_field = new ART_Input();
		$topic_field->SetID( "search_input" );
		$form->AddComponent( $topic_field );      

		// Add a submit-button to the form
		$submit = new ART_Button();
		$submit->SetType( ART_Button::SUBMIT );
		$submit->SetID( "submit" );
		$submit->SetText( "Zoek" );
		$form->AddComponent( $submit );

  $root->CloseGroup();
?>