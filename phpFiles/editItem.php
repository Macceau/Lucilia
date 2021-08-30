<?php
include('../lib/Classe.php');
$link=DbConnect();
        if(!empty(isset($_FILES['partimage']['name']))){
            $uploadedFile = '';
                if(!empty($_FILES["partimage"]["type"])){
                $fileName = time().'_'.addslashes($_FILES['partimage']['name']);
                $valid_extensions = array("jpeg", "jpg", "png");
                $temporary = explode(".", addslashes($_FILES["partimage"]["name"]));
                $file_extension = end($temporary);
                if((($_FILES["partimage"]["type"] == "image/png") || 
                ($_FILES["partimage"]["type"] == "image/PNG")  || 
                ($_FILES["partimage"]["type"] == "image/jpg") || 
                ($_FILES["partimage"]["type"] == "image/jpeg")|| 
                ($_FILES["partimage"]["type"] == "image/JPEG"))
                    && in_array($file_extension, $valid_extensions)){
                        $sourcePath =$_FILES['partimage']['tmp_name'];
                        $targetPaths = "../picturepart/".$fileName;
                        $targetPath = "picturepart/".$fileName;

                    if(move_uploaded_file($sourcePath,$targetPaths)){
                            $uploadedFile = $fileName;
                        }
                    }
                }
                $id=$_POST['hiddenparam'];
                $itemnumber=addslashes($_POST['itemnumber']);
                $partnumber=addslashes($_POST['partnumber']);
                $partdescription=addslashes($_POST['partdescription']);
                $printer=addslashes($_POST['printer']);
                $itemdescription=addslashes($_POST['itemdescription']);
              $sql="update items set item_number='$itemnumber',item_desc='$itemdescription',
              part_number='$partnumber',part_description='$partdescription',
              printer_model='$printer' where id=$id";
              $res=SendQuery($sql,$link);
              if(!$res){
                echo"bad"; 
              }else{
                echo "good";
              }
        }else{
                $id=$_POST['hiddenparam'];
                $itemnumber=addslashes($_POST['itemnumber']);
                $partnumber=addslashes($_POST['partnumber']);
                $partdescription=addslashes($_POST['partdescription']);
                $printer=addslashes($_POST['printer']);
                $itemdescription=addslashes($_POST['itemdescription']);
              $sql="update items set item_number='$itemnumber',item_desc='$itemdescription',
              part_number='$partnumber',part_description='$partdescription',
              printer_model='$printer' where id=$id";
              $res=SendQuery($sql,$link);
              if(!$res){
                echo"bad"; 
              }else{
                echo "good";
              }
        }

?>