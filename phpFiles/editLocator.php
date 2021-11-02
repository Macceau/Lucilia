<?php
 include('../lib/Classe.php');
 $link=DbConnect();
    $locator=$_POST['locator'];
    $id=$_POST['id'];
    $sql="update  locators set locator='$locator' where id='$id'";
    $res=SendQuery($sql,$link);
    if(!$res){
        Die('Erreur de la commande '.mysqli_error($link));
    }
 ?>