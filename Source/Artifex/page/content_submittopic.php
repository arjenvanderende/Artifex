<?php
  $root = ART_Root::GetInstance();
  
  // Check if a submit button is pressed
  if( isset( $_POST[submit] ) )
  {
    // Submit button is pressed; validate input and update database
    $root->OpenGroup( "news" );

			// Create a new topic    
			$topic = new ART_Group();
			$topic->SetID( "topic" );
			$root->AddComponent( $topic );
      
      // Add the title to the topic
      $topic_title = new ART_Text();
      $topic_title->SetID( "topic_title" );
      $topic_title->SetText( stripslashes( $_POST['topic-input'] ). "<br/>" );
      $topic->AddComponent( $topic_title );
      
      // Add subtitle ( author, email & date
      $date = Date( "j F Y @ H:i" );
      $topic_subtitle = new ART_Text();
      $topic_subtitle->SetID( "topic_subtitle" );
      $topic_subtitle->SetText( "Author: " . stripslashes( $_POST['author-input'] ) . " "
                              . "("  . stripslashes( $_POST['email-input'] ) . ")<br/>"
                              . "Date: " . $date . "<br/>");
      $topic->AddComponent( $topic_subtitle );

      // Add an image, if specified
      if( $_POST['image-input'] != "" )
      {
        $topic_image = new ART_Image();
        $topic_image->SetID( "topic_image" );
        $topic_image->SetImage( stripslashes( $_POST['image-input'] ) );
        $topic_image->SetText( stripslashes( $_POST['image-input'] ) );
        $topic->AddComponent( $topic_image );      
      }

      // Add the message
      $topic_text = new ART_Paragraph();
      $topic_text->SetID( "topic_text" );
      $topic_text->SetText( nl2br( stripslashes( $_POST['text-input'] ) ) );
      $topic->AddComponent( $topic_text );

    $root->CloseGroup();

		// Update the database
    $database = ART_Database::GetInstance();
    $topicstring = mysql_real_escape_string( serialize( $topic ) );
    $query = "INSERT INTO Topic"
           . " VALUES( '', '" . stripslashes( $_POST['topic-input'] ) . "', '" . stripslashes( $_POST['author-input'] ) . "', '" . Date( "YmdHis" ) . "','". $topicstring ."' );";
    $database->Query( $query );
  }
  else
  { 
  	// Submit button not pressed; create submit form
    $root->OpenGroup( "news" );
    $root->OpenGroup( "topic" );
    
      // Add title text
      $text = new ART_Text();
      $text->SetText( "Vul hier de gegevens in!" );
      $text->SetID( "topic_title" );
      $root->AddComponent( $text );
      
    	// Create the submit form
      $form = new ART_Form();
      $form->SetID( "submit_form" );
      $form->SetAction( "./AddWeblog" );  
      $root->AddComponent( $form ); 

      // Add topic input field
      $topic_field = new ART_Input();
      $topic_field->SetLabel( "Topic" );
      $topic_field->SetID( "topic-input" );
      $form->AddComponent( $topic_field );      

      // Add author input field
      $author_field = new ART_Input();
      $author_field->SetLabel( "Author" );
      $author_field->SetID( "author-input" );
      $form->AddComponent( $author_field );     

			// Add email input field
      $email_field = new ART_Input();
      $email_field->SetLabel( "Email" );
      $email_field->SetID( "email-input" );
      $form->AddComponent( $email_field );      

			// Add message textarea
      $textarea = new ART_TextArea();
      $textarea->SetLabel( "Message" );
      $textarea->SetID( "text-input" );
      $form->AddComponent( $textarea );

      // Add image input field
      $image_field = new ART_Input();
      $image_field->SetLabel( "Image (url)" );
      $image_field->SetID( "image-input" );
      $form->AddComponent( $image_field );      

			// Add submit button
      $submit = new ART_Button();
      $submit->SetType( ART_Button::SUBMIT );
      $submit->SetID( "submit" );
      $submit->SetText( "Send" );
      $form->AddComponent( $submit );

			// Add clear button      
      $reset = new ART_Button();
      $reset->SetType( ART_Button::RESET );
      $reset->SetID( "button_clear" );
      $reset->SetText( "Clear" );
      $form->AddComponent( $reset );
      
    $root->CloseGroup();
    $root->CloseGroup();
  }
  
?>
