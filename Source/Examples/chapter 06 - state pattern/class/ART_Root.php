<?php
/**
 *  Project    : Artifex
 *  Date       : 11-01-2005
 *  Authors    : Klaas van der Schaaf (schaa101@tech.nhl.nl)
 *               Arjen van der Ende   (ende101@tech.nhl.nl)
 *               Leendert Ullersma    (uller100@tech.nhl.nl)
 *
 *  Filename   : ./class/ART_Root.php
 *
 *  Description: This is the Root of the webapplication.
 *               You can add Stylesheets and HTML-objects.
 *               When all Components are added the function compile()
 *               creates the HTML-code
 *
 *  © 2004, Artifex.
 **/
  require_once( "./class/ART_Stack.php" );
  require_once( "./class/visitor/ART_Visitor.php" );

  class ART_Root
  {
    private $title;                           // The title of the webapplication
    private $groups;                          // Stack of groups
    private $components  = array();           // List of Components
    private $stylesheets = array();           // List of urls to Stylesheets

    /**
     *  Constructor
     *  Param: $title - The title of the Webappliction
     **/
    public function __Construct( $title )
    {
      $this->groups = new ART_Stack();        // Create a new Stack
      $this->title = $title;
    }

    /**
     *  Compile the root to HTML-code
     **/
    public function Compile( ART_Visitor &$visitor )
    {
      echo "<html>\n"
         . "  <head>\n"
         . "    <title>" . $this->title . "</title>\n";

      /* Connect the css-stylesheets */
      foreach( $this->stylesheets as $stylesheet )
        echo "    <link rel=\"stylesheet\" href=\"" . $stylesheet . "\" type=\"text/css\">\n";

      echo "  </head>\n"
         . "  <body>\n";

      /* Compile Body-code */
      foreach( $this->components as $component )
        $component->Accept( $visitor, "    " );

      echo "  </body>\n"
         . "</html>\n";
    }

    /**
     *  Add a Component to the active group
     *  Param: $component - The Component to add.
     **/
    public function AddComponent( &$component )
    {
      $active_group = $this->groups->Peek();          // Get active group
      if( $active_group == null )
        $this->components[] = $component;             // If there is no Active group. Add $component to the component group
      else
        $active_group->AddComponent( $component );    // Else add $component to the active group
    }

    /**
     *  Creates a new group component
     *  Param: $styleID - Style ID for the new Group
     **/
    public function OpenGroup( $styleID = "" )
    {
      $group = new ART_Group();
      if( $styleID != null )
        $group->SetID( $styleID );

      $this->AddComponent( $group );                  // Add the group to a component
      $this->groups->Push( $group );                  // Set the new group on top of the stack
    }

    /**
     *  Close the last group of the stack.
     **/
    public function CloseGroup()
    {
      $this->groups->Pop();                           // Remove the top group from the stack
    }

    /**
     *  Add a URL of a stylesheet to the stylesheet list
     *  Param: $url - The stylesheet to add.
     **/
    public function AddStyleSheet( $url )
    {
      $this->stylesheets[] = $url;
    }
  }
?>
