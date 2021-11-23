<?php
 include('../lib/Classe.php');
 $link=DbConnect();
 if(!empty(isset($_FILES['partimage']['name']))){
    $uploadedFile = '';
    if(!empty($_FILES["partimage"]["type"])){
        $fileName = time().'_'.addslashes($_FILES['partimage']['name']);
        $valid_extensions = array("jpeg", "jpg", "png","PNG","JPEG","JPG");
        $temporary = explode(".", addslashes($_FILES["partimage"]["name"]));
        $file_extension = end($temporary);
            if((($_FILES["partimage"]["type"] == "image/png") || ($_FILES["partimage"]["type"] == "image/PNG")|| 
            ($_FILES["partimage"]["type"] == "image/jpg") || ($_FILES["partimage"]["type"] == "image/jpeg")|| 
            ($_FILES["partimage"]["type"] == "image/JPEG")) && in_array($file_extension, $valid_extensions)){
                    $sourcePath =$_FILES['partimage']['tmp_name'];
                    $targetPaths = "../picturepart/machines/".$fileName;
                    $targetPath = "picturepart/machines/".$fileName;
                if(move_uploaded_file($sourcePath,$targetPaths)){
                    $uploadedFile = $fileName;
                }
            }
            
            $machine=$_POST['machinename'];
           $sql="insert into devices(device,photo) values('$machine','$targetPath')";
           $res=SendQuery($sql,$link);
            if(!$res){
               Die('Erreur de la commande '.mysqli_error($link));
            }   
    }else{
        $machine=$_POST['machinename'];
        $sql="insert into devices(device) values('$machine')";
        $res=SendQuery($sql,$link);
         if(!$res){
            Die('Erreur de la commande '.mysqli_error($link));
         }  

        }
}
 ?>