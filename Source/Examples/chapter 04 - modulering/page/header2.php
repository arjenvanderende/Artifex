<?php
  $root->OpenGroup( "header" );
    $header_text = new ART_Paragraph();                                            
    $header_text->SetText( "Artifex" );
    $header_text->SetID( "header_text" );
    $root->AddComponent( $header_text );
  $root->CloseGroup();
?>