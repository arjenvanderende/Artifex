<?php
/**
 *  Project    : Artifex
 *  Date       : 26-10-2004
 *  Authors    : Klaas van der Schaaf (schaa101@tech.nhl.nl)
 *               Arjen van der Ende   (ende101@tech.nhl.nl)
 *               Leendert Ullersma    (uller100@tech.nhl.nl)
 *
 *  Filename   : ./class/component/ART_Decorator.php
 *
 *  Description:
 *
 *  © 2004, Artifex.
 **/

  require_once( "./class/component/ART_Component.php" );
  require_once( "./class/component/ART_Link.php" );

  abstract class ART_Decorator extends ART_Component
  {
    protected $component;   // The component to decorate
  
    /**
     * Set the component to decorate.
     * Param: $component - The component to decorate.
     **/
    public function SetComponent( ART_Component &$component )
    {
      $this->component = $component;
    }
    
  }
?>
