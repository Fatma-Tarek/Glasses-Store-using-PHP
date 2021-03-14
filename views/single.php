<?php
$index = (isset($_GET["index"]))? (int)$_GET["index"] : 0;
$current_item = $db->get_record($index)[0];

?>
<html>
    

    <table border="1">
	<caption><?php echo "Type:". $current_item["product_name"]; ?></caption>
	<thead>
		<tr>
			<th colspan="3"><?php echo "Type:". $current_item["product_name"]; ?></th>
			<th><?php echo "price:". $current_item["list_price"]; ?>
				<br>
			</th>
		</tr>
		<tr>
			<td colspan="3"> <strong>Deatils:</strong>
				<br><?php echo  "code:" .$current_item["product_code"]; ?>
				<br><?php echo  "item id:" .$current_item["id"]; ?>
				<br><?php echo  "rating:" .$current_item["rating"]; ?></td>
			<td colspan="2"> <strong></strong>
				<img src="<?php echo "images/". $current_item["photo"]; ?>" ></td>
		</tr>
	</thead>
	
</table>
    
    
    

        </html>