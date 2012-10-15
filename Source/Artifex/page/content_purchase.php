<?php
    $root->OpenGroup( "news" );
    $root->OpenGroup( "topic" );
    
	    // Create the paragraphs of text
	    $content_paragraph1 = new ART_Text();
	    $content_paragraph1->SetID( "topic_title" );
	    $content_paragraph1->SetText( "Ik wil graag, net als ruim 1000 anderen, gebruik maken van Artifex™<br/>");
	    
	    $content_paragraph2 = new ART_Paragraph();
	    $content_paragraph2->SetID( "topic_text" );
	    $content_paragraph2->SetText( "Ik betaal het bedrag van €1.550,- op één van de volgende manieren:" .
	                                  "<ul>" .
        	                          "<li>Ik gebruik creditcard (VISA/American Express)</li>" .
                		                "<li>Ik maak €1.550,- over naar bankrekening 123.654.8754</li>" .
                                  	"<li>Ik machtig Artifex™ om het bedrag van mijn rekening af te schrijven</li>" .
	                                  "</ul>" );
	    
	    $content_paragraph3 = new ART_Paragraph();
	    $content_paragraph3->SetID( "topic_text" );
	    $content_paragraph3->SetText( "Hartelijk dank voor uw vertrouwen in Artifex™.<br/>"
	  	                      			. "U ontvangt uw product binnen 2 weken na betaling zonder hier extra bezorgkosten voor te betalen!" );

	    $content_paragraph4 = new ART_Text();
	    $content_paragraph4->SetID( "topic_text" );
	    $content_paragraph4->SetText( "&lt&ltback" );
	    $content_link = new ART_Link( "./", $content_paragraph4);
	    $content_link->SetID( "user_image_link" );

	    // Add the title and paragraphs to the contentgroup
	    $root->AddComponent( $content_paragraph1 );                                      
	    $root->AddComponent( $content_paragraph2 );                                      
	    $root->AddComponent( $content_paragraph3 );
	    $root->AddComponent( $content_link );
    $root->CloseGroup();
    $root->CloseGroup();
?>
