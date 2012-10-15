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
  require_once( "./class/ART_ErrorHandler.php" );
  require_once( "./class/ART_Database.php" );
  require_once( "./class/ART_User.php" );

  // Retrieve the css-layout from the session-object
  session_start();  
  if( !isset( $_SESSION['user'] ) )
    $_SESSION['user'] = new ART_User();
  if( isset( $_GET['css'] ) )
    $_SESSION['user']->SetCss( $_GET['css'] );
  
  define( LOCAL_IP, $_SERVER["SERVER_ADDR"] );                          // IP-address of the server
  define( IMAGE_PREFIX, "http://" . LOCAL_IP  . "/Artifex/images/" );   // Prefix for images on the server

  // Create the root
  $root = ART_Root::GetInstance();
  $root->SetTitle( "Artifex - Weblog" );
  
  // Add stylesheets to the root object
  $root->AddStyleSheet( "/Artifex/css/" . $_SESSION['user']->GetCss() . "class.css" );
  $root->AddStyleSheet( "/Artifex/css/" . $_SESSION['user']->GetCss() . "id.css" );

  // Include page files
  include( './page/header.php' );
 
  $root->OpenGroup( "content" );
    include( './page/menu_main.php' );
    include( './page/menu_topiclist.php' );
    include( './page/menu_layout.php' );
    include( './page/menu_search.php' );

    // Explode the url to see if a specific page is requested
    $url_array1 = explode( "?", $_SERVER['REQUEST_URI'] );
    $url_array = explode( "/", $url_array1[0] );
    $page = strtolower( $url_array[2] );
    switch( $page )
    {
      case nieuws:
      case weblog:
        include( './page/content_weblog.php' );
        break;
      case addweblog:
        include( './page/content_submittopic.php' );
        break;
      case stapover:
        include( './page/content_purchase.php' );
        break;
      case search:
      case zoek:
        include( './page/content_search.php' );
        break;
      default:
        include( './page/content_home.php' );
        break;
    }
  $root->CloseGroup();
  
  include( './page/footer.php' );

  // Compile the root
  $root->Compile( new ART_HTMLGeneratorVisitor() );
?>
