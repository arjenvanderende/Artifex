<?php
/**
 *  Project    : Artifex
 *  Date       : 1-11-2004
 *  Authors    : Klaas van der Schaaf (schaa101@tech.nhl.nl)
 *               Arjen van der Ende   (ende101@tech.nhl.nl)
 *               Leendert Ullersma    (uller100@tech.nhl.nl)
 *
 *  Filename   : ./class/ART_User.php
 *
 *  © 2004, Artifex.
 **/
 
  class ART_User
  {
    private $css = "geenstijl";   // The default CSS is "default"
    
    /**
     *  Set the name of the used Cascading Style Sheet
     **/
    public function SetCss( $css )
    {
      if( $css <> "" )
        $this->css = $css;
    }

    /**
     *  Get the name of the used Cascading Style Sheet
     **/
    public function GetCss()
    {
      if( $this->css == "" )
        return "";
      else
        return $this->css . "." ;
    }
  }
?>
