<?php
include '_headers/headers.php';

if (isset($_POST['submit']) && !empty($_FILES['upload'])) {

    $file = $_FILES['upload'];

    if (!$file['error'] > 0 && $file['size'] < 41943040) {

        $type  = 'None';
        $fileNotExist = false;

        if ($_POST['submit'] == 'Encrypt') {

            // print($_SERVER['REMOTE_ADDR']);

            $file_actual_name = '-RemoveThisPart-' . md5( microtime().''.random_int( 1,100000 ).''.$_SERVER['REMOTE_ADDR'] ) . '-' . $file['name'];

            $outputLoc = 'Encrypted/'.$file_actual_name;

            $type = 'Encrypt';

            if (!file_exists('Encrypted'))
                mkdir('Encrypted');

            if (!file_exists('ToEncrypt'))
                mkdir('ToEncrypt');

            $file_name = 'ToEncrypt/'.$file_actual_name;

            move_uploaded_file($file['tmp_name'], $file_name);

            if ($_POST['passwordType'] == 'createNew')
                $password = randmPasswordGenarator();
            elseif ($_POST['passwordType'] == 'useGiven' && !empty($_POST['userPassEntered']))
                $password = $_POST['userPassEntered'];
            else
                die('You have changed the code! 😂😂');

            CryptFile($file_name, $outputLoc, $password);

            if (file_exists($file_name))
                unlink($file_name);

            if (!file_exists($outputLoc))
                $fileNotExist = true;

            $filesize = filesize($outputLoc); // bytes
            $filesize = round($filesize / 1024, 1);

            $shareUisngLink = Cutly( "https://".$_SERVER['SERVER_NAME']."/SaveFromLink/".$file_actual_name );
        }
    } else {

        echo "<script>
                    alert('Error in uploading file');
                    window.location.href = 'index.html';
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
        

        <title>Encryptus</title>
    </head>

    <body>
        
        <div>
            <header id="header" class="fixed-top container-fluid">
                <img src="Assets/icoo.png" alt="Icon" class = "icon">
                <div>
                    <h2 class="hd">
                        Encryptus<span class = "he">.</span>
                    </h2>
                </div>
        </div>

        <section id="pict" class="d-flex align-items-center justify-content-center">
            <div class = "container">
                <div class="row">
                    <div class="col-lg-3"></div>
                    
                    <div class="col-lg-6 blk">
                        
                        <div class="typewriter">
                            <h1>File ready to download..</h1>
                        </div>
                        <br>

                        <h3 class = "head">You can refer to the below details</h3>
                        <br>

                        <table style="width:100%">
                            <tr>
                                <td class = "prop">File name: </td>
                                <td class = "ans"><?php echo $file['name'] ?></td>
                            </tr>
                            <tr>
                                <td class = "prop">Password: </td>
                                <td class = "ans">jklmnopq@123</td>
                            </tr>
                            <tr>
                                <td class = "prop">File Size: </td>
                                <td class = "ans">Secret</td>
                            </tr>
                        </table>
                        <br>

                        <div class = "text-center">
                            <h3 class = "head">You can download the file</h3>
                            <button type="button" class="btn btn-outline-success btn-lg ">Download</button>
                        </div>
                        <br>

                        <h5 class = "head">(OR)</h5>
                        <br>

                        <h5 class = "head">Share link</h5>

                        <div class = "text-center">
                            <ul class="social-network social-circle">
                                <li><a href="#" class="icoen" title="Mail"><i class="fa fa-envelope"></i></a></li>
                                <li><a href="#" class="icoWhatsapp" title="Whatsapp"><i class="fa fa-whatsapp"></i></a></li>
                                <li><a href="#" class="icoShare" title="Share"><i class="fa fa-link"></i></a></li>
                                <br>
                                <br>
                                <a href = "index.html"><button type="button" class="btn btn-outline-warning">Home page</button></a>
                            </ul>
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
                            <h3 class = "ft">The encryption genie is out of the bottle!</h3>
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


    </body>
</html>

<?php 

} else {

?>

<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="Assets/style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> 
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poiret+One&family=Potta+One&display=swap" rel="stylesheet">
        
        <title>Encryptus</title>
    </head>

    <body>
        
        <div>
            <header id="header" class="fixed-top container-fluid">
                <img src="Assets/icoo.png" alt="Icon" class = "icon">
                <div>
                    <h2 class="hd">
                        Encryptus<span class = "he">.</span>
                    </h2>
                </div>
        </div>

        <section id="who" class="d-flex align-items-center justify-content-center">
            <div class = "container">
                <div class="row">
                    <div class="col-xl-4 col-lg-8">
                    </div>
                    <div class="col-xl-8 col-lg-8 blk">
                        <div class="typewriter">
                            <h1>Sorry!We couldn't recognize you..</h1>
                        </div>
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
                            <h3 class = "ft">The encryption genie is out of the bottle!</h3>
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
        

    </body>
</html>

<?php

}


?>