<?php
  $root->OpenGroup( "main" );
    $main_text = new ART_Paragraph();
    $main_text->SetText( "Begin pagina" );
    $main_text->SetID( "main_text" );
    $root->AddComponent( $main_text );
  
    $text = new ART_Text();
    $text->SetText( "Ga naar de extra pagina" );
    $link = new ART_Link( "example2.php?page=extra", $text, ART_LINK::SELF );
    $root->AddComponent( $link );
   
  $root->CloseGroup();
?>