<?php
include('../lib/Classe.php');
 $link=DbConnect();

 $sql="SELECT i.id,i.item_number,i.item_desc,i.part_number,i.part_description,
 d.device AS printer_model,i.photo_link,inv.id AS cod,inv.quantity,inv.statut,
 inv.subinventary,inv.sigle,inv.locator FROM inventary inv LEFT JOIN items i ON inv.item_number=i.id 
 LEFT JOIN devices d ON d.id=i.printer_model";
 $res=SendQuery($sql,$link);
 header("Content-type: application/vnd.ms-excel; charset=iso-8859-1");
 header("Content-Disposition: attachement; filename=inventary".time().".xls");
 ?>

 <table>
     <caption>Inventary_<?php echo time();?></caption>
    <tr>
        <th>Item #</th>
        <th>Item Desc</th>
        <th>Sub Inventary</th>
        <th>UOM</th>
        <th>Locator</th>
        <th>Quantity</th>
        <th>Status</th>
        <th>Part Desc</th>
        <th>Part #</th>
        <th>Printer</th>
        
    </tr>
    <?php
        for($i=0; $row=BringRow($res); $i++){
        ?>
            <tr>
                <td><?php echo addslashes($row['item_number']);?></td>
                <td><?php echo addslashes($row['item_desc']);?></td>
                <td><?php echo addslashes($row['subinventary']);?></td>
                <td><?php echo addslashes($row['sigle']);?></td>
                <td><?php echo addslashes($row['locator']);?></td>
                <td><?php echo addslashes($row['quantity']);?></td>
                <td><?php echo addslashes($row['statut']);?></td>
                <td><?php echo addslashes($row['part_description']);?></td>
                <td><?php echo addslashes($row['part_number']);?></td>
                <td><?php echo addslashes($row['printer_model']);?></td>
            </tr>
    <?php
        }
    ?>
</table>

 