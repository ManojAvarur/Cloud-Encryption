<?php

    if( isset( $_POST['fileLoc'] ) && !empty( $_POST['fileLoc'] ) && isset( $_POST['fileName'] ) && !empty( $_POST['fileName'] ) ){

        $fileLoc = '../'.$_POST['fileLoc'];

        if( file_exists( $fileLoc ) ){

            if( !file_exists( '../ToShare' ) )
                mkdir('../ToShare');

            // if( move_uploaded_file( $fileLoc, '../ToShare/'.$_POST['fileName'] ) ){
            //     echo 'Success';
            // } else {
            //     echo 'Error';
            // }
            
            if( copy( $fileLoc, '../ToShare/'.$_POST['fileName'] ) ){
                echo 'Success';
            } else {
                echo 'Error';
            }

        }

    }