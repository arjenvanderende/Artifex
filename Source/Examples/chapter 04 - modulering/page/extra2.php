<?php
  $root->OpenGroup( "extra" );
    $extra_text = new ART_Paragraph();
    $extra_text->SetText( "Een extra pagina" );
    $extra_text->SetID( "extra_text" );
    $root->AddComponent( $extra_text );
  $root->CloseGroup();
?>