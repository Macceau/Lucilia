<?php
 include('../lib/Classe.php');
 $link=DbConnect();
$locator=$_POST['locator'];
$sql="insert into locators(locator) values('$locator')";
$res=SendQuery($sql,$link);
if(!$res){
    Die('Erreur de la commande '.mysqli_error($link));
}
 
 ?>