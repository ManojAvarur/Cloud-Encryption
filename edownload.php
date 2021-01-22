<?php
include '_headers/headers.php';

if (isset($_POST['submit']) && !empty($_FILES['chooseFile'])) {

    $file = $_FILES['chooseFile'];

    if (!$file['error'] > 0 && $file['size'] < 41943040) {

        $fileNotExist = false;

        if ($_POST['submit'] == 'Encrypt') {

            // print($_SERVER['REMOTE_ADDR']);

            $file_actual_name = '-RemoveThisPart-' . md5(microtime() . '' . random_int(1, 100000) . '' . $_SERVER['REMOTE_ADDR']) . '-' . $file['name'];

            $outputLoc = 'Encrypted/' . $file_actual_name;

            if (!file_exists('Encrypted'))
                mkdir('Encrypted');

            if (!file_exists('ToEncrypt'))
                mkdir('ToEncrypt');

            $file_name = 'ToEncrypt/' . $file_actual_name;

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
                header('location:whoareyou.html');

            $filesize = filesize($outputLoc); // bytes
            $filesize = round($filesize / 1024, 1);

            $shareUisngLink = Cutly("https://" . $_SERVER['SERVER_NAME'] . "/cc/savefromlink.php?filename=" . $file_actual_name);
        }
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


        <title>Encryptus</title>
    </head>

    <body>

        <div>
            <header id="header" class="fixed-top container-fluid">
                <a href="index.php" style="text-decoration: none;">
                    <img src="Assets/icoo.png" alt="Icon" class="icon">
                    <div>
                        <h2 class="hd">
                            Encryptus<span class="he">.</span>
                        </h2>
                    </div>
                </a>
        </div>

        <section id="pict" class="d-flex align-items-center justify-content-center">
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
                            <button type="button" class="btn btn-outline-danger btn-sm " onclick='copyPassword()' id='copyPassword'>Copy Password</button>
                            <br><br>
                            <h3 class="head">You can download the file</h3>
                            <br>
                            <a href="<?php echo "saveas.php?fileName=" . $file['name'] . "&&type=enc&&file=" . $outputLoc; ?>" onclick="downloaded()" id="downCompleted" class="btn btn-outline-danger btn-lg ">Download</a>
                            <!-- <button href="<?php echo "saveas.php?fileName=" . $file['name'] . "&&type=enc&&file=" . $outputLoc; ?>" onclick='downloaded()' id='downCompleted' type="button" class="btn btn-outline-danger btn-lg ">Download</button> -->
                        </div>
                        <br>

                        <h5 class="head">(OR)</h5>
                        <br>

                        <h5 class="head">Share link</h5>

                        <div class="text-center">
                            <ul class="social-network social-circle">
                                <li> <a href="mailto:Enter_the_recipient_mail_address?Subject=Link To Download&amp;Body=Hello%20there!%0D%0AThere%20is%20a%20file%20waiting%20for%20you%20in%20our%20servers.. %0D%0A %0D%0A<?php echo $shareUisngLink ?>" onclick='shareUsingLink()' target='_blank' id='mail-link' class="icoen" title="Mail" id="mail-link"> <i class="fa fa-envelope" id="mail-icon"></i> </a> </li>
                                <li> <a href="https://wa.me/?text=*Hello%20there!* %0aThere%20is%20a%20file%20waiting%20for%20you%20in%20our%20servers.. %0a %0a<?php echo $shareUisngLink ?>" onclick="shareUsingLink()" class="icoWhatsapp" id="whatsapp-link" title="Whatsapp" target='_blank'> <i class="fa fa-whatsapp" id="whatsapp-icon"></i> </a> </li>
                                <li> <a onclick="copyLink()" href="javascript:void(0)" id="copy-link" class="icoShare" title="Share"> <i class="fa fa-link" id="copy-icon"></i> </a> </li>
                                <br>
                                <br>
                                <a href="index.php"><input type="hidden" id="goBack" class="btn btn-outline-warning" value="Home page"></a>
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
                // button.href = "javascript:void(0)";
                document.getElementById('goBack').type = "submit";
                // if( button.classList.includes('btn-success') ){
                // alert(typeof(button.classList));
                // }

                if (window.copyPassword) {

                    document.getElementById('whatsapp-link').href = 'javascript:void(0)';
                    document.getElementById('whatsapp-link').target = '';
                    document.getElementById('whatsapp-link').onclick = null;

                    document.getElementById('mail-link').href = 'javascript:void(0)';
                    document.getElementById('mail-link').target = '';
                    document.getElementById('mail-link').onclick = null;

                    document.getElementById('copy-link').onclick = null;

                    document.getElementById('whatsapp-icon').classList.add('isDisabled');
                    document.getElementById('mail-icon').classList.add('isDisabled');
                    document.getElementById('copy-icon').classList.add('isDisabled');

                }
            }

            function copyPassword() {
                var tempInput = document.createElement("input");
                tempInput.style = "position: absolute; left: -1000px; top: -1000px";
                tempInput.value = "<?php echo $password ?>";
                document.body.appendChild(tempInput);
                tempInput.select();
                document.execCommand("copy");
                document.body.removeChild(tempInput);
                button = document.getElementById('copyPassword');
                button.innerHTML = 'Copied ✔';
                button.classList.remove('btn-outline-danger');
                button.classList.add('btn-outline-success');
            }

            function copyLink(check = false) {
                if (!check) {
                    shareUsingLink(true);
                    return NaN;
                }
                if (check) {
                    var tempInput = document.createElement("input");
                    tempInput.style = "position: absolute; left: -1000px; top: -1000px";
                    tempInput.value = "<?php echo $shareUisngLink ?>";
                    document.body.appendChild(tempInput);
                    tempInput.select();
                    document.execCommand("copy");
                    document.body.removeChild(tempInput);
                    // var iconLink = document.getElementById('copy-icon');
                    // iconLink.src = "Assets/Icons/link-copied.png";
                    // iconLink.alt = 'Link copied';
                }
            }

            function shareUsingLink(copylink = false) {

                var check = false;
                // alert(check);
                var downloadButton = document.getElementById('downCompleted');
                var xhttp = new XMLHttpRequest();
                xhttp.open("GET", "_headers/fileMove.php?<?php echo 'outFileLoc=' . $outputLoc . '&&fileName=' . $file_actual_name ?>", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 201) {
                        alert('Failed to generate link!');
                    } else if (this.readyState == 4 && this.status == 200) {
                        document.getElementById('goBack').type = "submit";
                        downloadButton.href = 'javascript:void(0)';
                        downloadButton.disable = true;
                        downloadButton.onclick = null;
                        downloadButton.classList.add('isDisabled');
                        changeOnclick();
                        if (copylink) {
                            copyLink(true);
                        }
                    }
                };
            }

            function changeOnclick() {
                document.getElementById('whatsapp-link').onclick = null;
                // document.getElementById('facebook-link').onclick = null;
                document.getElementById('mail-link').onclick = null;
                document.getElementById('copy-link').onclick = null;
                document.getElementById('copy-link').href = 'javascript:copyLink(true)';
            }
        </script>

    </body>

    </html>

<?php

} else {

    header('location:whoareyou.html');
}


?>