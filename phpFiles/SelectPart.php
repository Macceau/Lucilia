<?php
 include('../lib/Classe.php');
 $link=DbConnect();

        $sql="select p.id,p.description,d.device,d.id as code from parts p left join devices d on d.id=p.id_device order by id desc";
        $res=SendQuery($sql,$link);
            if(!$res){
            Die('Erreur de la commande'.mysqli_error($link));
        }
        $json=array();
        while($row=BringRow($res)){
            $json[]=array(
                'id'=>$row["id"],
                'part'=>$row["description"],
                'device'=>$row["device"],
                'code'=>$row["code"],

            );
        }

 
        $jsonstring=json_encode($json);
        echo $jsonstring;    
 
 ?>