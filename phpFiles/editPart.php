<?php
 include('../lib/Classe.php');
 $link=DbConnect();
    $partname=$_POST['partname'];
    $id=$_POST['id'];
    $sql="update  parts set description='$partname' where id='$id'";
    $res=SendQuery($sql,$link);
    if(!$res){
        Die('Erreur de la commande '.mysqli_error($link));
    }
 ?>