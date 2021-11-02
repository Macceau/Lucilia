<?php
include('../lib/Classe.php');
$link=DbConnect();
        if(!empty(isset($_POST['confirmation']))){
                $password=$_POST['current'];
                $new=Encrypt($_POST['newpassword']);
                $confirmation=Encrypt($_POST['confirmation']);
                $param=$_GET['man'];
            if($new==$confirmation){
                $sql="update users set password='$confirmation' where id=$param";
                $res=SendQuery($sql,$link);
                echo "good";
            }else{
                echo "confirm";
            }
            
        }else{
           echo"bad"; 
        }

?>