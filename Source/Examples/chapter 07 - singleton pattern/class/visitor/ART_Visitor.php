<?php
/**
 *  Project    : Artifex
 *  Date       : 3-11-2004
 *  Authors    : Klaas van der Schaaf (schaa101@tech.nhl.nl)
 *               Arjen van der Ende   (ende101@tech.nhl.nl)
 *               Leendert Ullersma    (uller100@tech.nhl.nl)
 *
 *  Filename   : ./class/visitor/ART_Visitor.php
 *
 *  Description: 
 *
 *  © 2004, Artifex.
 **/

  /* Include all child-objects */
  require_once( "./class/visitor/ART_HTMLGeneratorVisitor.php" );
  require_once( "./class/visitor/ART_CSSGeneratorVisitor.php" );
  require_once( "./class/visitor/ART_TreeGeneratorVisitor.php" );
  
  abstract class ART_Visitor
  {
    abstract public function VisitText       ( ART_Text      &$component, $tab = "" );
    abstract public function VisitParagraph  ( ART_Paragraph &$component, $tab = "" );
    abstract public function VisitImage      ( ART_Image     &$component, $tab = "" );
    abstract public function VisitGroupHeader( ART_Group     &$component, $tab = "" );
    abstract public function VisitGroupFooter( ART_Group     &$component, $tab = "" );
    abstract public function VisitLinkHeader ( ART_Link      &$decorator, $tab = "" );
    abstract public function VisitLinkFooter ( ART_Link      &$decorator, $tab = "" );
  }

?>
