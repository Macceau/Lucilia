<?php
include('../lib/Classe.php');
$link=DbConnect();
        if(!empty(isset($_POST['problem']))){
                $problem=addslashes($_POST['problem']);
                $cause=addslashes($_POST['cause']);
                $corrective=addslashes($_POST['corrective']);
                $printer=addslashes($_POST['printer']);

              $sql="insert into errores(problem,printer,probable_cause,corrective_action)
              values('$problem','$printer','$cause','$corrective')";
              $res=SendQuery($sql,$link);

            echo "good";
        }else{
           echo"bad"; 
        }

?>