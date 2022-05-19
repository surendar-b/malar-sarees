<?php
$view="active";
	include_once("includes/connection.php");
	include_once("includes/header.php");
?>
<?php include("includes/admin_navbar.php"); ?>

<?php 
$sql="select * from product order by product_id";
$query=mysql_query($sql)
?>
 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th style="background: #0000ff;color: #fff;">Product id</th>
                      <th style="background: #0000ff;color: #fff;">Product Code</th>
					  <th style="background: #0000ff;color: #fff;">Product name</th>
                      <th style="background: #0000ff;color: #fff;">product type</th>
                      <th style="background: #0000ff;color: #fff;">price</th>                      
                      <th style="background: #0000ff;color: #fff;">description</th>
                      <th style="background: #0000ff;color: #fff;">image</th>                      
                    </tr>
                  </thead>
<?php
while($r=mysql_fetch_array($query))
{		
    $id = $r['product_id'];
    $name = $r['product_name'];
    $code = $r['product_code'];
    $price = $r['price'];
    $type = $r['material'];
    $img_path = $r['img_path'];
    $desc = $r['description'];								
                        
    echo "<tr>
            <td>$id</td>
            
            <td>$code</td>
            <td>$name</td>
            <td>$type</td>
            <td>$price</td>
            <td>$desc</td>
            <td><img src='$img_path' style='width:200px; height:100px;'></td>									
            <td><a href='add_new_edit.php?prod_id=$id'>
            <button class='btn btn-primary'>Edit</button></a> &nbsp;&nbsp;&nbsp;
            
            <a href='add_new_edit.php?uprod_id=$id&Mode=Delete'>
            <button class='btn btn-danger'>Delete</button></a>								
            
            </td>									
        </tr>";
}
?>