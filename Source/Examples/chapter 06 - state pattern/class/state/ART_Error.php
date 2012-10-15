<?php
/**
 *  Project    : Artifex
 *  Date       : 30-11-2004
 *  Authors    : Klaas van der Schaaf (schaa101@tech.nhl.nl)
 *               Arjen van der Ende   (ende101@tech.nhl.nl)
 *               Leendert Ullersma    (uller100@tech.nhl.nl)
 *
 *  Filename   : ./state/ART_Error.php
 *
 *  © 2004, Artifex.
 **/
  
  require_once( "./class/state/ART_ScreenError.php" );
  require_once( "./class/state/ART_MailError.php" );

  class ART_Error
  {
    protected $message;

    /**
     * Add $message to the errorlog-file
     * Param: $message  - The errormessage
     **/
    public function AddMessage( $message )
    {
      $this->message = $message;
      
      $filename = 'errorlog.txt';

      // Check if the file can be opened
      if ($handle = fopen($filename, 'a'))
      {
        // Write the message to the file.
        fwrite($handle, date("Y-m-d") . " - " . date("H:i:s") . "\t" . $this->message . "\r\n" );
      }
      else
      {
        echo "ART_Error: File \"" . $filename . "\" cannot be opened!<br/>\n";
        exit;
      }
      fclose($handle);
    }
  }
?>
