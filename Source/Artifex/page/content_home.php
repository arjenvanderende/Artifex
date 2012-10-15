<?php
  $root = ART_Root::GetInstance();
  $root->OpenGroup( "news" );
  $root->OpenGroup( "topic" );

    $content_title = new ART_Text();                                                  // Create a title for the content
    $content_title->SetText( "Artifex, het nieuwe ontwikkelen van webpages<br/>" );  // Set the text for the title
    $content_title->SetID( "topic_title" );                                           // Set the css-id for the content title
    $root->AddComponent( $content_title );                                            // Add the title to the active group in root
    
    $root->OpenGroup("topic_content");
  
      // Create the 'happy user' image
      $content_image = new ART_Image();                                                // Create the user-image
      $content_image->SetImage( IMAGE_PREFIX . "ogwp_lady.jpg" );                      // Set the image that will be displayed
      $content_image->SetText( "Eén van de vele blije OGWP gebruikers" );              // Set the alternate text
      $content_image->SetID( "user_image" );                                           // Set the css-id for the user-image
      $content_image_link = new ART_Link( "./images/ogwp_lady.jpg", $content_image );  // Create a link for the user-image
      $content_image_link->SetID( "user_image_link" );                                 // Set the css-id for the link to the image

      // Create the paragraphs of text
      $content_paragraph1 = new ART_Paragraph();
      $content_paragraph1->SetText( "Met Artifex™ kunt u nu nog sneller en eenvoudiger uw website onderhouden. Niet alleen de inhoud is gemakkelijk te onderhouden, maar ook het layout dankzij het Object-Georiënteerd Webdesign Patterns (OGWP) systeem." );
      $content_paragraph1->SetID( "topic_text" );
    	
      $content_paragraph2 = new ART_Paragraph();
      $content_paragraph2->SetID( "topic_text" );
      $content_paragraph2->SetText( "Het OGWP systeem biedt de volgende voordelen:<br/>" .
                                  "<ul>" .
                                  "<li>Makkelijk een professionele webapplicatie-ontwikkeling<br/></li>" .
                                  "<li>Stabiel en betrouwbaar</li>" .
                                  "<li>Object-Georiënteerd, dus makkelijk uitbreidbaar<br/></li>" .
                                  "<li>Onderhoudsarm</li>" .
                                  "<li>Gebruik van de nieuwste Design Patterns technieken<br/></li>" .
                                  "<li>Volledige PHP5 ondersteuning<br/></li>" .
                                  "</ul>" );
      $content_paragraph3 = new ART_Text();
      $content_paragraph3->SetID( "topic_text" );
      $content_paragraph3->SetText( "Bespaar uzelf moeite en maak nu de overstap naar Artifex!" );

      $content_paragraph3_link = new ART_Link( "./StapOver", $content_paragraph3, ART_LINK::TOP );
      $content_paragraph3_link->SetID( "user_image_link" );

      // Add the components to the active group in the root
      $root->AddComponent( $content_image_link );                                      // Add the user-image to the contentgroup
      $root->AddComponent( $content_paragraph1 );                                      // Add the paragraph to the active group in root

      $root->AddComponent( $content_paragraph2 );                                      // Add the paragraph to the active group in root
      $root->AddComponent( $content_paragraph3_link );                                 // Add the link to the active group in root
  	$root->CloseGroup();
  $root->CloseGroup();
  $root->CloseGroup();
?>
