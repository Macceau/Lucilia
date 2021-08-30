<?php
 include('../lib/Classe.php');
 $link=DbConnect();
 $param=$_POST['param'];
 $sql="select * from items where id='$param'";
     $res=SendQuery($sql,$link);
         if(!$res){
         Die('Erreur de la commande'.mysqli_error($link));
        }
        $json=array();
        while($row=BringRow($res)){
         $json[]=array(
             'itemdesc'=>$row["item_desc"],
             'part'=>$row["part_description"]
         );
        }
        $jsonstring=json_encode($json[0]);
        echo $jsonstring;  
 
 ?>