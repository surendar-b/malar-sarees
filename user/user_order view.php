<?php
	include_once("includes/connection.php");
  include_once("includes/header.php");
  $order='active';
?>
<?php include("includes/navbar.php"); ?>
<?php 
@session_start();
$sql="select o.order_id,u.username,p.product_name,o.rate,o.no_of_sarees,o.color,o.address,o.contact,o.status,o.date from `order` as o inner join `users` as u on u.user_id=o.user_id inner join `product` as p on p.product_id=o.product_id where o.user_id='$_SESSION[user_id]'";
$query=mysql_query($sql)or die(mysql_error());
?>
 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th style="background: #0000ff;color: #fff;">order id</th>
                      <th style="background: #0000ff;color: #fff;">username</th>
					            <th style="background: #0000ff;color: #fff;">Product name</th>
                      <th style="background: #0000ff;color: #fff;">Rate</th>
                      <th style="background: #0000ff;color: #fff;">No of Sarees</th>                      
                      <th style="background: #0000ff;color: #fff;">color</th>
                      <th style="background: #0000ff;color: #fff;">address</th>  
                      <th style="background: #0000ff;color: #fff;">contact</th>
                      <th style="background: #0000ff;color: #fff;">status</th>                                            
                    </tr>
                  </thead>
<?php
while($r=mysql_fetch_array($query))
{		
    $id = $r['order_id'];
    $name = $r['username'];
    $product_name = $r['product_name'];
    $rate= $r['rate'];
    $no = $r['no_of_sarees'];
    $contact= $r['contact'];
    $adrs=$r['address'];
    $color=$r['color'];
    $status = $r['status'];	
    $date=$r['date']	;						
                        
    echo "<tr>
            <td>$id</td>
            
            <td>$name</td>
            <td>$product_name</td>
            <td>$rate</td>
            <td>$no</td>
            <td>$color</td>	
            <td>$adrs</td>
            <td>$contact</td>
            <td>$status</td>								
            <td>";
            if ($date>=date('Y-m-d h:i:s')){
                echo "<a href='user_order_delete.php?order_id=$id&Mode=Delete'>
                <button class='btn btn-danger'>Delete</button></a>								 
            </td>									
        </tr>";
            }
            else{
             " </td>									
              </tr>";
            }
}
?>