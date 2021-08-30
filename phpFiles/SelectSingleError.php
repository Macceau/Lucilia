<?php
 include('../lib/Classe.php');
 $link=DbConnect();
 $param=$_POST['id']; 
 $sql="SELECT e.id,e.problem,e.probable_cause,e.corrective_action,d.device AS printer_model FROM errores e
 LEFT JOIN devices d ON d.id=e.printer where e.id='$param' ORDER BY id desc";
     $res=SendQuery($sql,$link);
         if(!$res){
         Die('Erreur de la commande'.mysqli_error($link));
        }
        $json=array();
        while($row=BringRow($res)){
         $json[]=array(
             'id'=>$row["id"],
             'problem'=>$row["problem"],
             'cause'=>$row["probable_cause"],
             'corrective'=>$row["corrective_action"],
             'printer'=>$row["printer_model"]
         );
        }
        $jsonstring=json_encode($json[0]);
        echo $jsonstring;    
?>