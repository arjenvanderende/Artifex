<?php
/**
 *  Project    : Artifex
 *  Date       : 30-11-2004
 *  Authors    : Klaas van der Schaaf (schaa101@tech.nhl.nl)
 *               Arjen van der Ende   (ende101@tech.nhl.nl)
 *               Leendert Ullersma    (uller100@tech.nhl.nl)
 *
 *  Filename   : ./state/ART_MailError.php
 *
 *  © 2004, Artifex.
 **/


  class ART_MailError extends ART_Error
  {
    /**
     * Sends $message by email
     * Param: $message  - The errormessage
     **/
    public function AddMessage( $message )
    {
      ART_Error::AddMessage( $message );

      // Enable sendmail in php.ini; such as server. (http://nl.php.net/manual/nl/ref.mail.php)
      if( !mail("mail@domain.ext", "Errorreport", $message, "From: Name<mail@domain.ext>\r\n" ) )
      {
        /* If no mail could be send, report a new File error */
        $errorhandler = ART_Errorhandler::GetInstance();
        $errorhandler->PushError( "ART_MailError: No mail sent - \"" . $message . "\"", ART_ErrorHandler::FILE );
      }
    }
  }
?>
