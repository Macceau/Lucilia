<?php
include('../lib/Classe.php');
$link=DbConnect();
        if(!empty(isset($_FILES['image']['name']))){
            $uploadedFile = '';
            if(!empty($_FILES["image"]["type"])){
                $fileName = time().'_'.addslashes($_FILES['image']['name']);
                $valid_extensions = array("jpeg", "jpg", "png","PNG","JPEG","JPG");
                $temporary = explode(".", addslashes($_FILES["image"]["name"]));
                $file_extension = end($temporary);
                    if((($_FILES["image"]["type"] == "image/png") || ($_FILES["image"]["type"] == "image/PNG")|| 
                    ($_FILES["image"]["type"] == "image/jpg") || ($_FILES["image"]["type"] == "image/jpeg")|| 
                    ($_FILES["image"]["type"] == "image/JPEG")) && in_array($file_extension, $valid_extensions)){
                            $sourcePath =$_FILES['image']['tmp_name'];
                            $targetPaths = "../assets/img/".$fileName;
                            $targetPath = "assets/img/".$fileName;
                        if(move_uploaded_file($sourcePath,$targetPaths)){
                            $uploadedFile = $fileName;
                        }
                    }
                            $fullname=addslashes($_POST['fullname']);
                            $about=addslashes($_POST['about']);
                            $company=addslashes($_POST['company']);
                            $job=addslashes($_POST['job']);
                            $country=addslashes($_POST['country']);
                            $address=addslashes($_POST['address']);
                            $phone=addslashes($_POST['phone']);
                            $email=addslashes($_POST['email']);
                            $image=addslashes($targetPath);
                            $param=$_GET['man'];
                        $sql="update users set fullname='$fullname',about='$about',company='$company',job='$job',country='$country',address='$address',phone='$phone',email='$email',image='$image' where id=$param";
                        $res=SendQuery($sql,$link);
                        echo "good";
            }else{
                $fullname=addslashes($_POST['fullname']);
                $about=addslashes($_POST['about']);
                $company=addslashes($_POST['company']);
                $job=addslashes($_POST['job']);
                $country=addslashes($_POST['country']);
                $address=addslashes($_POST['address']);
                $phone=addslashes($_POST['phone']);
                $email=addslashes($_POST['email']);
                $param=$_GET['man'];
            $sql="update users set fullname='$fullname',about='$about',company='$company',job='$job',country='$country',address='$address',phone='$phone',email='$email' where id=$param";
            $res=SendQuery($sql,$link);
                    echo $sql;

                }
        }else{ 
            $fullname=addslashes($_POST['fullname']);
            $about=addslashes($_POST['about']);
            $company=addslashes($_POST['company']);
            $job=addslashes($_POST['job']);
            $country=addslashes($_POST['country']);
            $address=addslashes($_POST['address']);
            $phone=addslashes($_POST['phone']);
            $email=addslashes($_POST['email']);
            $param=$_GET['man'];
            $sql="update users set fullname='$fullname',about='$about',company='$company',job='$job',country='$country',address='$address',phone='$phone',email='$email' where id=$param";
            $res=SendQuery($sql,$link);
                    echo $sql; 
        }

?>