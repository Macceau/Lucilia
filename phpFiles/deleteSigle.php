<?php
 include('../lib/Classe.php');
 $link=DbConnect();
    $sigle=$_POST['sigle'];
    $id=$_POST['id'];
    $sql="delete from sigles where id='$id'";
    $res=SendQuery($sql,$link);
    if(!$res){
        Die('Erreur de la commande '.mysqli_error($link));
    }
 ?>