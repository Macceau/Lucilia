<?php
 include('../lib/Classe.php');
 $link=DbConnect();
$sigle=$_POST['sigle'];
$sql="insert into sigles(sigle) values('$sigle')";
$res=SendQuery($sql,$link);
if(!$res){
    Die('Erreur de la commande '.mysqli_error($link));
}
 
 ?>