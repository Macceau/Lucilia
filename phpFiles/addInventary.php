<?php
include('../lib/Classe.php');
$link=DbConnect();
        if(!empty(isset($_POST['item']))){
                $item=$_POST['item'];
                $qty=$_POST['quantity'];
                $subinventary=$_POST['subinventary'];
                $sigle=$_POST['sigle'];
                $locator=$_POST['locator'];
                $status="Exists";
              $sql="insert into inventary(item_number,quantity,subinventary,sigle,locator,statut) 
              values('$item','$qty','$subinventary','$sigle','$locator','$status')";
              $res=SendQuery($sql,$link);
            
            echo "good";
            
        }else{
           echo"bad"; 
        }

?>