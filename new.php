<!DOCTYPE html>
<html>
 <head>
  <title>Product</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
 </head>
 <body>
  <br /><br />
  
  
  <div class="container">
   <br />
   <h2 align="center">Products belonging to same EBG number</h2>
   <br />
   <div class="table-responsive">
    <table class="table table-bordered" id="crud_table">
     <tr>
      <th width="30%">Item Name</th>
      <th width="10%">Item Quantity</th>
      <th width="45%">Description</th>
      <th width="10%">Price</th>
      <th width="5%"></th>
     </tr>
     <tr>
      <td contenteditable="true" class="item_name"></td>
      <td contenteditable="true" class="item_quantity"></td>
      <td contenteditable="true" class="item_desc"></td>
      <td contenteditable="true" class="item_price"></td>
      <td></td>
     </tr>
     
    </table>
    
    <div align="right">
     <button type="button" name="add" id="add" class="btn btn-success btn-xs">+</button>
    </div>
    <div align="center">
    <div contenteditable="true" class="item_ebg"></div>
     <button type="button" name="save" id="save" class="btn btn-info">Save</button>
     <button class="btn btn-warning"><a href="some.php">CHECK by EBG</a></button>
    </div>
    <br />
    <div id="inserted_item_data"></div>
   </div>
   <button type="submit"  onClick="refreshPage()">For New EBg </button>
  </div>
 </body>
</html>

<script>
$(document).ready(function(){
 var ebg=prompt("Please enter ebg","123");
 var count = 1;
 $('#add').click(function(){
  count = count + 1;
  var html_code = "<tr id='row"+count+"'>";


   html_code += "<td contenteditable='true' class='item_name'></td>";
   html_code += "<td contenteditable='true' class='item_quantity'></td>";
   html_code += "<td contenteditable='true' class='item_desc'></td>";
   html_code += "<td contenteditable='true' class='item_price' ></td>";
   html_code += "<td><button type='button' name='remove' data-row='row"+count+"' class='btn btn-danger btn-xs remove'>-</button></td>";   
   html_code += "</tr>";  
   $('#crud_table').append(html_code);
 });
 
 $(document).on('click', '.remove', function(){
  var delete_row = $(this).data("row");
  $('#' + delete_row).remove();
 });
 
 $('#save').click(function(){
  var item_name = [];
  var item_quantity = [];
  var item_desc = [];
  var item_price = [];
  var item_ebg=ebg;
  $('.item_name').each(function(){
   item_name.push($(this).text());
  });
  $('.item_quantity').each(function(){
   item_quantity.push($(this).text());
  });
  $('.item_desc').each(function(){
   item_desc.push($(this).text());
  });
  $('.item_price').each(function(){
   item_price.push($(this).text());
  });
   

  $.ajax({
   url:"insert.php",
   method:"POST",
   data:{item_name:item_name, item_quantity:item_quantity, item_desc:item_desc, item_price:item_price,item_ebg:item_ebg},
   success:function(data){
    alert(data);
    $("td[contentEditable='true']").text("");
    for(var i=2; i<= count; i++)
    {
     $('tr#'+i+'').remove();
    }
    
   }
  });
 });
 
 function fetch_item_data()
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   success:function(data)
   {
    $('#inserted_item_data').html(data);
   }
  })
 }
 fetch_item_data();
 
});
function refreshPage(){
    window.location.reload();
} 
</script>