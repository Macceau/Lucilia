<?php
 include('../lib/Classe.php');
 $link=DbConnect();
    $sub=$_POST['sub'];
    $id=$_POST['id'];
    $sql="update  subinventary set sub='$sub' where id='$id'";
    $res=SendQuery($sql,$link);
    if(!$res){
        Die('Erreur de la commande '.mysqli_error($link));
    }
 ?>