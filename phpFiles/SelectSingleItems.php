<?php
 include('../lib/Classe.php');
 $link=DbConnect();
 $param=$_POST['id'];
 $sql="SELECT i.id,i.item_number,i.item_desc,i.part_number,i.part_description AS part_desc,
 d.device AS printer_model,i.photo_link FROM items i
 LEFT JOIN devices d ON d.id=i.printer_model where i.id=$param";
     $res=SendQuery($sql,$link);
         if(!$res){
         Die('Erreur de la commande'.mysqli_error($link));
        }
        $json=array();
        while($row=BringRow($res)){
         $json[]=array(
             'id'=>$row["id"],
             'item'=>$row["item_number"],
             'itemdesc'=>$row["item_desc"],
             'part'=>$row["part_number"],
             'partdesc'=>$row["part_desc"],
             'printer'=>$row["printer_model"],
             'link'=>$row["photo_link"]
         );
        }
        $jsonstring=json_encode($json[0]);
        echo $jsonstring;    
 
?>