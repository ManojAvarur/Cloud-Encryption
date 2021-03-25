<?php

    // class My extends Thread {
    //     public function run() {
    //         $location = '../ToShare';
    //         $files = scandir($location,1);

    //         // print_r($files);

    //         for( $i = 0; $i < count( $files ); $i++ ){

    //             if ( time() - filemtime( $location.'/'.$files[$i] )  > 86400 )
    //                 unlink( $location.'/'.$files[$i] );
                        
    //         }

    //     }
    // }


    function deleteFile( $location ){

        // $my = new My();
        // $my->start();
 
        $files = scandir($location,1);

        // print_r($files);

        for( $i = 0; $i < count( $files ); $i++ ){

            if ( time() - filemtime( $location.'/'.$files[$i] )  > 86400 )
                unlink( $location.'/'.$files[$i] );
                    
        }


    }

    // $files = scandir('../ToShare',1);
   
    // $files = scandir('D:/Movies',1);

    // for( $i = 0; $i < count( $files ); $i++ )
    //     deleteFile( $files[$i] );  

    // $file = fopen( 'visitors.txt', 'r');
    // $visits = fscanf($file,"%d");
    // fclose($file);

    // $visits[0]++;
    
    // $file = fopen( 'visitors.txt', 'w');
    // fwrite($file,$visits[0]);
            
    // fclose($file); 

    echo "Hello World";

    date_default_timezone_set('Asia/Kolkata');

    deleteFile('../ToShare');

