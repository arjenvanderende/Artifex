<?php
  $root->OpenGroup( "footer" );
    $copyright_text = new ART_Paragraph();                                      // Create the copyright text
    $copyright_text->SetText( "© 2004 Arjen van der Ende, Leendert Ullersma, Klaas van der Schaaf." );
    $copyright_text->SetID( "footer_text" );                                    // Set the css-id for the copyright text
    $root->AddComponent( $copyright_text );                                     // Add the footer  to the active group in root
  $root->CloseGroup();
?>
