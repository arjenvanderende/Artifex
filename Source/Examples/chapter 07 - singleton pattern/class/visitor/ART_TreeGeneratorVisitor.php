<?php
/**
 *  Project    : Artifex
 *  Date       : 13-12-2004
 *  Authors    : Klaas van der Schaaf (schaa101@tech.nhl.nl)
 *               Arjen van der Ende   (ende101@tech.nhl.nl)
 *               Leendert Ullersma    (uller100@tech.nhl.nl)
 *
 *  Filename   : ./class/visitor/ART_TreeGeneratorVisitor.php
 *
 *  © 2004, Artifex.
 **/
  require_once( "./class/visitor/ART_Visitor.php" );
  
  class ART_TreeGeneratorVisitor extends ART_Visitor
  {
    /**
     *  Convert the tab-size to Non-Breaking Spaces (NBSP)
     */
    private function TabToNBSP( $tab )
    {
      $nbsp = "";
      for ( $i = 0; $i < strlen( $tab ); $i++ )
        $nbsp = $nbsp . "&nbsp;";
      return $nbsp;
    }

    /**
     *  Write the code for a Text
     *  Param: $component - The $component that calls the visitor
     *         $tab       - The tabulation offset
     **/
    public function VisitText( ART_Text &$component, $tab = "" )
    {
      echo $this->TabToNBSP( $tab ) . "ART_Text: " . $component->GetID() . "<br/>\n";
    }

    /**
     *  Write the code for a Paragraph
     *  Param: $component - The $component that calls the visitor
     *         $tab       - The tabulation offset
     **/
    public function VisitParagraph( ART_Paragraph &$component, $tab = "" )
    {
      echo $this->TabToNBSP( $tab ) . "ART_Paragraph: " . $component->GetID() . "<br/>\n";
    }
    
    /**
     *  Write the code for an Image
     *  Param: $component - The $component that calls the visitor
     *         $tab       - The tabulation offset
     **/
    public function VisitImage( ART_Image &$component, $tab = "" )
    {
      echo $this->TabToNBSP( $tab ) . "ART_Image: " . $component->GetID() . "<br/>\n";
    }

    /**
     *  Write the Begin code for a Group
     *  Param: $component - The $component that calls the visitor
     *         $tab       - The tabulation offset
     **/
    public function VisitGroupHeader( ART_Group &$component, $tab = "" )
    {
      echo $this->TabToNBSP( $tab ) . "ART_Group: " . $component->GetID() . "<br/>\n";
    }
    
    /**
     *  Write the End code for a Group
     *  Param: $component - The $component that calls the visitor
     *         $tab       - The tabulation offset
     **/
    public function VisitGroupFooter( ART_Group &$component, $tab = "" ) {}

    /**
     *  Write the Begin code for a Link
     *  Param: $component - The $component that calls the visitor
     *         $tab       - The tabulation offset
     **/
    public function VisitLinkHeader( ART_Link &$decorator, $tab = "" )
    {
      echo $this->TabToNBSP( $tab ) . "ART_Link: " . $decorator->GetID() . "<br/>\n";
    }
    
    /**
     *  Write the End code for a Link
     *  Param: $component - The $component that calls the visitor
     *         $tab       - The tabulation offset
     **/
    public function VisitLinkFooter( ART_Link &$decorator, $tab = "" ) {}
  }
?>
