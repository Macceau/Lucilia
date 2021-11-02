<?php
 include('../lib/Classe.php');
 $link=DbConnect();
    $id=$_POST['id'];
    $sql="select id,locator from locators where id='$id'";
    $res=SendQuery($sql,$link);
    $row=BringRow($res);
    $json=array();
		
		$json[]=array(
			'id'=>$row["id"],
			'locator'=>$row["locator"]
			);
	
	$jsonstring=json_encode($json[0]);
	echo $jsonstring;
 ?>