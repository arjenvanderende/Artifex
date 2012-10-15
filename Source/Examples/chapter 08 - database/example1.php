<?php
/**
 *  Project    : Artifex
 *  Date       : 18-1-2005
 *  Authors    : Klaas van der Schaaf (schaa101@tech.nhl.nl)
 *               Arjen van der Ende   (ende101@tech.nhl.nl)
 *               Leendert Ullersma    (uller100@tech.nhl.nl)
 *
 *  Filename   : ./example1.php {Make table}
 *
 *  © 2004, Artifex.
 **/
  require_once( "./class/ART_Database.php" );
  require_once( "./class/ART_ErrorHandler.php" );

  $query = "CREATE TABLE `topic` (
              `id` smallint(1) NOT NULL auto_increment,
              `title` varchar(64) NOT NULL default '',
              `author` varchar(64) NOT NULL default '',
              `date` timestamp(14) NOT NULL,
              `component` blob NOT NULL,
              PRIMARY KEY  (`id`)
            ) TYPE=MyISAM;";

  ART_Database::GetInstance()->Query( $query );
?>
