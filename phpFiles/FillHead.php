<?php
 include('../lib/Classe.php');
 $link=DbConnect();
 $param=$_GET['man'];
 $sql="select * from users where username=ltrim(rtrim('$param'))";
     $res=SendQuery($sql,$link);
         if(!$res){
         Die('Erreur de la commande'.mysqli_error($link));
        }
        $json=array();
        while($row=BringRow($res)){
            $foto="";
            if($row['image']==""){
            $foto="assets/img/profile.jpg";
            }else{
            $foto=$row['image'];
            }

            if($row["job"]==""){
                $jobs="";
            }else{
                $jobs=$row["job"];
            }

            if($row["about"]==""){
                $abouts="";
            }else{
                $abouts=$row["about"];
            }

            if($row["company"]==""){
                $companys="";
            }else{
                $companys=$row["company"];
            }

            if($row["country"]==""){
                $countrys="";
            }else{
                $countrys=$row["country"];
            }

            if($row["address"]==""){
                $addresss="";
            }else{
                $addresss=$row["address"];
            }
            if($row["phone"]==""){
                $phones="";
            }else{
                $phones=$row["phone"];
            }
         $json[]=array(
             'id'=>$row["id"],
             'names'=>$row["fullname"],
             'job'=>$jobs,
             'image'=>$foto,
             'about'=>$abouts,
             'company'=>$companys,
             'country'=>$countrys,
             'address'=>$addresss,
             'phone'=>$phones,
             'email'=>$row["email"],
             'password'=>$row["password"]

         );
        }
        $jsonstring=json_encode($json);
        echo $jsonstring;    
 
?>