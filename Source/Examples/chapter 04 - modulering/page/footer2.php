<?php
  $root->OpenGroup( "footer" );
	  $footer_text = new ART_Paragraph();
  	$footer_text->SetText( "© 2005 Artifex" );
	  $footer_text->SetID( "footer_text" );
  	$root->AddComponent( $footer_text );
  $root->CloseGroup();
?>