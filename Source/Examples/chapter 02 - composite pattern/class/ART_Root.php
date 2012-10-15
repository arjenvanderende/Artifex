<?php
/**
 *  Project    : Artifex
 *  Date       : 26-10-2004
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
 
  class ART_Root
  {
    private $title;                           // The title of the webapplication
    private $components  = array();           // List of Components
    private $stylesheets = array();           // List of urls to Stylesheets

    /**
     *  Constructor
     *  Param: $title - The title of the Webappliction
     **/
    public function __Construct( $title )
    {
      $this->title = $title;
    }

    /**
     *  Compile the root to HTML-code
     **/
    public function Compile()
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
        $component->Generate( "    "  );

      echo "  </body>\n"
         . "</html>\n";
    }

    /**
     *  Add a Component to the component list
     *  Param: $component - The Component to add.
     **/
    public function AddComponent( ART_Component &$component )
    {
      $this->components[] = $component;
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
