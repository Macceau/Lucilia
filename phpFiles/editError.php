<?php
include('../lib/Classe.php');
$link=DbConnect();
if(!empty(isset($_FILES['exten']['name']))){
  $uploadedFile = '';
         if(!empty($_FILES["exten"]["type"])){
                 $fileName = time().'_'.addslashes($_FILES['exten']['name']);
                 $valid_extensions = array("MP4","mp4","MOV","mov","WMV","wmv","FLV","flv","avi","AVI");
                 $temporary = explode(".", addslashes($_FILES["exten"]["name"]));
                 $file_extension = end($temporary);
                     if((($_FILES["exten"]["type"] == "video/MP4") || ($_FILES["exten"]["type"] == "video/mp4")|| 
                     ($_FILES["exten"]["type"] == "video/MOV") || ($_FILES["exten"]["type"] == "video/mov")|| 
                     ($_FILES["exten"]["type"] == "video/WMV") || ($_FILES["exten"]["type"] == "video/wmv")
                     || ($_FILES["exten"]["type"] == "video/FLV") || ($_FILES["exten"]["type"] == "video/flv")
                     || ($_FILES["exten"]["type"] == "video/avi") || ($_FILES["exten"]["type"] == "video/AVI")) && in_array($file_extension, $valid_extensions)){
                             $sourcePath =$_FILES['exten']['tmp_name'];
                             $targetPaths = "../videos/".$fileName;
                             $targetPath = "videos/".$fileName;
                         if(move_uploaded_file($sourcePath,$targetPaths)){
                             $uploadedFile = $fileName;
                         }
                     }

                     $id=$_POST['idproblem'];
                     $problem=addslashes($_POST['problem']);
                     $cause=addslashes($_POST['cause']);
                     $corrective=addslashes($_POST['corrective']);
                     $printer=addslashes($_POST['errorprinter']);
                     $partvideo=addslashes($targetPath);
                   $sql="update errores set problem='$problem',probable_cause='$cause',
                   corrective_action='$corrective',printer='$printer',video='$partvideo' where id=$id";
                   $res=SendQuery($sql,$link);
                   if(!$res){
                     echo"bad"; 
                   }else{
                     echo "good";
                   }          
         }else{
                $id=$_POST['idproblem'];
                $problem=addslashes($_POST['problem']);
                $cause=addslashes($_POST['cause']);
                $corrective=addslashes($_POST['corrective']);
                $printer=addslashes($_POST['errorprinter']);
              $sql="update errores set problem='$problem',probable_cause='$cause',
              corrective_action='$corrective',printer='$printer' where id=$id";
              $res=SendQuery($sql,$link);
              if(!$res){
                echo"bad"; 
              }else{
                echo "good";
              }            
         } 
}else{
     echo "bad";
}     
                

?>



                $id=$_POST['idproblem'];
                $problem=addslashes($_POST['problem']);
                $cause=addslashes($_POST['cause']);
                $corrective=addslashes($_POST['corrective']);
                $printer=addslashes($_POST['printer']);
              $sql="update errores set problem='$problem',probable_cause='$cause',
              corrective_action='$corrective',printer='$printer' where id=$id";
              $res=SendQuery($sql,$link);
              if(!$res){
                echo"bad"; 
              }else{
                echo "good";
              }