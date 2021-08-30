<?php
include('../lib/Classe.php');
$link=DbConnect();
        if(!empty(isset($_POST['item']))){
                $item=$_POST['item'];
                $qty=$_POST['quantity'];
                $status="Exists";
              $sql="insert into inventary(item_number,quantity,statut) values('$item','$qty','$status')";
              $res=SendQuery($sql,$link);
            
            echo "good";
            
        }else{
           echo"bad"; 
        }

?>