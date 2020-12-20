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

function randmPasswordGenarator(){

    $ingredients = [
        ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'],
        ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'],
        ['!','@','#','$','%','^','&','*','_','+',':','?','.',',','!','@','#','$','%','^','&','*','_','+',':','?']
    ];
    $password = '';

    for( $i = 0; $i <= 50; $i++ )
        $password .= $ingredients[ random_int(0,2) ][ random_int(0,25) ];

    return $password;
}
