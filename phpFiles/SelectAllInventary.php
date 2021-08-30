<?php
 include('../lib/Classe.php');
 $link=DbConnect();
 $sql="SELECT i.id,i.item_number,i.item_desc,i.part_number,i.part_description,
 d.device AS printer_model,i.photo_link,inv.id AS cod,inv.quantity,inv.statut
 FROM inventary inv LEFT JOIN items i ON inv.item_number=i.id LEFT JOIN devices d ON d.id=i.printer_model order by cod desc";
     $res=SendQuery($sql,$link);
        if(!$res){
         Die('Erreur de la commande'.mysqli_error($link));
        }
        $json=array();
        while($row=BringRow($res)){
         $json[]=array(
             'id'=>$row["cod"],
             'iditem'=>$row["id"],
             'item'=>$row["item_number"],
             'itemdesc'=>$row["item_desc"],
             'part'=>$row["part_number"],
             'partdesc'=>$row["part_description"],
             'printer'=>$row["printer_model"],
             'link'=>$row["photo_link"],
             'qty'=>$row["quantity"],
             'status'=>$row["statut"],

         );
        }
        $jsonstring=json_encode($json);
        echo $jsonstring;  
 
 ?>