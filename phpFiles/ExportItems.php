<?php
include('../lib/Classe.php');
 $link=DbConnect();

 $DateAndTime = date('d-M-Y h:i:s A');
 $param=$_POST['param'];
  $lol="";
 if($param=="Please Select"){
    $lol="msg1";
 }else if($param=="Items"){
    $lol="msg2";
            /*$sql="SELECT i.id,i.item_number,i.item_desc,i.part_number,i.part_description,
        d.device AS printer_model,i.photo_link,inv.id AS cod,inv.quantity,inv.statut,
        inv.subinventary,inv.sigle,inv.locator FROM inventary inv LEFT JOIN items i ON inv.item_number=i.id 
        LEFT JOIN devices d ON d.id=i.printer_model";
        $res=SendQuery($sql,$link);
        header("Content-type: application/vnd.ms-excel; charset=iso-8859-1");
        header("Content-Disposition: attachement; filename=inventary".time().".xls");*/
 }else if($param=="Errors"){
    $lol="msg3";
            /*$sql="SELECT i.id,i.item_number,i.item_desc,i.part_number,i.part_description,
        d.device AS printer_model,i.photo_link,inv.id AS cod,inv.quantity,inv.statut,
        inv.subinventary,inv.sigle,inv.locator FROM inventary inv LEFT JOIN items i ON inv.item_number=i.id 
        LEFT JOIN devices d ON d.id=i.printer_model";
        $res=SendQuery($sql,$link);
        header("Content-type: application/vnd.ms-excel; charset=iso-8859-1");
        header("Content-Disposition: attachement; filename=inventary".time().".xls");*/
 }
 echo $lol;
 ?>

 
 