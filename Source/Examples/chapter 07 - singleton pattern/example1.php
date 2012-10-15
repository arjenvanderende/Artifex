<?php
/**
 *  Project    : Artifex
 *  Date       : 11-01-2005
 *  Authors    : Klaas van der Schaaf (schaa101@tech.nhl.nl)
 *               Arjen van der Ende   (ende101@tech.nhl.nl)
 *               Leendert Ullersma    (uller100@tech.nhl.nl)
 *
 *  Filename   : ./example1.php
 *
 *  © 2004, Artifex.
 **/

  require_once( "./class/ART_Root.php" );
  require_once( "./class/component/ART_Component.php" );
  require_once( "./class/component/ART_Decorator.php" );
  require_once( "./class/ART_ErrorHandler.php" );

  /* Create the root */
  $root = ART_Root::GetInstance();
  $root->SetTitle( "Artifex - Singleton Demo" );
  
  /* Add a few errors to the errorlog */
  $errorhandler = ART_ErrorHandler::GetInstance();
  $errorhandler->ReportError( "Een foutmelding naar een bestand", ART_ErrorHandler::FILE );
  $errorhandler->ReportError( "Een foutmelding naar het scherm", ART_ErrorHandler::SCREEN );
  $errorhandler->ReportError( "Een foutmelding via mail", ART_ErrorHandler::MAIL );

  /* Compile the root */
  $root->Compile( new ART_HTMLGeneratorVisitor() );
?>
