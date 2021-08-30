<?php
include('../lib/Classe.php');
$link=DbConnect();

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

?>