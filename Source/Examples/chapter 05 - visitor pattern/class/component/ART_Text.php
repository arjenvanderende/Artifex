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
     *  Return the text
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
      $visitor->VisitText( $this, $tab );
    }
  }
?>
