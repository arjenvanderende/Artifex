<?php
/**
 *  Project    : Artifex
 *  Date       : 25-10-2004
 *  Authors    : Klaas van der Schaaf (schaa101@tech.nhl.nl)
 *               Arjen van der Ende   (ende101@tech.nhl.nl)
 *               Leendert Ullersma    (uller100@tech.nhl.nl)
 *
 *  Filename   : ./class/component/ART_Image.php
 *
 *  © 2004, Artifex.
 **/
  require_once( "./class/component/ART_Component.php" );

  class ART_Image extends ART_Component
  {
    private $image;       // Url to image
    private $text;        // Alternate text

    /**
     *  Set the image
     *  Param: $image - The URL to the image
     **/
    public function SetImage( $image )
    {
      $this->image = $image;
    }

    /**
     *  Return the URL to the image
     **/
    public function GetImage()
    {
      // Check if the file exists
      if ( @fclose(@fopen( $this->image, "r")) )
        return $this->image;
      else
      {
        // The file could not be found! Replace with an error image
        $errorhandler = ART_Errorhandler::GetInstance();
        $errorhandler->ReportError( "ART_Image: " . $this->image . " not found", ART_ErrorHandler::FILE );
        return "./Artifex/images/error.jpg";
      }
    }
    
    /**
     *  Set the aternate text, when image cannot load.
     *  Param: $text - The alternate text
     **/
    public function SetText( $text )
    {
      $this->text = $text;
    }

    /**
     *  Return the alternate text
     **/
    public function GetText()
    {
      return $this->text;
    }

    /**
     *  Accept a Visitor
     *  Param: $visitor - The Visitor
     *         $tab     - The tabulation offset
     **/
    public function Accept( &$visitor, $tab = "" )
    {
      $visitor->VisitImage( $this, $tab );
    }
  }
?>
