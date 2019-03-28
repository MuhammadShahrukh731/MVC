<!DOCTYPE html>
<html>
<head>
        <title></title>
</head>
<body>
<table cellpadding="6" width="100%" border="1">
        
<tr>
        <th>Id</th>
        <th>Name</th>
        <th>Qty</th>
        <th>snpsb</th>

</tr>
<?php 
$key = 0;
foreach ($products->result() as $product) {
        echo "<tr>";        
       echo "<td>".$product->id."</td>";
       echo "<td>".$product->pname."</td>";
       echo "<td>".$product->qty."</td>";
       echo "<td><a href='?id=".$key."'>Add to Cart</a></td>";
       // echo "<td>".$product['name']."</td>";
       // echo "<td>".$product['qty']."</td>";
       // echo "<td><a href='?id=".$key."'>Add to Cart</a></td>";
       $key++;
       echo "</tr>";
       
}

?>
</table>

<table cellpadding="6" width="100%" border="1">
        
<tr>
        <th>QTY</th>
        <th>Name</th>
        <th>Price</th>
        <th>Sub Total</th>

</tr>
<?php 
$i=1;
foreach ($this->cart->contents() as $items) {
        echo "<tr>";        
       echo "<td>".form_hidden( $i.'[rowid]',$items['rowid'])."</td>";
       
       echo "</tr>";
       
}


?>
</table>

</body>
</html>