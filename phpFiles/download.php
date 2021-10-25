<?php
include('../lib/Classe.php');
 $link=DbConnect();
 $com=$_POST["param"];
        if($com=="Items"){
            echo "good";
        }else if($com=="Errors"){
            echo "well";
        }else{
            echo "bad";
        }
 ?>