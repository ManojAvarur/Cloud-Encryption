<?php
    include 'headers.php';
    
    if( isset( $_POST['submit'] ) && !empty( $_FILES['upload'] ) ){

        $file = $_FILES['upload'];
        // print_r($file);

        if( ! $file['error'] > 0 && $file['size'] < 41943040 ){

            if( ! file_exists( 'Encrypt' ) )
                mkdir( 'Encrypt' );
            
            $file_name = 'Encrypt/'.md5( time() * random_int(1,10000) ).'-'.$file['name'];
            move_uploaded_file( $file['tmp_name'], $file_name );
 
            // CryptFile($file_name,'Encrypted/'.$file['name'],'12121231212123');  
            DecryptFile('Encrypted/'.$file['name'], 'Dec/'.$file['name'], '12121231212123');
            unlink($file_name);

        } else {

            echo "<script>
                    alert('Error in uploading file');
                    window.location.href = 'index.html';
                </script>";

        }

    }


