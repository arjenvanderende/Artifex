<?php
  $header = new ART_Group();
  $header_text = new ART_Paragraph();                                            
  $header_text->SetText( "Artifex" );
  $header_text->SetID( "header_text" );
  $header->AddComponent( $header_text );
  $root->AddComponent( $header );
?>