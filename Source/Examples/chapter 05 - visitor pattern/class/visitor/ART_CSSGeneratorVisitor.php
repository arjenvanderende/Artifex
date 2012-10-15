<?php
/**
 *  Project    : Artifex
 *  Date       : 13-12-2004
 *  Authors    : Klaas van der Schaaf (schaa101@tech.nhl.nl)
 *               Arjen van der Ende   (ende101@tech.nhl.nl)
 *               Leendert Ullersma    (uller100@tech.nhl.nl)
 *
 *  Filename   : ./class/visitor/ART_CssGeneratorVisitor.php
 *
 *  © 2004, Artifex.
 **/
  require_once( "./class/visitor/ART_Visitor.php" );
  
  class ART_CssGeneratorVisitor extends ART_Visitor
  {
    private $id_names = array();
    private $class_names = array();

    /**
     *  Write the class-names and id-names to file
     *  Param: $filename - The filename of the file to create
     */
    public function WriteToFile( $filename )
    {
      // Check if the file can be opened
      if( file_exists( $filename . ".id.css" ) )
      {
        echo "CSSGenerator: File \"" . $filename . ".id.css\" already exists!<br/>\n";
      }
      else if( file_exists( $filename . ".class.css" ) )
      {
        echo "CSSGenerator: File \"" . $filename . ".class.css\" already exists!<br/>\n";
      }
      else
      {
        // Open the id-file
        if ($handle = fopen( $filename . ".id.css", 'a'))
        {
          // Write the id-names to the file.
          foreach( $this->id_names as $id_name )
            if( $id_name != "" )
              fwrite($handle, "#" . $id_name . "\r\n{\r\n}\r\n\r\n" );
        }
        else
        {
          echo "File \"" . $filename . ".id.css\" cannot be opened!<br/>\n";
          exit;
        }
        fclose($handle);
        echo "File \"" . $filename . ".id.css\" saved to disk!<br/>\n";
        
        // Open the class-file
        if ($handle = fopen( $filename . ".class.css", 'a'))
        {
          // Write the class-names to file
          foreach( $this->class_names as $class_name )
            if( $class_name != "" )
              fwrite($handle, "." . $class_name . "\r\n{\r\n}\r\n\r\n" );
        }
        else
        {
          echo "File \"" . $filename . ".class.css\" cannot be opened!<br/>\n";
          exit;
        }
        fclose($handle);
        echo "File \"" . $filename . ".class.css\" saved to disk!<br/>\n";
      }
    }
    
    /**
     *  Write the code for a Text
     *  Param: $component - The $component that calls the visitor
     *         $tab       - The tabulation offset
     **/
    public function VisitText( ART_Text &$component, $tab = "" )
    {
      $this->id_names[$component->GetID()] = $component->GetID();
      $this->class_names['ART_Text'] = "ART_Text";
    }

    /**
     *  Write the code for a Paragraph
     *  Param: $component - The $component that calls the visitor
     *         $tab       - The tabulation offset
     **/
    public function VisitParagraph( ART_Paragraph &$component, $tab = "" )
    {
      $this->id_names[$component->GetID()] = $component->GetID();
      $this->class_names['ART_Paragraph'] = "ART_Paragraph";
    }
    
    /**
     *  Write the code for an Image
     *  Param: $component - The $component that calls the visitor
     *         $tab       - The tabulation offset
     **/
    public function VisitImage( ART_Image &$component, $tab = "" )
    {
      $this->id_names[$component->GetID()] = $component->GetID();
      $this->class_names['ART_Image'] = "ART_Image";
    }

    /**
     *  Write the Begin code for a Group
     *  Param: $component - The $component that calls the visitor
     *         $tab       - The tabulation offset
     **/
    public function VisitGroupHeader( ART_Group &$component, $tab = "" )
    {
      $this->id_names[$component->GetID()] = $component->GetID();
      $this->class_names['ART_Group'] = "ART_Group";
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
      $this->id_names[$decorator->GetID()] = $decorator->GetID();
      $this->class_names['ART_Link'] = "ART_Link";
    }
    
    /**
     *  Write the End code for a Link
     *  Param: $component - The $component that calls the visitor
     *         $tab       - The tabulation offset
     **/
    public function VisitLinkFooter( ART_Link &$decorator, $tab = "" ) {}
  }
?>
