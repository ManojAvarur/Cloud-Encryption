<?php
include '_headers/headers.php';
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
                <a href="index.php" style="text-decoration: none;">
                    <img src="Assets/icoo.png" alt="Icon" class = "icon">
                    <div>
                        <h2 class="hd">
                            Encryptus<span class = "he">.</span>
                        </h2>
                    </div>
                </a>
        </div>

    <section id="pict1" class="d-flex align-items-center justify-content-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-3"></div>


                <?php

                if (isset($_GET['filename']) && !empty($_GET['filename']) && file_exists('ToShare/' . $_GET['filename'])) {

                    $file_name = substr($_GET['filename'], 49);

                    $filesize = filesize('ToShare/' . $_GET['filename']);

                    $filesize = round($filesize / 1024, 1);

                ?>


                    <!-- ==================== From Here ===================================== -->

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
                                <td class="ans"><span class="d-inline-block text-truncate" style="max-width: 230px;"><?php echo $file_name ?></span></td>

                            </tr>
                            <tr>
                                <td class="prop">File Size: </td>
                                <td class="ans"><span class="d-inline-block text-truncate" style="max-width: 230px;"><?php echo $filesize ?> KB</span></td>
                            </tr>
                        </table>

                        <br>
                        <form action="savefromlink.php" method="post">
                            <div class="text-center form-group">
                                <input type="hidden" name="hidden-name" value="<?php echo $_GET['filename'] ?>">
                                <input type="password" name="hidden-password" class="form-control-lg" name="decPass" id="password" placeholder="Enter your Password" required>
                                <!-- <input type="submit" class="btn btn-outline-new" name="submit" value="Submit"> -->
                            </div>

                            <br>

                            <div class="text-center">
                                <input type="submit" class="btn btn-outline-success btn-lg " name="submit-pass" value="Submit">
                            </div>

                        </form>
                        <!-- 
                                    <div class = "text-center">
                                        <h3 class = "head">You can download the file</h3>
                                        <button type="button" class="btn btn-outline-success btn-lg ">Download</button>
                                        <br>
                                        <br>
                                        <a href = "index.php"><button type="button" class="btn btn-outline-warning">Home page</button></a>
                                    </div> -->



                    </div>

                    <!-- ==================== Till Here ===================================== -->



                <?php
                    unset($_GET['filename']);
                } elseif (isset($_POST['submit-pass']) && isset($_POST['hidden-name']) && !empty($_POST['hidden-name']) && isset($_POST['hidden-password']) && !empty($_POST['hidden-password'])) {

                    $inloc = 'ToShare/' . $_POST['hidden-name'];

                    $outLoc = 'Decrypted/' . $_POST['hidden-name'];

                    $password = $_POST['hidden-password'];

                    if( !file_exists('Decrypted') ){
                        mkdir('Decrypted');
                    }

                    DecryptFile($inloc, $outLoc, $password);

                    if (file_exists($inloc)) {
                        unlink($inloc);
                    }

                    if (!file_exists($outLoc)) {
                        // die('../' . $outLoc . '');
                        header('location:whoareyou.html');
                    }

                    $file_name = substr($_POST['hidden-name'], 49);

                    $filesize = filesize($outLoc);

                    $filesize = round($filesize / 1024, 1);

                ?>
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
                                <td class="ans"><span class="d-inline-block text-truncate" style="max-width: 230px;"><?php echo $file_name ?></span></td>
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
                            <a href="<?php echo "saveas.php?fileName=" . $file_name . "&&type=dec&&file=" . $outLoc; ?>" onclick="downloaded()" id="downCompleted" class="btn btn-outline-danger btn-lg ">Download</a>
                            <br>
                            <br>
                            <a href="index.php"><input type="hidden" id="goBack" class="btn btn-outline-warning" value="Home page"></a>
                        </div>



                    </div>


                <?php
                } else {
                    header('location:whoareyou.html');
                }
                ?>

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