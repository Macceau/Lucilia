<?php
 include('../lib/Classe.php');
 $link=DbConnect();
 $param=$_POST['id'];
if($param==9){
    $sql="select p.id,p.description,d.device,d.photo as image from parts p left join devices d on d.id=p.id_device order by id asc";
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
            'image'=>$row["image"],

        );
       }
}else{
    $sql="select p.id,p.description,d.device,d.photo as image from parts p left join devices d on d.id=p.id_device where p.id_device=$param order by id asc";
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
             'image'=>$row["image"],

         );
        }
}
 
        $jsonstring=json_encode($json);
        echo $jsonstring;    
 
 ?>