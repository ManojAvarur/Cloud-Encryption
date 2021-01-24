<?php
include '_headers/headers.php';

if ( isset($_POST['submit']) && !empty($_FILES['chooseFile']) && isset( $_POST['decPass'] ) && !empty($_POST['decPass']) ) {

    $file = $_FILES['chooseFile'];

    if (!$file['error'] > 0 && $file['size'] < 41943040) {


        $file_actual_name = '-RemoveThisPart-' . md5(microtime() . '' . random_int(1, 100000) . '' . $_SERVER['REMOTE_ADDR']) . '-' . $file['name'];

        $outputLoc = 'Decrypted/' . $file_actual_name;

        if (!file_exists('Decrypted'))
            mkdir('Decrypted');

        if (!file_exists('ToDecrypt'))
            mkdir('ToDecrypt');

        $file_name = 'ToDecrypt/' . $file_actual_name;

        move_uploaded_file($file['tmp_name'], $file_name);

        // if (!empty($_POST['decPass'])){
            $password = $_POST['decPass'];
        // }
        DecryptFile($file_name, $outputLoc, $password);

        if (file_exists($file_name)) {
            unlink($file_name);
        }

        if (!file_exists($outputLoc)) {
            header('location:whoareyou.html');
        }

        $filesize = filesize($outputLoc); // bytes
        $filesize = round($filesize / 1024, 1);
    } else {

        echo "<script>
                    alert('Error in uploading file');
                    window.location.href = 'index.php';
                </script>";
    }

?>
    <!doctype html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="Assets/style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poiret+One&family=Potta+One&display=swap" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

        <link rel="icon" href="Assets/Icon/icoo.ico" type="image/x-icon">
        <title>Encryptus</title>
    </head>

    <body>

        <div>
            <header id="header" class="fixed-top container-fluid">
                <a href="index.php" style="text-decoration: none;">
                    <img src="Assets/Images/icoo.png" alt="Icon" class="icon">
                    <div>
                        <h2 class="hd">
                            Encryptus<span class="he">.</span>
                        </h2>
                    </div>
                </a>
        </div>

        <section id="pict1" class="d-flex align-items-center justify-content-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3"></div>

                    <div class="col-lg-6 blk">

                        <div class="typewriter">
                            <h1>File ready to download..</h1>
                        </div>
                        <br>

                        <h3 class="head">You can refer to the below details</h3>
                        <br>

                        <table style="width:100%">
                            <tr>
                                <td class="prop">File name: </td>
                                <td class="ans"><span class="d-inline-block text-truncate" style="max-width: 230px;"><?php echo $file['name'] ?></span></td>
                            </tr>
                            <tr>
                                <td class="prop">Password: </td>
                                <td class="ans"><span class="d-inline-block text-truncate" style="max-width: 230px;"><?php echo $password ?></span></td>
                            </tr>
                            <tr>
                                <td class="prop">File Size: </td>
                                <td class="ans"><span class="d-inline-block text-truncate" style="max-width: 230px;"><?php echo $filesize ?></span></td>
                            </tr>
                        </table>
                        <br>

                        <div class="text-center">
                            <h3 class="head">You can download the file</h3>
                            <!-- <button type="button" class="btn btn-outline-success btn-lg ">Download</button> -->
                            <a href="<?php echo "saveas.php?fileName=" . urlencode( $file['name'] ) . "&&type=dec&&file=" . urlencode( $file_actual_name ) ?>" onclick="downloaded()" id="downCompleted" class="btn btn-outline-danger btn-lg ">Download</a>
                            <br>
                            <br>
                            <a href="index.php"><input type="hidden" id="goBack" class="btn btn-outline-warning" value="Home page"></a>
                        </div>



                    </div>

                    <div>

                    </div>
                </div>
            </div>
        </section>

        <footer id="footer">
            <div class="footer-top">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 col-md-6 footer-links"></div>
                        <div class="col-lg-6 col-md-6 footer-links">
                            <h3 class="ft">The encryption genie is out of the bottle!</h3>
                        </div>
                        <div class="col-lg-3 col-md-6 footer-links"></div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-3 col-md-6 footer-links"></div>
                        <div class="col-lg-6 col-md-6 footer-links">
                            <div class="container">
                                <div class="row justify-content-center">

                                    <div class="col-lg-3 col-md-6 footer-links">
                                        <h4><i class="bx bx-wifi-1 fa fa-facebook"></i> <a href="#">Facebook</a></li>
                                    </div>

                                    <div class="col-lg-3 col-md-6 footer-links">
                                        <h4><i class="bx bx-wifi-1 fa fa-instagram"></i> <a href="#">Instagram</a></li>
                                    </div>

                                    <div class="col-lg-3 col-md-6 footer-links">
                                        <h4><i class="bx bx-wifi-1 fa fa-whatsapp"></i> <a href="#">Whatsapp</a></li>
                                    </div>

                                    <div class="col-lg-3 col-md-6 footer-links">
                                        <h4><i class="bx bx-wifi-1 fa fa-twitter"></i> <a href="#">Twitter</a></li>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 footer-links"></div>
                    </div>
                </div>
            </div>
        </footer>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
        <script>
            function downloaded() {
                button = document.getElementById('downCompleted');
                button.innerHTML = 'Downloaded ✔';
                button.classList.remove('btn-outline-danger');
                button.classList.add('btn-outline-success');
                document.getElementById('goBack').type = "submit";
                // if( button.classList.includes('btn-success') ){
                // alert(typeof(button.classList));
                // }
            }
        </script>

    </body>

    </html>
<?php
} else {

    header('location:whoareyou.html');
}
?>