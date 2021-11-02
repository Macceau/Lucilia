<?php
include('../lib/Classe.php');
$link=DbConnect();
if(!empty(isset($_POST['name']))){
    $name=addslashes($_POST['name']);
    $email=addslashes($_POST['email']);
    $username=addslashes($_POST['username']);
    $password=Encrypt(addslashes($_POST['password']));
    $sql=" insert into users(fullname,email,username,password) values('$name','$email','$username','$password')";
    $res=SendQuery($sql,$link);
     if(!$res){
        echo"bad";
      }else{
        echo "good";
      }
}else{
    echo"bad";
}
    
?>