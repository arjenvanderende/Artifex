<?php
/**
 *  Project    : Artifex
 *  Date       : 20-11-2004
 *  Authors    : Klaas van der Schaaf (schaa101@tech.nhl.nl)
 *               Arjen van der Ende   ( ende101@tech.nhl.nl)
 *               Leendert Ullersma    (uller100@tech.nhl.nl)
 *
 *  Filename   : ./class/ART_Root.php
 *
 *  Description: This is the root of the webapplication. It's used to store
 *               the stylesheets and all the components on the webpage and
 *               is able to compile the HTML code to display the webpage.
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
        echo "    <link rel=\"stylesheet\" href=\"" . $stylesheet . "\" type=\"text/css\"/>\n";

      echo "  </head>\n"
         . "  <body>\n";

      /* Compile Body-code */
      foreach( $this->components as $component )
        echo $component;

      echo "  </body>\n"
         . "</html>\n";
    }

    /**
     *  Add a Component to the component list
     *  Param: $component - The Component to add.
     **/
    public function AddComponent( &$component )
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
