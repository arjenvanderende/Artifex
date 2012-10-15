<?php
/**
 *  Project    : Artifex
 *  Date       : 20-12-2004
 *  Authors    : Klaas van der Schaaf (schaa101@tech.nhl.nl)
 *               Arjen van der Ende   ( ende101@tech.nhl.nl)
 *               Leendert Ullersma    (uller100@tech.nhl.nl)
 *
 *  Filename   : ./index.php
 *
 *  © 2004, Artifex.
 **/
  require_once( "./class/ART_Root.php" );

  /* Create the root */
  $root = new ART_Root( "Artifex - Framework Demo" );
  
  /* Add stylesheets to the root object */
  $root->AddStyleSheet( "./css/example1.css" );

  /* Create the components */
  $logo = "    <img src=\"./images/artifex.jpg\" id=\"logo\"/>\n";

  /* Add the components of this page */
  $root->AddComponent( $logo );

  /* Compile the root */
  $root->Compile();
?>
