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
     *  Generate the Group.
     *  Param: $tab - The tabulation offset
     **/
    public function Generate( $tab = "" )
    {
      echo $tab . "<div class=\"ART_Group\"";

      if ( $this->id_name <> "" )
        echo " id=\"" . $this->id_name . "\"";
      echo ">\n";
      
      foreach( $this->components as $component )
        $component->Generate( $tab . "  " );

      echo $tab . "</div>\n";
    }
    
    /**
     *  Add components to the group
     *  Param: $component - The component to add
     **/
    public function AddComponent( &$component )
    {
      $this->components[] = $component;
    }
  }
?>
