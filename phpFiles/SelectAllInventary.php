<?php
 include('../lib/Classe.php');
 $link=DbConnect();
 $sql="SELECT i.id,i.item_number,i.item_desc,i.part_number,i.part_description,
 d.device AS printer_model,i.photo_link,inv.id AS cod,inv.quantity,inv.statut,
su.sub as subinventary,si.sigle,l.locator FROM inventary inv LEFT JOIN items i ON inv.item_number=i.id 
LEFT JOIN devices d ON d.id=i.printer_model left join subinventary su on su.id=inv.subinventary
left join sigles si on si.id=inv.sigle left join locators l on l.id=inv.locator order by cod desc";

$sql1="select count(id) as qty from inventary";
     $res=SendQuery($sql,$link);
     $res1=SendQuery($sql1,$link);
        if(!$res){
         Die('Erreur de la commande'.mysqli_error($link));
        }
        $json=array();
        $row1=BringRow($res1);
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
             'sub'=>$row["subinventary"],
             'sigle'=>$row["sigle"],
             'locator'=>$row["locator"],
             'qty'=>$row["quantity"],
             'status'=>$row["statut"],
             'count'=>$row1["qty"],
             

         );
        }
        $jsonstring=json_encode($json);
        echo $jsonstring;  
 
 ?>