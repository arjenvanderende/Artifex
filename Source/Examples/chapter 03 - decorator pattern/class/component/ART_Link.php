<?php
/**
 *  Project    : Artifex
 *  Date       : 26-10-2004
 *  Authors    : Klaas van der Schaaf (schaa101@tech.nhl.nl)
 *               Arjen van der Ende   (ende101@tech.nhl.nl)
 *               Leendert Ullersma    (uller100@tech.nhl.nl)
 *
 *  Filename   : ./class/component/ART_Link.php
 *
 *  © 2004, Artifex.
 **/

  require_once( "./class/component/ART_Decorator.php" );

class ART_Link extends ART_Decorator
{
  private $link;            // URL
  private $target;          // Name of target window

  const TOP    = 1;
  const SELF   = 2;
  const PARENT = 3;
  const BLANK  = 4;

  /**
   * Constructor
   * Param: $url       - The URL which the link references to
   *        $component - The component to decorate
   *        $target    - The target window to apply this link to. Possible values are: ART_Link::TOP,
   *                                                                                   ART_Link::SELF,
   *                                                                                   ART_Link::PARENT,
   *                                                                                   ART_Link::BLANK.
   **/
  public function __Construct( $url, ART_Component &$component, $target = 1 )
  {
    $this->link      = $url;
    $this->component = $component;
    $this->target    = $target;
  }

  /**
   * Set the url for this link
   * Param: $url - The URL which the link references to
   **/
  public function SetLink( $url )
  {
    $this->link = $url;
  }

  /**
   * Set the target window
   * Param: $target    - The target window to apply this link to. Possible values are: ART_Link::TOP,
   *                                                                                   ART_Link::SELF,
   *                                                                                   ART_Link::PARENT,
   *                                                                                   ART_Link::BLANK.
   */
  public function SetTarget( $target )
  {
    $this->target = $target;
  }

  /**
   * Generates the HTML-code
   * Param: $tab - The tabulation offset
   **/
  public function Generate( $tab = "" )
  {
    echo $tab . "<a class=\"ART_Link\"";
    if( $this->id_name <> "" )
      echo " id=\"" . $this->id_name . "\"";

    echo " href=\"" . $this->link . "\" target=\"";
    switch( $this->target )
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

    // Generate the component that is decorated
    $this->component->Generate( $tab . "  " );

    echo $tab . "</a>\n";
  }
}
?>
