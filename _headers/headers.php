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

    for( $i = 0; $i <= 40; $i++ )
        $password .= $ingredients[ random_int(0,2) ][ random_int(0,25) ];

    return $password;
}

function shortLinkUsingBitly($long_url){
   
    // $long_url = 'https://stackoverflow.com/questions/ask';
    $apiv4 = 'https://api-ssl.bitly.com/v4/bitlinks';
    $genericAccessToken = 'f7b23ac648483e62c87b8681af6787bfdb6a17d3';

    $data = array(
        'long_url' => $long_url
    );
    $payload = json_encode($data);

    $header = array(
        'Authorization: Bearer ' . $genericAccessToken,
        'Content-Type: application/json',
        'Content-Length: ' . strlen($payload)
    );

    $ch = curl_init($apiv4);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    $result = curl_exec($ch);

    // print_r($result);

    // json_decode($result, true);
    $result = json_decode($result, true);

    if ( array_key_exists( 'link', $result ) ){
        return $result['link'];
    } else {
        return $long_url;
    }
        

}

function Cutly( $long_url ){

    $url = urlencode($long_url);
    $json = file_get_contents('https://cutt.ly/api/api.php?key=2aa8f088ef9ea9912ace5c95b18f433b5efa0&short='.$url);
    $data = json_decode($json,true);

    // var_dump($data);
    // print_r($data);

    if( $data['url']['status'] == 7 ){
        return $data['url']['shortLink'];
    } else {
        return shortLinkUsingBitly( $long_url );
    }

}