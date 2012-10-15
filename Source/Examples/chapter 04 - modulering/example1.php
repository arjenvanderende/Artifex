<?php
  require_once( "./class/ART_Root.php" );
  require_once( "./class/component/ART_Component.php" );
  require_once( "./class/component/ART_Decorator.php" );

  /* Create the root */
  $root = new ART_Root( "Artifex - Module Demo" );

  /* Add stylesheets to the root object */
  $root->AddStyleSheet( "./css/example1.class.css" );
  $root->AddStyleSheet( "./css/example1.id.css" );
  
  /* Include page files */
  include( './page/header1.php' );

  $page = strtolower( $_GET['page'] );
 
  switch( $page )
  {
    case extra:
      include( './page/extra1.php' );
      break;
    case main:
    default:
      include( './page/main1.php' );
      break;
  }

  include( './page/footer1.php' );

  /* Compile the root */
  $root->Compile();
?>