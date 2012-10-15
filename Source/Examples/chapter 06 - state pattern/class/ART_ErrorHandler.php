<?php
/**
 *  Project    : Artifex
 *  Date       : 30-11-2004
 *  Authors    : Klaas van der Schaaf (schaa101@tech.nhl.nl)
 *               Arjen van der Ende   (ende101@tech.nhl.nl)
 *               Leendert Ullersma    (uller100@tech.nhl.nl)
 *
 *  Filename   : ./ART_ErrorHandler.php
 *
 *  © 2004, Artifex.
 **/
  
  require_once( "./class/state/ART_Error.php" );

  class ART_ErrorHandler
  {
    const FILE   = 1;       // Write to file
    const SCREEN = 2;       // Print to screen
    const MAIL   = 3;       // Send an email
    
    /**
     * Report a new error
     * Param: $message  - The error message to log
     *        $priority - The priority of the error
     **/
    public function ReportError( $message, $priority )
    {
      switch( $priority )
      {
        default:
        case ART_ErrorHandler::FILE:
          $error = new ART_Error();
          break;
        case ART_ErrorHandler::SCREEN:
          $error = new ART_ScreenError();
          break;
        case ART_ErrorHandler::MAIL:
          $error = new ART_MailError();
          break;
      }
      
      $error->AddMessage( $message );
    }
  }
?>
