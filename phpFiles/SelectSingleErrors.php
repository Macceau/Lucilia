<?php
 include('../lib/Classe.php');
 $link=DbConnect();
 $param=$_POST['param'];
 $param1=$_POST['params'];
 if($param=="9"){
            if($param1=="Errors"){
                $lide="";
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
                        'video'=>$row["video"],
                        'lojik'=>$lide
                    );
                }
                $jsonstring=json_encode($json);
                echo $jsonstring;   
            }else if($param1=="Items"){
                $lide="val";
                $sql="SELECT i.id,i.item_number,i.item_desc,i.price,i.part_number,i.part_description AS part_desc,
                d.device AS printer_model,i.photo_link,d.id as code FROM items i
                LEFT JOIN devices d ON d.id=i.printer_model ORDER BY id desc";
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
                            'price'=>Decimal($row["price"]),
                            'part'=>$row["part_number"],
                            'partdesc'=>$row["part_desc"],
                            'printer'=>$row["printer_model"],
                            'code'=>$row["code"],
                            'link'=>$row["photo_link"],
                            'lojik'=>$lide
                        );
                    }
                    $jsonstring=json_encode($json);
                    echo $jsonstring;
            }
     
   }else{
        if($param1=="Errors"){
            $lide="";
        $sql="SELECT e.id,e.problem,e.probable_cause,e.corrective_action,d.id as code,d.device AS printer_model,e.video FROM errores e
        LEFT JOIN devices d ON d.id=e.printer where e.printer='$param'  ORDER BY id desc";
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
                'video'=>$row["video"],
                'lojik'=>$lide
            );
            }
            $jsonstring=json_encode($json);
            echo $jsonstring;   

        }else if ($param1=="Items") {
            $lide="val";
                $sql="SELECT i.id,i.item_number,i.item_desc,i.price,i.part_number,i.part_description AS part_desc,
                d.device AS printer_model,i.photo_link,d.id as code FROM items i
                LEFT JOIN devices d ON d.id=i.printer_model where i.printer_model='$param' ORDER BY id desc";
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
                            'price'=>Decimal($row["price"]),
                            'part'=>$row["part_number"],
                            'partdesc'=>$row["part_desc"],
                            'printer'=>$row["printer_model"],
                            'code'=>$row["code"],
                            'link'=>$row["photo_link"],
                            'lojik'=>$lide
                        );
                    }
                    $jsonstring=json_encode($json);
                    echo $jsonstring;
        }
    
    }
?>