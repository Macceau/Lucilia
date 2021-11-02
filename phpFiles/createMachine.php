<?php
 include('../lib/Classe.php');
 $link=DbConnect();
$machine=$_POST['machine'];
$sql="insert into devices(device) values('$machine')";
$res=SendQuery($sql,$link);
if(!$res){
    Die('Erreur de la commande '.mysqli_error($link));
}
 
 ?>