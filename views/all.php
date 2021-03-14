<?php

$current_index = isset($_GET["next"]) && is_numeric($_GET["next"])? (int)$_GET["next"] : 0;
$next_index = $current_index + __RECORDS_PER_PAGE__;
$previous_index =  ($current_index - __RECORDS_PER_PAGE__ >0) ? $current_index - __RECORDS_PER_PAGE__ : 0 ;
$items = $db->get_data(array(),$current_index);
?>

<table>
    <tr>
        <th>Item ID</th>
        <th>Name</th>
        <th>Details</th>
    </tr>

    <?php

    $index=0;
    foreach ($items as $item){
        echo"<tr><td>".$item["id"]."</td>";
        echo "<td>".$item["product_name"]."</td>";
        echo "<td><a href='".$_SERVER["PHP_SELF"]."?index=".$index."'> more </a></td></tr>";
        $index++;
    }

    ?>
</table>
<a href="<?php echo $_SERVER["PHP_SELF"]."?next=".$previous_index; ?>" > << Previous </a> ||
<a href="<?php echo $_SERVER["PHP_SELF"]."?next=".$next_index; ?>" >next >> </a>

