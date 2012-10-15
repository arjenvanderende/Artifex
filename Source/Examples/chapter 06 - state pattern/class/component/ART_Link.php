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
     *  Return the link
     **/
    public function GetLink()
    {
      return $this->link;
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
     *  Returns the target for the link
     **/
    public function GetTarget()
    {
      return $this->target;
    }

    /**
     *  Accept a Visitor
     *  Param: $visitor - The Visitor
     *         $tab     - The tabulation offset
     **/
    public function Accept( &$visitor, $tab = "" )
    {
      $visitor->VisitLinkHeader( $this, $tab );

      $this->component->Accept( $visitor, $tab . "  " );

      $visitor->VisitLinkFooter( $this, $tab );
    }
  }
?>
