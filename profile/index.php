<?php
function generate_username($length = 8){  
    $conso=array("b","c","d","f","g","h","j","k","l",  
    "m","n","p","r","s","t","v","w","x","y","z");  
    $vocal=array("a","e","i","o","u");  
    $username ="";  
    srand ((double)microtime()*1000000);  
    $max = $length/2;  
    for($i=1; $i<=$max; $i++)  
    {  
    $username.=$conso[rand(0,19)];  
    $username.=$vocal[rand(0,4)];  
    }  
    return $username;  
} 

/*
function generate_password($l = 8){  
  $c= "!#$%&'()*+,-./:;<=>?@[]^_{}" . "ABCDEFGHIJKLMNOPQRSTUVWXYZ" . "abcdefghijklmnopqrstuvwxyz" . "0123456789";  
  srand((double)microtime()*1000000);  
  for($i=0; $i<$l; $i++) {  
      $rand.= $c[rand()%strlen($c)];  
  }  
  return $rand;  
}
*/

function generate_password($length=16){
 
    // the wordlist from which the password gets generated 
    // (change them as you like)
    $words = 'dog,cat,sheep,sun,sky,red,ball,happy,ice,';
    $words .= 'green,blue,music,movies,radio,green,turbo,';
    $words .= 'mouse,computer,paper,water,fire,storm,chicken,';
    $words .= 'boot,freedom,white,nice,player,small,eyes,';
    $words .= 'path,kid,box,black,flower,ping,pong,smile,';
    $words .= 'coffee,colors,rainbow,plus,king,tv,ring';
 
    // Split by ",":
    $words = explode(',', $words);
    if (count($words) == 0){ die('Wordlist is empty!'); }
 
    // Add words while password is smaller than the given length
    $pwd = '';
    while (strlen($pwd) < $length){
        $r = mt_rand(0, count($words)-1);
        $pwd .= ucfirst($words[$r]);
    }
 
    // append a number at the end if length > 2 and
    // reduce the password size to $length
    $num = mt_rand(1, 99);
    if ($length > 2){
        $pwd = substr($pwd,0,$length-strlen($num)).$num;
    } else { 
        $pwd = substr($pwd, 0, $length);
    }
 
    return $pwd;
 
}

$ID = [
	'username' => generate_username(),
  	'password' => generate_password()
];

$json_response = json_encode($ID, JSON_PRETTY_PRINT);

echo $json_response;
