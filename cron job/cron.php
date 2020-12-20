<?php

    function deleteFiles( $location ){

        $files = scandir( $location,1 );

        for( $i = 0; $i < count( $files ) - 2; $i++ ){
            if( file_exists( $location.'/'.$files[$i] ) )
                unlink( $location.'/'.$files[$i] );
        }

    }

    deleteFiles( '../Decrypted' );
    deleteFiles( '../Encrypted' );
    deleteFiles( '../ToDecrypt' );
    deleteFiles( '../ToEncrypt' );

?>