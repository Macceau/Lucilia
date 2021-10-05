<?php
include('../lib/Classe.php');
$link=DbConnect();
        if(!empty(isset($_POST['item']))){
                $id=$_POST['id'];
                $item=$_POST['item'];
                $qty=$_POST['quantity'];
                $subinventary=$_POST['subinventary'];
                $sigle=$_POST['sigle'];
                $locator=$_POST['locator'];
                $status="Exists";
              $sql="update  inventary set item_number='$item',quantity='$qty',subinventary='$subinventary',
              sigle='$sigle',locator='$locator' where id=$id";
              $res=SendQuery($sql,$link);
            
            echo "good";
            
        }else{
           echo"bad"; 
        }

?>