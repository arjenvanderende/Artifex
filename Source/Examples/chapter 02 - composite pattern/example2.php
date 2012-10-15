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
  $root->AddStyleSheet( "./css/example2.class.css" );
  $root->AddStyleSheet( "./css/example2.id.css" );

  /* Create the header of the webpage */
  $header = new ART_Group();                                                       // Create a group to contain the logo and title
  $header->SetID( "header" );                                                      // Set the css-id for the header
  $root->AddComponent( $header );

  $header_logo = new ART_Image();                                                  // Create the logo
  $header_logo->SetImage( "./images/nhl.gif" );                                    // Set the image that will be displayed
  $header_logo->SetText( "NHL-logo" );                                             // Set the alternate text
  $header_logo->SetID( "logo" );                                                   // Set the css-id for the logo
  $header->AddComponent( $header_logo );                                           // Add the logo to the headergroup

  $header_text = new ART_Paragraph();                                              // Create the title
  $header_text->SetText( "Artifex" );                                              // Set the title-text
  $header_text->SetID( "header_text" );                                            // Set the css-id for the title
  $header->AddComponent( $header_text );                                           // Add the title to the headergroup

  /* Create the content of the webpage */
  $content = new ART_Group();                                                      // Create a group for the content
  $content->SetID( "news" );                                                       // Set the css-id for the content

  $content_image = new ART_Image();                                                // Create the user-image
  $content_image->SetImage( "./images/ogwp_lady.jpg" );                            // Set the image that will be displayed
  $content_image->SetText( "Eén van de vele blije OGWP gebruikers" );              // Set the alternate text
  $content_image->SetID( "user_image" );                                           // Set the css-id for the user-image
  $content->AddComponent( $content_image );                                        // Add the user-image to the contentgroup


  $content_title = new ART_Paragraph();                                            // Create a title for the content
  $content_title->SetText( "Artifex, het nieuwe ontwikkelen van webpages." );      // Set the text for the title
  $content_title->SetID( "news_title" );                                           // Set the css-id for the content title

  /* Create the paragraphs of text */
  $content_paragraph1 = new ART_Paragraph();
  $content_paragraph1->SetText( "Met Artifex kunt u nu nog sneller en eenvoudiger uw website onderhouden. Niet alleen de inhoud is gemakkelijk te onderhouden, maar ook het layout dankzij het Object-Georiënteerd Webdesign Patterns (OGWP) systeem." );
  $content_paragraph2 = new ART_Paragraph();
  $content_paragraph2->SetText( "Het OGWP systeem biedt de volgende voordelen:<br/>" .
                                "<ul>" .
                                "<li>Makkelijk een professionele webapplicatie-ontwikkeling<br/></li>" .
                                "<li>Stabiel en betrouwbaar</li>".
                                "<li>Object-Georiënteerd, dus makkelijk uitbreidbaar<br/></li>" .
                                "<li>Onderhoudsarm</li>".
                                "<li>Gebruik van de nieuwste Design Patterns technieken<br/></li>" .
                                "<li>Volledige PHP5 ondersteuning<br/></li>" .
                                "</ul>" );
  $content_paragraph3 = new ART_Text();
  $content_paragraph3->SetText( "Bespaar uzelf moeite en maak nu de overstap naar Artifex!" );

  /* Add the title and paragraphs to the contentgroup */
  $content->AddComponent( $content_title );
  $content->AddComponent( $content_paragraph1 );
  $content->AddComponent( $content_paragraph2 );
  $content->AddComponent( $content_paragraph3 );
  $root->AddComponent( $content );

  /* Create the footer component of the webpage */
  $footer = new ART_Group();                                                  // Create a group for the footer

  $copyright_text = new ART_Paragraph();                                      // Create the copyright text
  $copyright_text->SetText( "© 2004 Arjen van der Ende, Leendert Ullersma, Klaas van der Schaaf." );
  $copyright_text->SetID( "footer_text" );                                    // Set the css-id for the copyright text
  $footer->AddComponent( $copyright_text );
  $footer->SetID( "footer" );                                                 // Set the css-id for the footer
  $root->AddComponent( $footer );

  /* Compile the root */
  $root->Compile();
?>
