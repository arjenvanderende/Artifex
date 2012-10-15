<?php
  $root = ART_Root::GetInstance();
  $root->OpenGroup( "header" );                                                    // Open a new group
    $header_logo = new ART_Image();                                                // Create the logo
    $header_logo->SetImage( "./images/nhl.gif" );                                  // Set the image that will be displayed
    $header_logo->SetText( "NHL-logo" );                                           // Set the alternate text
    $header_logo->SetID( "logo" );                                                 // Set the css-id for the logo
    $root->AddComponent( $header_logo );                                           // Add the logo to the active group in root

    $header_text = new ART_Paragraph();                                            // Create the title
    $header_text->SetText( "Artifex" );                                            // Set the title-text
    $header_text->SetID( "header_text" );                                          // Set the css-id for the title
    $root->AddComponent( $header_text );                                           // Add the title to the active group in root
  $root->CloseGroup();                                                             // Close the group
?>
