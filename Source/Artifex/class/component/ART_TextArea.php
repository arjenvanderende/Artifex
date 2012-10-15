<?php
/**
 *  Project    : Artifex
 *  Date       : 19-01-2005
 *  Authors    : Klaas van der Schaaf (schaa101@tech.nhl.nl)
 *               Arjen van der Ende   (ende101@tech.nhl.nl)
 *               Leendert Ullersma    (uller100@tech.nhl.nl)
 *
 *  Filename   : ./class/component/ART_TextArea.php
 *
 *  © 2004, Artifex.
 **/
 
  class ART_TextArea extends ART_Component
  {
    protected $label;          // The text

    /**
     *  Sets the text
     *  Param: $text - The text
     **/
    public function SetLabel( $label )
    {
      $this->label = $label;
    }

    /**
     *  Return the text
     **/
    public function GetLabel()
    {
      return $this->label;
    }

    /**
     *  Accept a Visitor
     *  Param: $visitor - The Visitor
     *         $tab     - The tabulation offset
     **/
    public function Accept( &$visitor, $tab = "" )
    {
      $visitor->VisitTextArea( $this, $tab );
    }
  }
?>
