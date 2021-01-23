<?php

    include '_headers/headers.php';

    if( isset( $_GET['file'] ) && !empty( $_GET['file'] ) && file_exists( 'ToShare/'.$_GET['file'] ) && isset( $_GET['password'] ) && !empty( $_GET['password'] ) ){

        // mkdir('test');
        if (!file_exists('Decrypted'))
            mkdir('Decrypted');

        DecryptFile( 'ToShare/'.$_GET['file'], 'Decrypted/'.$_GET['file'], $_GET['password'] );

        if ( !file_exists( 'Decrypted/'.$_GET['file'] ) ) {
            var_dump(http_response_code(201));
        }


    } else {
        var_dump(http_response_code(201));
    }