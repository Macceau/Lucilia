<?php
 include('../lib/Classe.php');
 $link=DbConnect();
 $param=$_POST['param'];
 $sql="select * from items where item_number like '%$param%' order by id desc";
     $res=SendQuery($sql,$link);
         if(!$res){
         Die('Erreur de la commande'.mysqli_error($link));
        }
        $json=array();
        while($row=BringRow($res)){
         $json[]=array(
             'id'=>$row["id"],
             'item'=>$row["item_number"],
             'itemdesc'=>$row["item_desc"]
         );
        }
        $jsonstring=json_encode($json);
        echo $jsonstring;    
 
 ?>