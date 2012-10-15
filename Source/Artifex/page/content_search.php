<?php
	$root->OpenGroup( "news" );
	$root->OpenGroup( "topic" );

		$paragraph1 = new ART_Text();
		$paragraph1->SetText( "Zoekresultaat" );
		$paragraph1->SetID( "topic_title" );
		$root->AddComponent( $paragraph1 );

	 	// Check if the submitbutton is pressed
	  if( isset( $_POST[submit] ) )
	  {
			// Submit button pressed, check if search parameter is empty
	  	if( $_POST['search_input'] == "" )
	  	{
	  		// Search parameter is empty, do not show results
				$paragraph = new ART_Text();
				$paragraph->SetText( "Geen resultaten gevonden" );
				$paragraph->SetID( "search_result" );
				$root->AddComponent( $paragraph );
	  	}
	  	else
	  	{
	  		// Find search parameter in database
	  	  $_POST['search_input'] = addslashes( $_POST['search_input'] );
				$database = ART_Database::GetInstance();
				$query = "SELECT id, title, UNIX_TIMESTAMP( date ) AS date FROM topic WHERE title LIKE '%". $_POST['search_input']."%' OR author LIKE '%". $_POST['search_input']."%' ORDER BY id DESC LIMIT 100;";
				$result = $database->Query( $query );
				// Check if the query has results
				if( mysql_num_rows( $result ) > 0 )
				{
					// Query has results, output them to screen
					while( $object = mysql_fetch_object( $result ) )
					{
						$topic_list_item = new ART_Text();
						$topic_list_item->SetText( "[" . date('d-m-Y H:i', $object->date) . "] " . $object->title . "<br/>" );
						$topic_list_item_link = new ART_Link( "/Artifex/Weblog/".$object->id,$topic_list_item, ART_Link::SELF );
						$topic_list_item_link->SetID( "search_result" );
						$root->AddComponent( $topic_list_item_link );
					}
				}
				else
				{
					// Search parameter not found in database
					$paragraph = new ART_Text();
					$paragraph->SetText( "Geen resultaten gevonden" );
					$paragraph->SetID( "search_result" );
					$root->AddComponent( $paragraph );
				}
			}
		}
		else
		{
			// Submitbutton not pressed
			$paragraph = new ART_Text();
			$paragraph->SetText( "Geen resultaten gevonden" );
			$paragraph->SetID( "search_result" );
			$root->AddComponent( $paragraph );
		}
		
	$root->CloseGroup();
	$root->CloseGroup();
?>