<?php
 include('../lib/Classe.php');
 $link=DbConnect();
 $param=$_POST['param'];
 if($param=="9"){
    $sql="SELECT e.id,e.problem,e.probable_cause,e.corrective_action,d.id as code,d.device AS printer_model,e.video FROM errores e
    LEFT JOIN devices d ON d.id=e.printer  ORDER BY id desc";
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
                'printer'=>$row["printer_model"],
                'code'=>$row["code"],
                'video'=>$row["video"]
            );
           }
           $jsonstring=json_encode($json);
           echo $jsonstring;    
 }else{
 $sql="SELECT e.id,e.problem,e.probable_cause,e.corrective_action,d.id as code,d.device AS printer_model,e.video FROM errores e
 LEFT JOIN devices d ON d.id=e.printer where e.printer='$param' ORDER BY id desc";
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
             'printer'=>$row["printer_model"],
             'code'=>$row["code"],
             'video'=>$row["video"]
         );
        }
        $jsonstring=json_encode($json);
        echo $jsonstring;    
    }
?>