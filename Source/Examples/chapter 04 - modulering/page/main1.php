<?php
  $main = new ART_Group();
    $main_text = new ART_Paragraph();
    $main_text->SetText( "Begin pagina" );
    $main_text->SetID( "main_text" );
  $main->AddComponent( $main_text );
  
    $text = new ART_Text();
    $text->SetText( "Ga naar de extra pagina" );
    $link = new ART_Link( "./example1.php?page=extra", $text, ART_LINK::SELF );

  $main->AddComponent( $link );
   
  $root->AddComponent( $main );
?>