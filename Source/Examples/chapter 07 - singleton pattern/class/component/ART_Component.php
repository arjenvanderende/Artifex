<?php
/**
 *  Project    : Artifex
 *  Date       : 25-10-2004
 *  Authors    : Klaas van der Schaaf (schaa101@tech.nhl.nl)
 *               Arjen van der Ende   (ende101@tech.nhl.nl)
 *               Leendert Ullersma    (uller100@tech.nhl.nl)
 *
 *  Filename   : ./class/component/ART_Component.php
 *
 *  © 2004, Artifex.
 **/
  require_once( "./class/component/ART_Group.php" );
  require_once( "./class/component/ART_Text.php" );
  require_once( "./class/component/ART_Paragraph.php" );
  require_once( "./class/component/ART_Image.php" );

  abstract class ART_Component
  {
    protected $id_name;            // The stylesheet for this component
    
    /**
     *  Set the stylesheet for the component.
     *  Param: $stylesheet - The ART_StyleSheet to use for this component
     **/
    public function SetID( $id_name )
    {
      $this->id_name = $id_name;
    }

    /**
     *  Returns the ID
     **/
    public function GetID()
    {
      return $this->id_name;
    }
    
    /**
     *  Accept a Visitor
     *  Param: $visitor - The Visitor
     *         $tab     - The tabulation offset
     **/
    abstract function Accept( &$visitor, $tab = "" );
  }
?>
