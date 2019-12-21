<?php   
 ?>
<html>
<head><title>Records</title>
<link rel="stylesheet" href="style.css">
<?php 
include 'conn.php';
error_reporting(0);
 

?>
</head>
<body>
<form method="POST">
<div class="insert col-lg-4">
        <div class="card">
        
             <div class="card-header">Check Products By EBG</div>
             <div class="card-body">
             <label>Product</label>
             <input type="text" placeholder="Enter Ebg number" name="e" id="e" class="form-control">
             <br>

             <input type="submit" value="Display" id="show" name="show" class="btn btn-primary col-lg-12">

</div>
</div>
</form>
</body>

<?php    
 
$e=$_POST['e'];   
echo"<table class=table>";
echo"<thead>";
     echo"<tr>";
         echo"<th> Sno</th>";
         echo"<th> Product</th>";
         echo"<th> Quantity</th>";
         echo"<th> Description</th>";
         echo"<th> Price</th>";
         echo"<th> Total</th>";
         echo"<th> Action</th>";

         
    echo" </tr>";

    $sno=1;


echo"</thead>";
echo"<tbody id=record>";
$sno=1;
$q=0;
$t=0;
$query="Select * from item where ebg=$e";
    $result= mysqli_query($conn,$query);
     
while($rec= mysqli_fetch_assoc($result)){
     
 ?>
<tr>
<td><?=$sno++?></td>


    <?php
       $q=$rec['item_quantity']*$rec['item_price'];
       
        
       ?>
    <td><?=$rec['item_name']?></td>
    <td><?=$rec['item_quantity']?> </td>
                           
    
    <td><?=$rec['item_description']?></td>
    <td><?=$rec['item_price']?></td>
    <td><?=$q?></td>
    <td><button><a href="update.php">Update</a></button> <button><a href="delete.php">Delete</a></button> </td>
   
   
    
<?php
$t=$t+$q;
}

?>
</tr>
</tbody>
</table>

<?php
$k=0.09*0.09*$t;
echo"<h1> Your total bill is $t.</h1>";
  echo "<h1>TOTAL BILL WITH GST IS RS $k</h1>"
?>
<br><br>
<form action="c/template.html">
<input type="submit" value="Bill" id="bill" name="bill" class="btn btn-primary col-lg-0">
</form>

</body>
</html>