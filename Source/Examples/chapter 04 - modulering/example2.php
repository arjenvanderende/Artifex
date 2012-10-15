<?php
  require_once( "./class/ART_Root.php" );
  require_once( "./class/component/ART_Component.php" );
  require_once( "./class/component/ART_Decorator.php" );

  /* Create the root */
  $root = new ART_Root( "Artifex - Module Demo" );
  
  /* Add stylesheets to the root object */
  $root->AddStyleSheet( "./css/example2.class.css" );
  $root->AddStyleSheet( "./css/example2.id.css" );

  /* Include page files */
  include( './page/header2.php' );

  $page = strtolower( $_GET['page'] );
  switch( $page )
  {
    case extra:
      include( './page/extra2.php' );
      break;
    case main:
    default:
      include( './page/main2.php' );
      break;
  }

  include( './page/footer2.php' );

  /* Compile the root */
  $root->Compile();
?>