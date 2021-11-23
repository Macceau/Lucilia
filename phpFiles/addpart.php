<?php
 include('../lib/Classe.php');
 $link=DbConnect();
$partname=addslashes($_POST['partname']);
$machine=$_POST['machine'];
$sql="insert into parts(description,id_device) values('$partname',$machine)";
$res=SendQuery($sql,$link);
if(!$res){
    Die('Erreur de la commande '.mysqli_error($link));
}
 
 ?>