<?php
 include('../lib/Classe.php');
 $link=DbConnect();
 $param=$_POST['id'];
 $code=$_POST['code'];
 $sql="select p.id,p.description,d.device,i.photo_link as photo from parts p left join devices d on d.id=p.id_device 
 left join items i on i.part_description=p.description where p.id=$param and i.printer_model=$code group by photo_link ";
     $res=SendQuery($sql,$link);
         if(!$res){
         Die('Erreur de la commande'.mysqli_error($link));
        }
        $json=array();
       $row=BringRow($res);
         $json[]=array(
             'id'=>$row["id"],
             'part'=>$row["description"],
             'device'=>$row["device"],
             'photo'=>$row["photo"],

         );
        
        $jsonstring=json_encode($json[0]);
        echo $jsonstring;    
 
 ?>