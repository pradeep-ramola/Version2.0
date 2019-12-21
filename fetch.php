<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "testing");
$output = '';
$query = "SELECT * FROM item ORDER BY item_id DESC";
$result = mysqli_query($connect, $query);
$output = '
<br />
<h3 align="center">Products </h3>
<table class="table table-bordered table-striped">
 <tr>
  <th width="30%">Item Name</th>
  <th width="10%">Item Quantity</th>
  <th width="40%">Description</th>
  <th width="10%">Price</th>
  <th width="10%">ebg</th>

 </tr>
';
while($row = mysqli_fetch_array($result))
{
 $output .= '
 <tr>
  <td>'.$row["item_name"].'</td>
  <td>'.$row["item_quantity"].'</td>
  <td>'.$row["item_description"].'</td>
  <td>'.$row["item_price"].'</td>
  <td>'.$row["ebg"].'</td>
 </tr>
 ';
}
$output .= '</table>';
echo $output;
header("some.php");
?>
