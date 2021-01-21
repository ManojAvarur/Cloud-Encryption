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

        <section id="pict1" class="d-flex align-items-center justify-content-center">
            <div class = "container">
                <div class="row">
                    <div class="col-lg-4"></div>
                    
                    <div class="col-lg-4 blk">
                        <form style = "width: 100%" method = "POST" action="ddownload.php" enctype="multipart/form-data">
                        <div class="typewriter">
                            <h1>To Decrypt...</h1>
                            <br>
                            <div class="file-upload">
                                <div class="file-select">
                                    <div class="file-select-button" id="fileName">Choose File</div>
                                    <div class="file-select-name" id="noFile">No file chosen...</div> 
                                    <input type="file" name="chooseFile" id="chooseFile" onchange="fileValidation('chooseFile')" required>
                                    <!-- <input type="file" name="upload" id="efile" onchange="fileValidation('efile')" required /> -->
                                </div>
                            </div>
                        </div>
                        <br>
                        <div>
                            <label for="password" class="passu"><p class = rad>Password&nbsp;&nbsp;:&nbsp;&nbsp;</p></label>
                            <input type="password" class="form-control-sm" name="decPass" id="password" placeholder="Enter your Password" required>
                        </div>
                        <br>
                        <div class = "text-center">
                            <input type="submit" class="btn btn-outline-new btn-lg" name="submit" value="Decrypt">
                        </div>
                        </form>
                    <div class = "col-lg-4"></div>

                    
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

        <script>

                $('#chooseFile').bind('change', function () {
                var filename = $("#chooseFile").val();
                if (/^\s*$/.test(filename)) {
                    $(".file-upload").removeClass('active');
                    $("#noFile").text("No file chosen..."); 
                }
                else {
                    $(".file-upload").addClass('active');
                    $("#noFile").text(filename.replace("C:\\fakepath\\", "")); 
                }
            }
        );

        function fileValidation(value) {

            const fi = document.getElementById(value);

            var formats = ['.mkv', '.webm', '.mpg', '.mp2', '.mpeg', '.mpe', '.mpv', '.ogg', '.mp4', '.m4p', '.m4v', '.avi', '.wmv', '.mov', '.qt', '.flv', '.swf', '.avchd'];

            var extension = fi.files[0].name.substring(fi.files[0].name.lastIndexOf('.'));

            if (formats.includes(extension.toLowerCase())) {
                alert("' " + extension + " ' not supported!");
                fi.value = "";
            } else if (fi.files[0].size > 41943040) {
                alert('File to large!');
                fi.value = "";
            }
        }
        </script>
    </body>
</html>