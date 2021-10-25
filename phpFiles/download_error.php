<?php
    include('../lib/Classe.php');
    $link=DbConnect();
    $DateAndTime = date('d-M-Y h:i:s A');

    $sql="SELECT e.problem,d.device,e.probable_cause,e.corrective_action from errores e 
    left join devices d on d.id=e.printer";

    $res=SendQuery($sql,$link);
    header("Content-type: application/vnd.ms-excel; charset=iso-8859-1");
    header("Content-Disposition: attachement; filename=Error".$DateAndTime.".xls");
 ?>

 <table>
     <caption>Errors of <?php echo $DateAndTime;?></caption>
    <tr>
        <th>Problem #</th>
        <th>Machines</th>
        <th>Probable Cause</th>
        <th>Corrective Action</th>
                
    </tr>
    <?php
        for($i=0; $row=BringRow($res); $i++){
        ?>
            <tr>
                <td><?php echo addslashes($row['problem']);?></td>
                <td><?php echo addslashes($row['device']);?></td>
                <td><?php echo addslashes($row['probable_cause']);?></td>
                <td><?php echo addslashes($row['corrective_action']);?></td>
            </tr>
    <?php
        }
    ?>
</table>
