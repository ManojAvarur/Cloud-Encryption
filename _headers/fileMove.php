<?php

    if( isset( $_GET['outFileLoc'] ) && !empty( $_GET['outFileLoc'] ) && isset( $_GET['fileName'] ) && !empty( $_GET['fileName'] ) ){

        $inFileLoc = '../'.$_GET['outFileLoc'];
        $outFileLoc = '../ToShare/'.$_GET['fileName'];

        mkdir($_GET['outFileLoc']);

        if( file_exists( $inFileLoc ) ){

            if( !file_exists( '../ToShare' ) )
                mkdir('../ToShare');
            
            if(!  copy( $inFileLoc, $outFileLoc ) ){
                var_dump(http_response_code(201));
                // die('Failed To Generate Link!') ;
            } 

            unlink($inFileLoc);

        }

    }