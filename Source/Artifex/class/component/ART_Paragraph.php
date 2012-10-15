<?php
/**
 *  Project    : Artifex
 *  Date       : 1-11-2004
 *  Authors    : Klaas van der Schaaf (schaa101@tech.nhl.nl)
 *               Arjen van der Ende   (ende101@tech.nhl.nl)
 *               Leendert Ullersma    (uller100@tech.nhl.nl)
 *
 *  Filename   : ./class/component/ART_Paragraph.php
 *
 *  © 2004, Artifex.
 **/
  require_once( "./class/component/ART_Text.php" );

  class ART_Paragraph extends ART_Text
  {
    /**
     *  Accept a Visitor
     *  Param: $visitor - The Visitor
     *         $tab     - The tabulation offset
     **/
    public function Accept( &$visitor, $tab = "" )
    {
      $visitor->VisitParagraph( $this, $tab );
    }
  }
?>
