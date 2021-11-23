<?php
 include('../lib/Classe.php');
 $link=DbConnect();
    $id=$_POST['id'];
    $sql="select id,device,photo from devices where id='$id'";
    $res=SendQuery($sql,$link);
    $row=BringRow($res);
    $json=array();
		
		$json[]=array(
			'id'=>$row["id"],
			'device'=>$row["device"],
			'photo'=>$row["photo"]
			);
	
	$jsonstring=json_encode($json[0]);
	echo $jsonstring;
 ?>