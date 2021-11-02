<?php
 include('../lib/Classe.php');
 $link=DbConnect();
$sub=$_POST['sub'];
$sql="insert into subinventary(sub) values('$sub')";
$res=SendQuery($sql,$link);
if(!$res){
    Die('Erreur de la commande '.mysqli_error($link));
}
 
 ?>