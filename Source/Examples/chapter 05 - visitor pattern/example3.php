<?php
/**
 *  Project    : Artifex
 *  Date       : 2-11-2004
 *  Authors    : Klaas van der Schaaf (schaa101@tech.nhl.nl)
 *               Arjen van der Ende   (ende101@tech.nhl.nl)
 *               Leendert Ullersma    (uller100@tech.nhl.nl)
 *
 *  Filename   : ./index.php
 *
 *  © 2004, Artifex.
 **/
  require_once( "./class/ART_Root.php" );
  require_once( "./class/component/ART_Component.php" );
  require_once( "./class/component/ART_Decorator.php" );

  /* Create the root */
  $root = new ART_Root( "Artifex - Visitor Demo" );
  
  /* Add stylesheets to the root object */
  $root->AddStyleSheet( "./css/example.class.css" );
  $root->AddStyleSheet( "./css/example.id.css" );

  /* Include page files */
  include( './page/header.php' );
  include( './page/content.php' );
  include( './page/footer.php' );

  /* Compile the root */
  $root->Compile( new ART_HTMLGeneratorVisitor() );
?>
