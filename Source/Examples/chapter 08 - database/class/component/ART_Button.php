<?php
/**
 *  Project    : Artifex
 *  Date       : 19-01-2005
 *  Authors    : Klaas van der Schaaf (schaa101@tech.nhl.nl)
 *               Arjen van der Ende   (ende101@tech.nhl.nl)
 *               Leendert Ullersma    (uller100@tech.nhl.nl)
 *
 *  Filename   : ./class/component/ART_Button.php
 *
 *  © 2004, Artifex.
 **/
 
  class ART_Button extends ART_Component
  {
    protected $text = "";
    protected $type = ART_Button::SUBMIT; // Default value
    
    const SUBMIT = 1;
    const RESET  = 2;
    const BUTTON = 3;

    /**
     *  Add text to a button
     *  Param: $text - The caption of the button.
     **/
    public function SetText( $text )
    {
      $this->text = $text;
    }
    
    /**
     *  Returns the caption of the button
     **/
    public function GetText()
    {
      return $this->text;
    }
    
    /**
     * Set the type of the button
     * Param: $type - The type of the button. Values are:
     *                                           ART_Button::SUBMIT - Submit button
     *                                           ART_Button::RESET  - Clear button 
     *                                           ART_Button::BUTTON - Normal button 
     **/
    public function SetType( $type )
    {
      $this->type = $type;
    }
    
    /**
     *  Returns the button type
     **/
    public function GetType()
    {
      return $this->type;
    }

    /**
     *  Accept a Visitor
     *  Param: $visitor - The Visitor
     *         $tab     - The tabulation offset
     **/
    public function Accept( &$visitor, $tab = "" )
    {
      $visitor->VisitButton( $this, $tab );
    }
  }
?>
