<?php
/**
 *  Project    : Artifex
 *  Date       : 30-11-2004
 *  Authors    : Klaas van der Schaaf (schaa101@tech.nhl.nl)
 *               Arjen van der Ende   (ende101@tech.nhl.nl)
 *               Leendert Ullersma    (uller100@tech.nhl.nl)
 *
 *  Filename   : ./state/ART_ScreenError.php
 *
 *  © 2004, Artifex.
 **/


  class ART_ScreenError extends ART_Error
  {
    /**
     * Add $message to the screen
     * Param: $message  - The errormessage
     **/
    public function AddMessage( $message )
    {
      ART_Error::AddMessage( $message );

      echo "<p id=\"error\">" . $this->message . "</p>\n";
    }
  }
?>
