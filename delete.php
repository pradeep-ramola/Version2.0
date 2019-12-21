<?php      
include 'conn.php';
?>
<html>
<head>
<title>addproducts</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
 
<center><h1>Enter your Products to delete</h1></center>

<center><form method="GET" action="prodel.php">


<br>
<br>

<table  class="table" >

<tr>
<th>Prouct </th>
 
 
</tr>
<tr>
<th><input type="text" placeholder="Product" name="product" required></th>
 
 
<th> <input type ="reset" name = "reset" class="btn btn-warning"></th>
</tr>


</table>
<br>
<br>
<br>
<label for="ebg">
<b>EBG</b></label>
<input type="text" placeholder="Enter EBG number" name="e" required>
<input type="submit" value="Submit" id="Insert" name="insert" class="btn btn-primary col-lg-0">



</form>


 

</body>

</html>