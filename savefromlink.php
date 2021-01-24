<?php
    include '_headers/headers.php';

    if (isset($_GET['filename']) && !empty($_GET['filename']) && file_exists('ToShare/' . $_GET['filename'])) {

        $file_name = substr($_GET['filename'], 49);

        $filesize = filesize('ToShare/' . $_GET['filename']);

        $filesize = round($filesize / 1024, 1);

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
                                <td class = "ans"><span class="d-inline-block text-truncate" style="max-width: 230px;"><?php echo $file_name ?></span></td>
                            </tr>
                            <tr>
                                <td class = "prop">File Size: </td>
                                <td class = "ans"><span class="d-inline-block text-truncate" style="max-width: 230px;"><?php echo $filesize ?> KB</span></td>
                            </tr>
                        </table>
                        <br>
                        <form id="form" onsubmit="return checkFile(this)">
                            <div class = "text-center form-group">
                                <input type="password" class="form-control-sm" name="decPass" id="password" placeholder="Enter your Password" required>
                                <input type="submit" class="btn btn-outline-new" name="submit" value="Submit">
                                <!-- <button class="btn btn-outline-new">Submit</button> -->
                            </div>
                        </form>
                        <br>


                        <div class="text-center">
                            <h3 class="head isDisabled" id="download-text">You can download the file</h3>
                            <!-- <button type="button" class="btn btn-outline-success btn-lg ">Download</button> -->
                            <!-- <a href=" saveas.php?fileName=" . $file_name . "&&type=dec&&file=" . $outLoc " onclick="downloaded()" id="downCompleted" class="btn btn-outline-danger btn-lg isDisabled">Download</a> -->
                            <a href="javascript:void(0)" onclick="null" id="downCompleted" class="btn btn-outline-danger btn-lg isDisabled">Download</a>

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
                                        <h4><i class="bx bx-wifi-1 fa fa-github"></i> <a href="https://github.com/ManojAvarur/Cloud-Encryption/tree/final" target="_blank">GitHub</a></li>
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


            function checkFile(){

                var pass = document.getElementById('password');
                if( pass.value.length <= 0 ){
                    document.querySelector('#form').reportValidity();
                }

                var loc = "<?php echo "?fileName=" . $file_name . "&&type=dec&&file=" . $_GET['filename'] ?>";

                <?php
                    echo "
                        var filename = '" . $file_name . "';
                        var type = 'dec';
                        var file = '".$_GET['filename']."';
                    ";
                ?>
                
                var link = "?fileName="+encodeURIComponent(filename)+"&&type=dec&&file="+encodeURIComponent(file);

                var xhttp = new XMLHttpRequest();
                // alert( encodeURIComponent('decryptlink.php'+loc+'&&password='+pass.value) );
                
                xhttp.open("GET", 'decryptlink.php?'+link+'&&password='+encodeURIComponent(pass.value) , true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 201) {
                        alert('<?php echo $file_name ?>\n404 - file not found');
                    } else if (this.readyState == 4 && this.status == 200) {
                        var dwnb = document.getElementById('downCompleted');
                        document.getElementById('download-text').classList.remove('isDisabled');
                        dwnb.href = "saveas.php"+loc;
                        dwnb.classList.remove('isDisabled');
                        dwnb.onclick = function(){ downloaded() };
                        // dwnb.target = '_blank';
                    }
                };
                return false;
            }
        </script>

    </body>
</html>

<?php
    } else {
        header('location:whoareyou.html');
    }
?>