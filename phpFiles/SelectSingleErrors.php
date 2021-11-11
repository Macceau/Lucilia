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
                    $sql1="select count(id) as qty from items";
                    $res1=SendQuery($sql1,$link); 
                    $row1=BringRow($res1); 
                    
                    $val=$row1["qty"]." Of ".$row1["qty"];

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
                            'lojik'=>$lide,
                            'qtyitem'=>$val
                        );
                    }
                    $jsonstring=json_encode($json);
                    echo $jsonstring;
            }else if($param1=="Inventary"){
                $lide="val1";
                $sql="SELECT i.id,i.item_number,i.item_desc,i.part_number,i.part_description,
			d.device AS printer_model,i.photo_link,inv.id AS cod,inv.quantity,inv.statut,
			su.sub as subinventary,si.sigle,l.locator FROM inventary inv LEFT JOIN items i ON inv.item_number=i.id 
			LEFT JOIN devices d ON d.id=i.printer_model left join subinventary su on su.id=inv.subinventary
			left join sigles si on si.id=inv.sigle left join locators l on l.id=inv.locator order by cod desc";
            
				$res=SendQuery($sql,$link);
					if(!$res){
					Die('Erreur de la commande'.mysqli_error($link));
					}
                    $sql1="select count(id) as qty from inventary";
                    $res1=SendQuery($sql1,$link);
                    $row1=BringRow($res1);


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
						'sub'=>$row["subinventary"],
						'sigle'=>$row["sigle"],
						'locator'=>$row["locator"],
						'qty'=>$row["quantity"],
						'status'=>$row["statut"],
                        'count'=>$row1["qty"]." Of ".$row1["qty"],
					);
					}
					$jsonstring=json_encode($json);
					echo $jsonstring;  
            }
     
   }else{

        if($param1=="Please Select"){
            $lide="msgerr";
            $json=array();
            $json[]=array(
                'lojik'=>$lide
            );
            $jsonstring=json_encode($json);
            echo $jsonstring;   
        }else if($param1=="Errors"){
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
                    $sql1="select count(id) as qty from items";
                    $sql2="select count(id) as qty from items where printer_model='$param'";
                    $res1=SendQuery($sql1,$link); $res2=SendQuery($sql2,$link);
                    $row1=BringRow($res1); $row2=BringRow($res2);
                    
                    $val=$row2["qty"]." Of ".$row1["qty"];

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
                            'lojik'=>$lide,
                            'qtyitem'=>$val
                        );
                    }
                    $jsonstring=json_encode($json);
                    echo $jsonstring;
        }else if ($param1=="Inventary"){
            $lide="val1";
            $sql="SELECT i.id,i.item_number,i.item_desc,i.part_number,i.part_description,
        d.device AS printer_model,i.photo_link,inv.id AS cod,inv.quantity,inv.statut,
			su.sub as subinventary,si.sigle,l.locator FROM inventary inv LEFT JOIN items i ON inv.item_number=i.id 
			LEFT JOIN devices d ON d.id=i.printer_model left join subinventary su on su.id=inv.subinventary
			left join sigles si on si.id=inv.sigle left join locators l on l.id=inv.locator where i.printer_model='$param' order by cod desc";
            $res=SendQuery($sql,$link);
                if(!$res){
                Die('Erreur de la commande'.mysqli_error($link));
                }
                $sql1="select count(id) as qty from inventary";
                $sql2="select count(inv.id) as qty FROM inventary inv LEFT JOIN items i ON inv.item_number=i.id 
                LEFT JOIN devices d ON d.id=i.printer_model left join subinventary su on su.id=inv.subinventary
                left join sigles si on si.id=inv.sigle left join locators l on l.id=inv.locator
                where i.printer_model='$param'";
                $res1=SendQuery($sql1,$link); $res2=SendQuery($sql2,$link);
                $row1=BringRow($res1);$row2=BringRow($res2);

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
                    'sub'=>$row["subinventary"],
                    'sigle'=>$row["sigle"],
                    'locator'=>$row["locator"],
                    'qty'=>$row["quantity"],
                    'status'=>$row["statut"],
                    'count'=>$row2["qty"]." Of ".$row1["qty"],
                );
                }
                $jsonstring=json_encode($json);
                echo $jsonstring;  
        }
    
    }
?>