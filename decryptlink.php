<?php

    include '_headers/headers.php';

    
    if( isset( $_POST['file'] ) && !empty( $_POST['file'] ) && isset( $_POST['password'] ) && !empty( $_POST['password'] ) ){

        // $file = urldecode( $_POST['file'] );
        // $_POST['password'] = urldecode( $_POST['password'] );

        // mkdir('test');

        if( file_exists( 'ToShare/'.$_POST['file'] ) ){  

               // mkdir('test');
            if (!file_exists('Decrypted'))
                mkdir('Decrypted');

            // $myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
            // $txt = $_POST['password'];
            // fwrite($myfile, $txt);

            DecryptFile( 'ToShare/'.$_POST['file'], 'Decrypted/'.$_POST['file'], $_POST['password'] );

            if ( !file_exists( 'Decrypted/'.$_POST['file']) ) {
                var_dump(http_response_code(201));
            }

        } else {
            var_dump(http_response_code(201));
        } 


    } else {
        var_dump(http_response_code(201));
    }