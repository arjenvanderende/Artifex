<?php
  $root = ART_Root::GetInstance();
  $root->OpenGroup( "weblog" );

    $database = ART_Database::GetInstance();

		// Check if a single weblog is being accesed
		$topic_id = strtolower( $url_array[3] );
		if( is_numeric ( $topic_id ) )
	  	// A single weblog is being requested, get only that topic
	  	$query = "SELECT component FROM topic WHERE id = '" . $topic_id . "'";
		else
			// Get all topics
	    $query = "SELECT component FROM topic ORDER BY id DESC";
    
    // Execute the query and show the result
    $result = $database->Query( $query );
    while( $object = mysql_fetch_object( $result ) )
    {
      $component = unserialize( $object->component );
      $root->AddComponent( $component );
    }
        
  $root->CloseGroup();

?>
