<?php

    if( isset( $_GET['file'] ) && !empty( $_GET['file'] ) && isset( $_GET['fileName'] ) && !empty( $_GET['fileName'] ) && isset( $_GET['type'] ) && !empty( $_GET['type'] ) ){

        // $file = "Decrypted/".$_GET['file'];
        $file = ( $_GET['type'] == 'enc' )? "Encrypted/".$_GET['file'] : "Decrypted/".$_GET['file'];
        
        if( file_exists( $file ) ){

            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename( $_GET['fileName'] ).'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize( $file ));
            readfile( $file );
            ignore_user_abort(true);
            unlink( $file );

            if( connection_aborted() )
                unlink( $file );
            
            // echo $file."<br>".$_GET['fileName'];

        }  else {

            echo '<script>
                    alert("File has been downloaded");
                    window.location.href = "index.php";    
                </script>
            ';

        }

    }