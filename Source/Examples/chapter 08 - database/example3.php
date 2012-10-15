<?php
/**
 *  Project    : Artifex
 *  Date       : 18-1-2005
 *  Authors    : Klaas van der Schaaf (schaa101@tech.nhl.nl)
 *               Arjen van der Ende   (ende101@tech.nhl.nl)
 *               Leendert Ullersma    (uller100@tech.nhl.nl)
 *
 *  Filename   : ./example3.php {Retreive information}
 *
 *  © 2004, Artifex.
 **/

  require_once( "./class/ART_Root.php" );
  require_once( "./class/component/ART_Component.php" );
  require_once( "./class/component/ART_Decorator.php" );
  require_once( "./class/ART_Database.php" );
  require_once( "./class/ART_ErrorHandler.php" );

  $root = ART_Root::GetInstance();
  $root->SetTitle( "Artifex - Database Demo" );

  // Add stylesheets
  $root->AddStyleSheet( "./css/example3.class.css" );
  $root->AddStyleSheet( "./css/example3.id.css" );
  
  $database = ART_Database::GetInstance();

  // Get all topics
  $query = "SELECT component FROM topic ORDER BY id DESC";

  // Execute the query and show the result
  $result = $database->Query( $query );
  while( $object = mysql_fetch_object( $result ) )
  {
    $component = unserialize( $object->component );
    $root->AddComponent( $component );
  }

  $root->Compile( new ART_HTMLGeneratorVisitor() );
?>
