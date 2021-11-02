<?php
include('../lib/Classe.php');
$link=DbConnect();
        if(!empty(isset($_POST['id']))){
                $item=$_POST['id'];
                $qty=0;
                $subinventary=0;
                $sigle=0;
                $locator=0;
                $status="Exists";
              $sql="insert into inventary(item_number,quantity,subinventary,sigle,locator,statut) 
              values('$item','$qty','$subinventary','$sigle','$locator','$status')";
              $res=SendQuery($sql,$link);
            
            echo "good";
            
        }else{
           echo"bad"; 
        }

?>