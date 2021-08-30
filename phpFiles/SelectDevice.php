<?php
 include('../lib/Classe.php');
 $link=DbConnect();
 $sql="select * from devices order by id desc";
     $res=SendQuery($sql,$link);
         if(!$res){
         Die('Erreur de la commande'.mysqli_error($link));
        }
        $json=array();
        while($row=BringRow($res)){
         $json[]=array(
             'id'=>$row["id"],
             'device'=>$row["device"]
         );
        }
        $jsonstring=json_encode($json);
        echo $jsonstring;    
 
 ?>