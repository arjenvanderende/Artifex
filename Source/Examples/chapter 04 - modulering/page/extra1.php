<?php
  $extra = new ART_Group();
  $extra_text = new ART_Paragraph();
  $extra_text->SetText( "Een extra pagina" );
  $extra_text->SetID( "extra_text" );
  $extra->AddComponent( $extra_text );
  $root->AddComponent( $extra );
?>