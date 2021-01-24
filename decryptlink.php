<?php

    include '_headers/headers.php';

    
    if( isset( $_GET['file'] ) && !empty( $_GET['file'] ) && isset( $_GET['password'] ) && !empty( $_GET['password'] ) ){

        $file = urldecode( $_GET['file'] );
        $pass = urldecode( $_GET['password'] );

        if( file_exists( 'ToShare/'.$file ) ){  

               // mkdir('test');
            if (!file_exists('Decrypted'))
                mkdir('Decrypted');

            // $myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
            // $txt = $_GET['password'].'\n'.urldecode($_GET['password']) ;
            // fwrite($myfile, $txt);

            DecryptFile( 'ToShare/'.$file, 'Decrypted/'.$file, $pass );

            if ( !file_exists( 'Decrypted/'.$file) ) {
                var_dump(http_response_code(201));
            }

        } else {
            var_dump(http_response_code(201));
        } 


    } else {
        var_dump(http_response_code(201));
    }