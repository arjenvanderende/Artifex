<?php
/**
 *  Project    : Artifex
 *  Date       : 1-11-2004
 *  Authors    : Klaas van der Schaaf (schaa101@tech.nhl.nl)
 *               Arjen van der Ende   (ende101@tech.nhl.nl)
 *               Leendert Ullersma    (uller100@tech.nhl.nl)
 *
 *  Filename   : ./class/component/ART_Text.php
 *
 *  © 2004, Artifex.
 **/
  require_once( "./class/component/ART_Component.php" );

  class ART_Text extends ART_Component
  {
    protected $text;          // The text

    /**
     *  Sets the text
     *  Param: $text - The text
     **/
    public function SetText( $text )
    {
      $this->text = $text;
    }

    /**
     *  Generates the text.
     *  Param: $tab - The tabulation offset
     **/
    public function Generate( $tab = "" )
    {
      echo $tab . "<span class=\"ART_Text\"";
      if( $this->id_name <> "" )
        echo " id=\"" . $this->id_name . "\"";
      echo ">\n";

      echo $tab . "  " . $this->text . "\n";
      echo $tab . "</span>\n";
    }
  }
?>
