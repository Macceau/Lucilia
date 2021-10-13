<?php
 include('../lib/Classe.php');
 $link=DbConnect();
 $sql="select * from items order by id desc";
 $sql1="select count(id) as qty from items";
     $res=SendQuery($sql,$link);
     $res1=SendQuery($sql1,$link);
         if(!$res){
         Die('Erreur de la commande'.mysqli_error($link));
        }
        $json=array();
        $row1=BringRow($res1);
        $val=$row1["qty"];
        while($row=BringRow($res)){
         $json[]=array(
             'id'=>$row["id"],
             'item'=>$row["item_number"],
             'itemdesc'=>$row["item_desc"],
             'qtyitem'=>$val
         );
        }
        $jsonstring=json_encode($json);
        echo $jsonstring;    
 
 ?>