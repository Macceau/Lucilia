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
                            $targetPaths = "../picturepart/".$fileName;
                            $targetPath = "picturepart/".$fileName;
                        if(move_uploaded_file($sourcePath,$targetPaths)){
                            $uploadedFile = $fileName;
                        }
                    }
                            $itemnumber=addslashes($_POST['itemnumber']);
                            $partnumber=addslashes($_POST['partnumber']);
                            $partdescription=addslashes($_POST['partdescription']);
                            $price=Decimal($_POST['price']);
                            $printer=addslashes($_POST['printer']);
                            $itemdescription=addslashes($_POST['itemdescription']);
                            $partimage=addslashes($targetPath);
                        $sql="insert into items(item_number,item_desc,price,part_number,part_description,printer_model,photo_link)
                        values('$itemnumber','$itemdescription','$price','$partnumber','$partdescription','$printer','$partimage')";
                        $res=SendQuery($sql,$link);
                        echo "good";
            }else{
                        $itemnumber=addslashes($_POST['itemnumber']);
                        $partnumber=addslashes($_POST['partnumber']);
                        $partdescription=addslashes($_POST['partdescription']);
                        $price=Decimal($_POST['price']);
                        $printer=addslashes($_POST['printer']);
                        $itemdescription=addslashes($_POST['itemdescription']);
                        $maxcode=BringMaxCode("items","id",$link);
                        $partimage=SearchCode("photo_link","id",$maxcode,"items",$link);
                    $sql="insert into items(item_number,item_desc,price,part_number,part_description,printer_model,photo_link)
                    values('$itemnumber','$itemdescription','$price','$partnumber','$partdescription','$printer','$partimage')";
                    $res=SendQuery($sql,$link);
                    //echo $sql;
                    echo "good";

                }
        }else{
        echo"bad"; 
        }

?>