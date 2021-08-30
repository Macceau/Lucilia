<?php
include('../lib/Classe.php');
$link=DbConnect();
 
     $param=addslashes($_POST['id']);
     $sql=" delete from items where id=$param";
     $res=SendQuery($sql,$link);
      if(!$res){
         echo"bad";
       }else{
         echo "good";
       }
?>