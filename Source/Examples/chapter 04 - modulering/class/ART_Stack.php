<?php
/**
 *  Project    : Artifex
 *  Date       : 14-10-2004
 *  Authors    : Klaas van der Schaaf (schaa101@tech.nhl.nl)
 *               Arjen van der Ende   (ende101@tech.nhl.nl)
 *               Leendert Ullersma    (uller100@tech.nhl.nl)
 *
 *  Filename   : ./class/ART_Stack.php
 *
 *  Description: A stack which supports pushing, popping and peeking.
 *               Uses pointers to store variables.
 *
 *  Changelist : 2004-11-22 Klaas   Add ART_Component to Push function
 *               2004-11-30 Klaas   Add erroreporting when no elements to pop
 *
 *  © 2004, Artifex.
 **/

  class ART_Stack
  {
    private $stack = array();          // The internal stack
  
    /**
     *  Push an item to the stack
     *  Param: &$item A reference to a Component.
     **/
    public function Push( ART_Component &$item )
    {
      $this->stack[] = $item;
    }
    
    /**
     *  Pop the last element of the stack
     **/
    public function &Pop()
    {
      if( count($this->stack) == 0 )
      {
        ART_ErrorHandler::GetInstance()->ReportError( "No elements to pop", ART_ErrorHandler::SCREEN );
      }
        
      $last = array_pop( $this->stack );
      return $last;
    }
    
    /**
     *  View the last element of the stack
     **/
    public function Peek()
    {
      if( count($this->stack) == 0 )
        return null;

      $last = $this->stack[ count($this->stack) -1 ];
      return $last;
    }
  }
  
?>
