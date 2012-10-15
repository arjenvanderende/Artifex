<?php
/**
 *  Project    : Artifex
 *  Date       : 19-01-2005
 *  Authors    : Klaas van der Schaaf (schaa101@tech.nhl.nl)
 *               Arjen van der Ende   (ende101@tech.nhl.nl)
 *               Leendert Ullersma    (uller100@tech.nhl.nl)
 *
 *  Filename   : ./class/ART_Database.php
 *
 *  © 2004, Artifex.
 **/
  
  class ART_Database
  {
    private $hostname = 'localhost';          // Location of the database
    private $database = 'artifex';            // Name of the database
    private $link     = false;                // Handle to MySQL database
    
    private static $instance = NULL;          // The only instance of the root

    /**
     *  Constructor
     *  Create a new instance of the database
     *  Private so it can not be created manually
     **/
    private function __Construct()
    {
      if( !$this->link )
        $this->Connect();
    }

    /**
     *  Destructor
     *  Disconnect from the database
     **/
    public function __Destruct()
    {
      $this->Disconnect();
    }

    /**
     *  Return the instance of the database
     **/
    public static function GetInstance()
    {
      if( ART_Database::$instance == NULL )
        ART_Database::$instance = new ART_Database();
      return ART_Database::$instance;
    }
    
    /**
     *  Connect to the database
     **/
    private function Connect()
    {
      $this->link = mysql_connect( $this->hostname );

      if( !$this->link )
        ART_ErrorHandler::GetInstance()->ReportError( "Database: MySQL could not connect - " . mysql_error(), ART_ErrorHandler::SCREEN );
      else
      {
        $db_selected = mysql_select_db( $this->database, $this->link );
        if( !$db_selected )
          ART_ErrorHandler::GetInstance()->ReportError( "Database: Could not select database - " . mysql_error(), ART_ErrorHandler::SCREEN );
      }
    }
    
    /**
     *  Disconnect from the database
     **/
    public function Disconnect()
    {
      if( $this->link )
        mysql_close( $this->link );
    }

    /**
     *  Execute a query and return the result
     *  Param: $query - The query to execute
     **/
    public function & Query( $query )
    {
      $result = mysql_query( $query, $this->link );
      if( !$result )
        ART_ErrorHandler::GetInstance()->ReportError( "Database: Query not executed - " . mysql_error(), ART_ErrorHandler::SCREEN );

      return $result;
    }

    /**
     *  Return the status of the connection
     *  True  - Database is connected
     *  False - Database is disconnected
     **/
    public function IsConnected()
    {
      if( $this->link )
        return true;
      else
        return false;
    }
  }
?>
