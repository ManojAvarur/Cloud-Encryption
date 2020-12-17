<?php

function CryptFile($InFileName,$OutFileName,$password){
    //check the file if exists
    if (file_exists($InFileName)){
        $OutFile = '';

        //get file content as string
        $InFile = file_get_contents($InFileName);
        
        // get string length
        $StrLen = strlen($InFile);
        
        // get string char by char
        for ($i = 0; $i < $StrLen ; $i++){
            //current char
            $chr = substr($InFile,$i,1);
            
            //get password char by char
            $modulus = $i % strlen($password);
            $passwordchr = substr($password,$modulus, 1);
            
            //encryption algorithm
            $OutFile .= chr(ord($chr)+ord($passwordchr));
        }
        
        $OutFile = base64_encode($OutFile);
        
        //write to a new file
        if($newfile = fopen($OutFileName, "c")){
            file_put_contents($OutFileName,$OutFile);
            fclose($newfile);
            return true;
        } else {
            return false;
        }

    } else {
        return false;
    }
}


function DecryptFile($InFileName,$OutFileName,$password){
    $OutFile = '';

    //check the file if exists
    if (file_exists($InFileName)){
        
        //get file content as string
        $InFile = file_get_contents($InFileName);
        $InFile = base64_decode($InFile);
        // get string length
        $StrLen = strlen($InFile);
        
        // get string char by char
        for ($i = 0; $i < $StrLen ; $i++){
            //current char
            $chr = substr($InFile,$i,1);
            
            //get password char by char
            $modulus = $i % strlen($password);
            $passwordchr = substr($password,$modulus, 1);
            
            //encryption algorithm
            $OutFile .= chr(ord($chr)-ord($passwordchr));
        }
        
        //write to a new file
        if($newfile = fopen($OutFileName, "c")){
            file_put_contents($OutFileName,$OutFile);
            fclose($newfile);
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}


?>


// function encrypt_file($file, $destination, $passphrase) { 
//     $handle = fopen($file, "rb") or die("could not open the file");
//     $contents = fread($handle, filesize($file));
//     fclose($handle);
//     $iv = substr(md5("\x18\x3C\x58". $passphrase, true),0,8);
//     $key = substr(md5("\x2D\xFC\xD8". $passphrase, true).md5("\x2D\xFC\xD8". $passphrase, true),0,24); 
//     $opts = array('iv'=>$iv, 'key'=>$key); 
//     $fp = fopen($destination, 'wb') or die("Could not opn file for writing");
//     stream_filter_append($fp, 'mcrypt.blowfish',STREAM_FILTER_WRITE, $opts); 
//     fwrite($fp, $contents) or die("Could not write to file"); 
//     fclose($fp);
// }