<?php
/**
 *  Project    : Artifex
 *  Date       : 20-12-2004
 *  Authors    : Klaas van der Schaaf (schaa101@tech.nhl.nl)
 *               Arjen van der Ende   (ende101@tech.nhl.nl)
 *               Leendert Ullersma    (uller100@tech.nhl.nl)
 *
 *  Filename   : ./index.php
 *
 *  © 2004, Artifex.
 **/
  require_once( "./class/ART_Root.php" );
  require_once( "./class/component/ART_Component.php" );

  /* Create the root */
  $root = new ART_Root( "Artifex - Composite Demo" );
  
  /* Add stylesheets to the root object */
  $root->AddStyleSheet( "./css/example1.class.css" );
  $root->AddStyleSheet( "./css/example1.id.css" );

  /* Create a set of components */
  $text1 = new ART_Text();                                      // Create a text component
  $text1->SetText( "Dit is tekst!" );                           // Set the text
  $root->AddComponent( $text1 );                                // Add the text to the root

  $text2 = new ART_Text();                                      // Create another text component
  $text2->SetID( "text" );                                      // Set the css-id
  $text2->SetText( "Dit is nog meer tekst!" );                  // Set the text
  $root->AddComponent( $text2 );                                // Add the text to the root
  
  $paragraph = new ART_Paragraph();                             // Create a paragraph of text
  $paragraph->SetID( "paragraph" );                             // Set the css-id
  $paragraph->SetText( "Dit is een paragraaf tekst!" );         // Set the text
  $root->AddComponent( $paragraph );                            // Add the paragraph to the root

  $image = new ART_Image();                                     // Create an image
  $image->SetImage( "./images/plaatje.bmp" );                   // Set the url for the image
  $image->SetText( "NHL-logo" );                                // Set the alternate text
  $root->AddComponent( $image);                                 // Add the image to the root

  $group = new ART_Group();                                     // Create a group
  $group->SetID( "group" );                                     // Set the css-id
  $root->AddComponent( $group );                                // Add the group to the root

  $group->AddComponent( $text1 );                               // Add the same text to the group
  $group->AddComponent( $text2 );                               // Add the same "another" text to the group
  $group->AddComponent( $paragraph );                           // Add the same paragraph to the root
  $group->AddComponent( $image );                               // Add the same image to the root

  /* Compile the root */
  $root->Compile();
?>
