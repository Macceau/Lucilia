<?php
 include('../lib/Classe.php');
 $link=DbConnect();
    $printer=$_POST['printer'];
    $property=$_POST['property'];
    $param=$_POST['param'];
    if($property=="Please Select"){
        echo "sendavis";   
    }else if($property=="Items"){
        $condition="piece";
        if($printer=="9"){
            $sql="SELECT i.id,i.item_number,i.item_desc,i.price,i.part_number,i.part_description AS part_desc,
            d.device AS printer_model,i.photo_link FROM items i LEFT JOIN devices d ON d.id=i.printer_model 
            where i.item_number like '%$param%' or i.item_desc like '%$param%' 
			or i.part_description like '%$param%' ORDER BY id desc";
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
					'link'=>$row["photo_link"],
					'condition'=>$condition
				);
			}
				$jsonstring=json_encode($json);
				echo $jsonstring;    
   
		}else{
				$condition="piece";
				$sql="SELECT i.id,i.item_number,i.item_desc,i.price,i.part_number,i.part_description AS part_desc,
				d.device AS printer_model,i.photo_link,d.id as iddevice FROM items i LEFT JOIN devices d ON d.id=i.printer_model 
				where i.printer_model=$printer and (i.item_number like '%$param%' or i.item_desc like '%$param%' 
				or i.part_description like '%$param%') ORDER BY id desc";
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
					'link'=>$row["photo_link"],
					'condition'=>$condition
				);
			}
				$jsonstring=json_encode($json);
				echo $jsonstring;    
		}
    }else if($property=="Errors"){
        $condition="error";
        if($printer=="9"){
            $sql="SELECT e.id,e.problem,e.probable_cause,e.corrective_action,d.device AS printer_model FROM errores e
            LEFT JOIN devices d ON d.id=e.printer where problem like '%$param%' ORDER BY id desc";
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
                    'condition'=>$condition
                );
			}
				$jsonstring=json_encode($json);
				echo $jsonstring;    
        }else{
			$condition="error";
			$sql="SELECT e.id,e.problem,e.probable_cause,e.corrective_action,d.device AS printer_model,d.id as code FROM errores e
			LEFT JOIN devices d ON d.id=e.printer where d.id=$printer and problem like '%$param%' ORDER BY id desc";
			$res=SendQuery($sql,$link);
			if(!$res){
				Die('Erreur de la commande '.mysqli_error($link));
			}
				$json=array();
			while($row=BringRow($res)){
				$json[]=array(
					'id'=>$row["id"],
					'problem'=>$row["problem"],
					'cause'=>$row["probable_cause"],
					'corrective'=>$row["corrective_action"],
					'printer'=>$row["printer_model"],
					'condition'=>$condition
				);
			}
				$jsonstring=json_encode($json);
				echo $jsonstring; 
		}
    }else if($property=="Inventary"){
		$condition="inventary";
		if($printer=="9"){
			$sql="SELECT i.id,i.item_number,i.item_desc,i.part_number,i.part_description,
			d.device AS printer_model,i.photo_link,inv.id AS cod,inv.quantity,inv.statut,
			su.sub as subinventary,si.sigle,l.locator FROM inventary inv LEFT JOIN items i ON inv.item_number=i.id 
			LEFT JOIN devices d ON d.id=i.printer_model left join subinventary su on su.id=inv.subinventary
			left join sigles si on si.id=inv.sigle left join locators l on l.id=inv.locator
			where d.device like '%$param%' or i.item_number like '%$param%'
			or i.item_desc like '%$param%' or inv.statut like '%$param%'
			or inv.subinventary like '%$param%' or inv.sigle like '%$param%'
			or inv.locator like '%$param%' order by cod desc";
				$res=SendQuery($sql,$link);
					if(!$res){
					Die('Erreur de la commande'.mysqli_error($link));
					}
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
						'condition'=>$condition

					);
					}
					$jsonstring=json_encode($json);
					echo $jsonstring;  
		}else{
			$condition="inventary";
			$sql="SELECT i.id,i.item_number,i.item_desc,i.part_number,i.part_description,
			d.device AS printer_model,i.photo_link,inv.id AS cod,inv.quantity,inv.statut,
			su.sub as subinventary,si.sigle,l.locator FROM inventary inv LEFT JOIN items i ON inv.item_number=i.id 
			LEFT JOIN devices d ON d.id=i.printer_model left join subinventary su on su.id=inv.subinventary
			left join sigles si on si.id=inv.sigle left join locators l on l.id=inv.locator
			where i.printer_model='$printer' and (i.item_number like '%$param%'
			or i.item_desc like '%$param%' or inv.statut like '%$param%'
			or inv.subinventary like '%$param%' or inv.sigle like '%$param%'
			or inv.locator like '%$param%') order by cod desc";
				$res=SendQuery($sql,$link);
					if(!$res){
					Die('Erreur de la commande'.mysqli_error($link));
					}
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
						'condition'=>$condition

					);
					}
					$jsonstring=json_encode($json);
					echo $jsonstring;  
		}
	}
   
?>