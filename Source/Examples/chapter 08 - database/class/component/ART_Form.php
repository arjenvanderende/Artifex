<?php
/**
 *  Project    : Artifex
 *  Date       : 19-01-2005
 *  Authors    : Klaas van der Schaaf (schaa101@tech.nhl.nl)
 *               Arjen van der Ende   (ende101@tech.nhl.nl)
 *               Leendert Ullersma    (uller100@tech.nhl.nl)
 *
 *  Filename   : ./class/component/ART_Form.php
 *
 *  © 2004, Artifex.
 **/

  class ART_Form extends ART_Component
  {
    protected $components = array();
    protected $action     = false;

    /**
     *  Add an aditfield to the form
     *  Param: $editfield - The editfield
     **/
    public function AddComponent( ART_Component &$component )
    {
      $this->components[] = $component;
    }
    
    /**
     *  Add an action to the form
     *  Param: $action  - The target url
     **/
    public function SetAction( $action )
    {
      $this->action = $action;
    }
    
    /**
     *  Returns the action
     **/
    public function GetAction()
    {
      return $this->action;
    }

    /**
     *  Accept a Visitor
     *  Param: $visitor - The Visitor
     *         $tab     - The tabulation offset
     **/
    public function Accept( &$visitor, $tab = "" )
    {
      $visitor->VisitFormHeader( $this, $tab );

      foreach( $this->components as $component )
        $component->Accept( $visitor, $tab . "  " );

      $visitor->VisitFormFooter( $this, $tab );
    }
  }
?>
