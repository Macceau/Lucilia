<?php
 include('../lib/Classe.php');
 $link=DbConnect();
 $id=$_POST['id'];
 $val=$_GET['param'];
 if($val==0){
    $status="Un-exists";
 }else{
    $status="Exists";
 }
 
 $sql="update inventary set quantity=$val,statut='$status' where id=$id";
     $res=SendQuery($sql,$link);
        if(!$res){
         Die('Erreur de la commande'.mysqli_error($link));
        }else{
            echo "good";
        }
        
 ?>