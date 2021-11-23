<?php
 include('../lib/Classe.php');
 $link=DbConnect();
 $sql="SELECT i.id,i.item_number,i.price,i.item_desc,i.part_number,i.part_description AS part_desc,
 d.device AS printer_model,i.photo_link FROM items i
 LEFT JOIN devices d ON d.id=i.printer_model ORDER BY id desc";

$sql1="select count(id) as qty from items";
     $res=SendQuery($sql,$link);
     $res1=SendQuery($sql1,$link);
         if(!$res){
         Die('Erreur de la commande'.mysqli_error($link));
        }
        $json=array();
        $row1=BringRow($res1);
        $val=$row1["qty"]." Of ".$row1["qty"];
        while($row=BringRow($res)){
         $json[]=array(
             'id'=>$row["id"],
             'item'=>$row["item_number"],
             'price'=>Decimal($row["price"]),
             'itemdesc'=>$row["item_desc"],
             'part'=>$row["part_number"],
             'partdesc'=>$row["part_desc"],
             'printer'=>$row["printer_model"],
             'link'=>$row["photo_link"],
             'qtyitem'=>$val
         );
        }
        $jsonstring=json_encode($json);
        echo $jsonstring;    
 
?>