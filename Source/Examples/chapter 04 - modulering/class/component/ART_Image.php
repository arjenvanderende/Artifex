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
     *  Set the aternate text, when image cannot load.
     *  Param: $text - The alternate text
     **/
    public function SetText( $text )
    {
      $this->text = $text;
    }

    /**
     *  Generates the Image-code.
     *  Param: $tab - The tabulation offset
     **/
    public function Generate( $tab = "" )
    {
      echo $tab . "<img class=\"ART_Image\"";
      if ( $this->id_name <> "" )
        echo " id=\"" . $this->id_name . "\"";
      if( $this->text <> "" )
        echo " alt=\"" . $this->text . "\"";
      echo " src=\"" . $this->image . "\"/>\n";
    }
  }
?>
