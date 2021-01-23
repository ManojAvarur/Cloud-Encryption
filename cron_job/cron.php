<?php

function deleteFiles( $location ){

    $files = scandir($location,1);

    // echo $location;

    // print_r( $files);

    for( $i = 2; $i < count( $files ); $i++ ){
        if( file_exists( $location.'/'.$files[$i] )  )
            unlink( $location.'/'.$files[$i] );
            // echo  $files[$i].'<br>';
    }

}

deleteFiles( '../Decrypted' );
deleteFiles( '../Encrypted' );
deleteFiles( '../ToDecrypt' );
deleteFiles( '../ToEncrypt' );

// echo 'Dobe';


?>