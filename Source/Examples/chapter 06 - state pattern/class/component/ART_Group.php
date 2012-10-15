<?php
/**
 *  Project    : Artifex
 *  Date       : 25-10-2004
 *  Authors    : Klaas van der Schaaf (schaa101@tech.nhl.nl)
 *               Arjen van der Ende   (ende101@tech.nhl.nl)
 *               Leendert Ullersma    (uller100@tech.nhl.nl)
 *
 *  Filename   : ./class/component/ART_Group.php
 *
 *  © 2004, Artifex.
 **/
  require_once( "./class/component/ART_Component.php" );

  class ART_Group extends ART_Component
  {
    private $components = array();
    
    /**
     *  Add components to the group
     *  Param: $component - The component to add
     **/
    public function AddComponent( &$component )
    {
      $this->components[] = $component;
    }

    /**
     *  Accept a Visitor
     *  Param: $visitor - The Visitor
     *         $tab     - The tabulation offset
     **/
    public function Accept( &$visitor, $tab = "" )
    {
      $visitor->VisitGroupHeader( $this, $tab );

      foreach( $this->components as $component )
        $component->Accept( $visitor, $tab . "  " );

      $visitor->VisitGroupFooter( $this, $tab );
    }
  }
?>
