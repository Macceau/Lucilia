<?php
 include('../lib/Classe.php');
 $link=DbConnect();
 $param=$_POST['param'];
 $sql="select * from users where username='$param'";
     $res=SendQuery($sql,$link);
         if(!$res){
         Die('Erreur de la commande'.mysqli_error($link));
        }
        
        if(mysqli_num_rows($res)>0){
            echo "wi";
        }else{
            echo "non";
        }
 
 ?>