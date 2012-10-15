<?php
  $root = ART_Root::GetInstance();
  $root->OpenGroup( "header" );                                                    // Open a new group

		// Add the website-logo
    $header_logo = new ART_Image();                                                // Create the logo
    $header_logo->SetImage( IMAGE_PREFIX . "w38109.bmp" );                         // Set the image that will be displayed
    $header_logo->SetText( "Artifex-logo" );                                       // Set the alternate text
    $header_logo->SetID( "logo" );                                                 // Set the css-id for the logo
    //$root->AddComponent( $header_logo );                                           // Add the logo to the active group in root

  $root->CloseGroup();                                                             // Close the group
?>
