<?php
 include('../lib/Classe.php');
 $link=DbConnect();
 $param=$_POST['itemid'];
 $action=$_POST['action'];

 if($action=="Add Quantity"){
   $val=$_POST['actualqty']+$_POST['newqty'];
 }else if($action=="Reduce Quantity"){
   $val=$_POST['actualqty']-$_POST['newqty'];
 }
 
 if($val==0){
    $status="Un-exists";
 }else{
    $status="Exists";
 }
 
 $sql="update inventary set quantity=$val,statut='$status' where id=$param";
     $res=SendQuery($sql,$link);
        if(!$res){
         Die('Erreur de la commande'.mysqli_error($link));
        }else{
            echo "good";
        }
        
 ?>