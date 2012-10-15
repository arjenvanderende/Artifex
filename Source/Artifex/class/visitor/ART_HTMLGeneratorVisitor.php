<?php
/**
 *  Project    : Artifex
 *  Date       : 19-01-2005
 *  Authors    : Klaas van der Schaaf (schaa101@tech.nhl.nl)
 *               Arjen van der Ende   (ende101@tech.nhl.nl)
 *               Leendert Ullersma    (uller100@tech.nhl.nl)
 *
 *  Filename   : ./class/visitor/ART_HTMLGeneratorVisitor.php
 *
 *  © 2004, Artifex.
 **/

  class ART_HTMLGeneratorVisitor extends ART_Visitor
  {
    /**
     *  Write the code for a Text
     *  Param: $component - The $component that calls the visitor
     *         $tab       - The tabulation offset
     **/
    public function VisitText( ART_Text &$component, $tab = "" )
    {
      echo $tab . "<span class=\"ART_Text\"";

      // Check if the ID has been set
      $id = $component->GetID();
      if ( $id <> "" )
        echo " id=\"" . $id . "\"";

      echo ">" . $component->GetText() . "</span>\n";
    }

    /**
     *  Write the code for a Paragraph
     *  Param: $component - The $component that calls the visitor
     *         $tab       - The tabulation offset
     **/
    public function VisitParagraph( ART_Paragraph &$component, $tab = "" )
    {
      echo $tab . "<p class=\"ART_Paragraph\"";

      // Check if the ID has been set
      $id = $component->GetID();
      if ( $id <> "" )
        echo " id=\"" . $id . "\"";
      echo ">\n";

      echo $tab . "  " . $component->GetText() . "\n";
      echo $tab . "</p>\n";
    }
    
    /**
     *  Write the code for an Image
     *  Param: $component - The $component that calls the visitor
     *         $tab       - The tabulation offset
     **/
    public function VisitImage( ART_Image &$component, $tab = "" )
    {
      echo $tab . "<img class=\"ART_Image\"";

      // Check if the ID has been set
      $id = $component->GetID();
      if ( $id <> "" )
        echo " id=\"" . $id . "\"";

      echo " src=\"" . $component->GetImage() . "\"";

      // Check if the alternate text has been set
      $alt = $component->GetText();
      if ( $alt <> "" )
        echo " alt=\"" . $alt . "\"";
      echo "/>\n";
    }

    /**
     *  Write the code for an Inputfield
     *  Param: $component - The $component that calls the visitor
     *         $tab       - The tabulation offset
     **/
    public function VisitInput( ART_Input &$component, $tab = "" )
    {
      // Create a label if it's defined
      $id = $component->GetId();
      if( $component->GetLabel() <> "" )
      {
        echo $tab . "<label class=\"ART_Label\"";
        if ( $id <> "" )
           echo " for=\"" . $id;
        echo "\">" . $component->GetLabel() . "</label>\n";
      }

      // Create the inputfield
      echo $tab . "<input class=\"ART_Input\" type=\"text\"";
      if ( $id <> "" )
        echo " id=\"" . $id . "\" name=\"" . $id . "\"";
      echo " maxlength=\"64\" ></input><br/>\n";
    }

    /**
     *  Write the code for a TextArea
     *  Param: $component - The $component that calls the visitor
     *         $tab       - The tabulation offset
     **/
    public function VisitTextArea( ART_TextArea &$component, $tab = "" )
    {
      // Create a label if it's defined
      $id = $component->GetId();
      if( $component->GetLabel() <> "" )
      {
        echo $tab . "<label class=\"ART_Label\"";
        if ( $id <> "" )
           echo " for=\"" . $id;
        echo "\">" . $component->GetLabel() . "</label>\n";
      }

      // Create the textarea
      echo $tab . "<textarea class=\"ART_TextArea\"";
      if ( $id <> "" )
        echo " id=\"" . $component->GetId() . "\" name=\"" . $component->GetID() . "\"";
      echo " maxlength=\"256\"></textarea><br/>\n";
    }

    /**
     *  Write the code for a Button
     *  Param: $component - The $component that calls the visitor
     *         $tab       - The tabulation offset
     **/
    public function VisitButton( ART_Button &$component, $tab = "" )
    {
      echo $tab . "<button class=\"ART_Button\" type=\"";

      switch( $component->GetType() )
      {
        default:
        case ART_Button::SUBMIT:
          echo "submit";
          break;
        case ART_Button::RESET:
          echo "reset";
          break;
        case ART_Button::BUTTON:
          echo "button";
          break;
      }
      echo "\" id=\"";

      // Check if the ID has been set
      $id = $component->GetId();
      if ( $id <> "" )
        echo " id=\"" . $id . "\" name=\"" . $id . "\"";
      echo ">" . $component->GetText() . "</button>\n";
    }

    /**
     *  Write the Begin code for a Group
     *  Param: $component - The $component that calls the visitor
     *         $tab       - The tabulation offset
     **/
    public function VisitGroupHeader( ART_Group &$component, $tab = "" )
    {
      echo $tab . "<div class=\"ART_Group\"";

      // Check if the ID has been set
      $id = $component->GetID();
      if ( $id <> "" )
        echo " id=\"" . $id . "\"";
      echo ">\n";
    }
    
    /**
     *  Write the End code for a Group
     *  Param: $component - The $component that calls the visitor
     *         $tab       - The tabulation offset
     **/
    public function VisitGroupFooter( ART_Group &$component, $tab = "" )
    {
      echo $tab . "</div>\n";
    }
    
    /**
     *  Write the Begin code for a Link
     *  Param: $component - The $component that calls the visitor
     *         $tab       - The tabulation offset
     **/
    public function VisitLinkHeader( ART_Link &$component, $tab = "" )
    {
      echo $tab . "<a class=\"ART_Link\"";

      // Check if the ID has been set
      $id = $component->GetID();
      if ( $id <> "" )
        echo " id=\"" . $id . "\"";

      echo " href=\"" . $component->GetLink() . "\" target=\"";
      switch( $component->GetTarget() )
      {
        case ART_Link::SELF:
          echo "_self";
          break;
        case ART_Link::PARENT:
          echo "_parent";
          break;
        case ART_Link::BLANK:
          echo "_blank";
          break;
        default:
        case ART_Link::TOP:
          echo "_top";
          break;
      }
      echo "\">\n";
    }
    
    /**
     *  Write the End code for a Link
     *  Param: $component - The $component that calls the visitor
     *         $tab       - The tabulation offset
     **/
    public function VisitLinkFooter( ART_Link &$component, $tab = "" )
    {
      echo $tab . "</a>\n";
    }
    
    /**
     *  Write the begin code for a Form
     *  Param: $component - The $component that calls the visitor
     *         $tab       - The tabulation offset
     **/
    public function VisitFormHeader( ART_Form &$component, $tab = "" )
    {
      echo $tab . "<form class=\"ART_Form\" method=\"post\"";
      if( $component->GetAction() )
        echo " action=\"" . $component->GetAction(). "\"";

      // Check if the ID has been set
      $id = $component->GetId();
      if ( $id <> "" )
        echo " id=\"" . $id . "\"";
      echo ">\n";
    }

    /**
     *  Write the end code for a Form
     *  Param: $component - The $component that calls the visitor
     *         $tab       - The tabulation offset
     **/
    public function VisitFormFooter( ART_Form &$component, $tab = "" )
    {
      echo $tab . "</form>\n";
    }
  }
?>
