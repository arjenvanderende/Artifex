<?php
/**
 *  Project    : Artifex
 *  Date       : 20-12-2004
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
  $root = new ART_Root( "Artifex - Decorator Demo" );
  
  /* Add stylesheets to the root object */
  $root->AddStyleSheet( "./css/example1.class.css" );

  $text = new ART_Text();
  $text->SetText( "Dit is een link" );
  $link = new ART_Link( "http://www.google.com", $text, ART_LINK::BLANK );
  $root->AddComponent( $link );
  
  /**
   * Compile the root
   **/
  $root->Compile();
?>
