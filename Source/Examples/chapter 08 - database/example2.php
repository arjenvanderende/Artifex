<?php
/**
 *  Project    : Artifex
 *  Date       : 18-1-2005
 *  Authors    : Klaas van der Schaaf (schaa101@tech.nhl.nl)
 *               Arjen van der Ende   (ende101@tech.nhl.nl)
 *               Leendert Ullersma    (uller100@tech.nhl.nl)
 *
 *  Filename   : ./example2.php {Insert information}
 *
 *  © 2004, Artifex.
 **/
  require_once( "./class/ART_Root.php" );
  require_once( "./class/component/ART_Component.php" );
  require_once( "./class/component/ART_Decorator.php" );
  require_once( "./class/ART_Database.php" );
  require_once( "./class/ART_ErrorHandler.php" );

  $root = ART_Root::GetInstance();
  $root->SetTitle( "Artifex - Database Demo" );

  // Add stylesheets
  $root->AddStyleSheet( "./css/example2.class.css" );
  $root->AddStyleSheet( "./css/example2.id.css" );

  // Check if a submit button is pressed
  if( isset( $_POST['submit'] ) )
  {
    // Submit button is pressed; validate input and update database
    $root->OpenGroup( "message" );

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
      $topic_subtitle->SetText( "Author: " . stripslashes( $_POST['author-input'] ) . "<br/>"
                              . "Date: " . $date . "<br/>");
      $topic->AddComponent( $topic_subtitle );

      // Add the message
      $topic_text = new ART_Paragraph();
      $topic_text->SetID( "topic_text" );
      $topic_text->SetText( nl2br( stripslashes( $_POST['text-input'] ) ) );
      $topic->AddComponent( $topic_text );

    $root->CloseGroup();

    // Update the database
    $database = ART_Database::GetInstance();
    $topicstring = mysql_real_escape_string( serialize( $topic ) );
    $query = "INSERT INTO topic"
           . " VALUES( '', '" . stripslashes( $_POST['topic-input'] ) . "', '" . stripslashes( $_POST['author-input'] ) . "', '" . Date( "YmdHis" ) . "','". $topicstring ."' );";
    $database->Query( $query );
  }
  else
  { 
    // Submit button not pressed; create submit form
    $root->OpenGroup( "news" );

      // Add title text
      $text = new ART_Text();
      $text->SetText( "Vul hier de gegevens in!" );
      $text->SetID( "topic_title" );
      $root->AddComponent( $text );

      // Create the submit form
      $form = new ART_Form();
      $form->SetID( "submit_form" );
      $form->SetAction( "./example2.php" );  
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

      // Add message textarea
      $textarea = new ART_TextArea();
      $textarea->SetLabel( "Message" );
      $textarea->SetID( "text-input" );
      $form->AddComponent( $textarea );

      // Add submit button
      $submit = new ART_Button();
      $submit->SetType( ART_Button::SUBMIT );
      $submit->SetID( "submit" );
      $submit->SetText( "Send" );
      $form->AddComponent( $submit );

    $root->CloseGroup();
  }

  $root->Compile( new ART_HTMLGeneratorVisitor() );
?>
