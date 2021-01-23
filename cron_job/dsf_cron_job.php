<?php

    function deleteFile( $location ){
 
        $files = scandir($location,1);

        for( $i = 0; $i < count( $files ); $i++ ){

            if ( time() - filemtime( $location.'/'.$files[$i] )  > 86400 )
                unlink( $location.'/'.$files[$i] );
                    
        }
    }

    // $files = scandir('../ToShare',1);
    date_default_timezone_set('Asia/Kolkata');
    // $files = scandir('D:/Movies',1);

    // for( $i = 0; $i < count( $files ); $i++ )
    //     deleteFile( $files[$i] );   

    deleteFile('../ToShare');