<?php
    include 'headers.php';
    
    if( isset( $_POST['submit'] ) && !empty( $_FILES['upload'] ) ){

        $file = $_FILES['upload'];
        $outputLoc = 'Encrypted/'.$file['name'];

        if( ! $file['error'] > 0 && $file['size'] < 41943040 ){

            if( isset( $_POST['submit'] ) && $_POST['submit'] == 'Encrypt'){

                if( ! file_exists( 'ToEncrypt' ) )
                    mkdir( 'ToEncrypt' );

                $file_name = 'ToEncrypt/'.md5( time() * random_int(1,10000) ).'-'.$file['name'];

                move_uploaded_file( $file['tmp_name'], $file_name );

                if( $_POST['passwordType'] == 'createNew' ){
                    randmPasswordGenarator();
                    CryptFile( $file_name, $outputLoc , randmPasswordGenarator() );

                    if( file_exists($file_name) )
                        unlink($file_name);

                    
                }

            }


        } else {

            echo "<script>
                    alert('Error in uploading file');
                    window.location.href = 'index.html';
                </script>";

        }

   



//     if( ! file_exists( 'Encrypt' ) )
//     mkdir( 'Encrypt' );

// $file_name = 'Encrypt/'.md5( time() * random_int(1,10000) ).'-'.$file['name'];
// move_uploaded_file( $file['tmp_name'], $file_name );

// // CryptFile($file_name,'Encrypted/'.$file['name'],'12121231212123');  
// DecryptFile('Encrypted/'.$file['name'], 'Dec/'.$file['name'], '12121231212123');
// unlink($file_name);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="Assets/style.css">
    <link rel="icon" href="Assets/icoo.ico" type="image/x-icon">
    <title>Encrypt/Decrypt Download</title>
</head>
<body>
<div class="container">
        <div class="jumbotron jumbotron-modified">
            <h1 class="display-4">Hello, There!</h1>
            <p class="lead">This website allows you to encrypt and decrypt(<span class="span-modified">which is
                    encrypted using this website</span>) kind of data.</p>
            <hr class="my-4">
            <p>
                <span class="span-modified">*NOTE : </span>It ecrypts the data and it never keeps any backup in the
                cloud
                and it's an open source software which means that you can view the source code of this website. To view
                the source code <a href="https://github.com/ManojAvarur/Cloud-Encryption" target="_blank"
                    class="text-warning modified-text"> click here </a>
            </p>
            <hr class="my-4">
            <div class="container">

                    <div class="card text-center" style="background-color:  #1d1d1d;">
                        <div class="card-header">
                            <h1 style="text-decoration: underline;">Download</h1>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"> - File Name - </h5>
                            <h5 class="card-title">Password : </h5>
                            <p class="card-text">Your File Is Ready To Download</p>
                            <a href="#" class="btn btn-primary">Download</a>
                        </div>
                        <div class="card-footer text-muted">
                            - Size Of File -
                        </div>
                    </div>

                    <hr class="my-4">
                    <p style="text-align: center;">
                        <span class="span-modified">*NOTE : </span> If the file is not downloaded after the computation the data
                        will be deleted and it cannot be accessed by the user.
                    </p>

                    <hr class="my-4">
                    <p style="text-align: center;">
                        <span class="span-modified">*NOTE : </span> If the enterd password is incorrect then the file will also be corrupted.
                    </p>
                
            </div>
        </div>
</body>
</html>
<?php
 } else {

    header('location:index.html');

 }