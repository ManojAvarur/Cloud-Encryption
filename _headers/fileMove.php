<?php

    if( isset( $_GET['outFileLoc'] ) && !empty( $_GET['outFileLoc'] ) && isset( $_GET['fileName'] ) && !empty( $_GET['fileName'] ) ){

        $outFileLoc = '../'.$_GET['outFileLoc'];

        if( file_exists( $outFileLoc ) ){

            if( !file_exists( '../ToShare' ) )
                mkdir('../ToShare');
            
            if(!  copy( $outFileLoc, '../ToShare/'.$_GET['fileName'] ) ){
                var_dump(http_response_code(201));
                // die('Failed To Generate Link!') ;
            } 



        }

    }