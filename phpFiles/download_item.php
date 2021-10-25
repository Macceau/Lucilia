<?php
    include('../lib/Classe.php');
    $link=DbConnect();
    $DateAndTime = date('d-M-Y h:i:s A');

    $sql="SELECT i.item_number,i.item_desc,i.price,i.part_number,i.part_description,d.device from items i 
    left join devices d on d.id=i.printer_model";

    $res=SendQuery($sql,$link);
    header("Content-type: application/vnd.ms-excel; charset=iso-8859-1");
    header("Content-Disposition: attachement; filename=item".$DateAndTime.".xls");
 ?>

 <table>
     <caption>Items of <?php echo $DateAndTime;?></caption>
    <tr>
        <th>Item #</th>
        <th>Item Description</th>
        <th>Price</th>
        <th>Part #</th>
        <th>Part Description</th>
        <th>Machines</th>
        
    </tr>
    <?php
        for($i=0; $row=BringRow($res); $i++){
        ?>
            <tr>
                <td><?php echo addslashes($row['item_number']);?></td>
                <td><?php echo addslashes($row['item_desc']);?></td>
                <td><?php echo addslashes($row['price']);?></td>
                <td><?php echo addslashes($row['part_number']);?></td>
                <td><?php echo addslashes($row['part_description']);?></td>
                <td><?php echo addslashes($row['device']);?></td>
            </tr>
    <?php
        }
    ?>
</table>
