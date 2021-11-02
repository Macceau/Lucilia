<?php
 include('../lib/Classe.php');
 $link=DbConnect();
    $machine=$_POST['machine'];
    $id=$_POST['id'];
    $sql="update  devices set device='$machine' where id='$id'";
    $res=SendQuery($sql,$link);
    if(!$res){
        Die('Erreur de la commande '.mysqli_error($link));
    }
 ?>