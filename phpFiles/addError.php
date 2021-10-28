<?php
include('../lib/Classe.php');
$link=DbConnect();
        if(empty(isset($_FILES['videoexten']['name']))){ 
               $uploadedFile = '';
               $targetPath='';
            if(empty($_FILES["videoexten"]["type"])){
               echo"test1 "; 
                     $fileName = time().'_'.addslashes($_FILES['videoexten']['name']);
                     $valid_extensions = array("MP4","mp4","MOV","mov","WMV","wmv","FLV","flv","avi","AVI");
                     $temporary = explode(".", addslashes($_FILES["videoexten"]["name"]));
                     $file_extension = end($temporary);
                        if((($_FILES["videoexten"]["type"] == "video/MP4") || ($_FILES["videoexten"]["type"] == "video/mp4")|| 
                        ($_FILES["videoexten"]["type"] == "video/MOV") || ($_FILES["videoexten"]["type"] == "video/mov")|| 
                        ($_FILES["videoexten"]["type"] == "video/WMV") || ($_FILES["videoexten"]["type"] == "video/wmv")
                        || ($_FILES["videoexten"]["type"] == "video/FLV") || ($_FILES["videoexten"]["type"] == "video/flv")
                        || ($_FILES["videoexten"]["type"] == "video/avi") || ($_FILES["videoexten"]["type"] == "video/AVI")) && in_array($file_extension, $valid_extensions)){
                           echo"test2";       
                           $sourcePath =$_FILES['videoexten']['tmp_name'];
                                 $targetPaths = "../videos/".$fileName;
                                 $targetPath = "videos/".$fileName;
                           if(move_uploaded_file($sourcePath,$targetPaths)){
                                 $uploadedFile = $fileName;
                           }
                        }

                        $problem=addslashes($_POST['problem']);
                        $cause=addslashes($_POST['cause']);
                        $corrective=addslashes($_POST['corrective']);
                        $printer=addslashes($_POST['errorprinter']);
                        $partvideo=addslashes($targetPath);
                     $sql="insert into errores(problem,printer,probable_cause,corrective_action,video)
                     values('$problem','$printer','$cause','$corrective','$partvideo')";
                     $res=SendQuery($sql,$link);
                     echo "good";            
            }else{
                     $problem=addslashes($_POST['problem']);
                        $cause=addslashes($_POST['cause']);
                        $corrective=addslashes($_POST['corrective']);
                        $printer=addslashes($_POST['errorprinter']);
                        $maxcode=BringMaxCode("errores","id",$link);
                        $partvideo=SearchCode("video","id",$maxcode,"errores",$link);
                     $sql="insert into errores(problem,printer,probable_cause,corrective_action,video)
                     values('$problem','$printer','$cause','$corrective','$partvideo')";
                     $res=SendQuery($sql,$link);
                     echo "good";       
            } 
               
        }else{
           echo"bad"; 
        }

?>