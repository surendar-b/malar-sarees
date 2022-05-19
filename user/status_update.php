<!doctype html>
<html>
<head>
</head>
<style>
tr {
    font-size: 14px;
}
.bg-dark {
    background-color: #306433!important;
}
.card-header {
    background: #e48d8d;
	font-weight: bold;
	font-size:20px;
	text-align:center;
}
.card-body {
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    padding: 1.25rem;
}
.card {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0,0,0,.125);
    border-radius: .25rem;
}
.abc{
	padding-left:300px;
	padding-right:300px;
}
</style>
<body>
<?php
	include_once("includes/connection.php");
	include_once("includes/header.php");
?>
<br><br><br><br><br><br>
<div id="wrapper">

     <div id="content-wrapper">
               <div class="abc">
 <!-- Icon Cards-->
 <div class="card card-register mx-auto mt-5">
        <div class="card-header">Order Status Update</div>
        <div class="card-body">
          <form name="booking" method="post" action="status_update.php" enctype="multipart/form-data">
                <div class="col-md-6">
					 <label for="lastName">status</label>
                    <select class="form-control" name="status">
						<!-- <option value="<?php echo $r['material'];?>"><?php echo $r['material'];?></option> -->
						<option value="Placed">Placed</option>
						<option value="canceled">canceled</option>	
                        <option value="Order taken">Order taken</option>
                        <option value="Preparing">Preparing</option>
                        <option value="Packed">Packed</option>	
                        <option value="Skiped">canceled</option>
                        <option value="Delivered">Delivered</option>	
						<!--<option value="Transistors">Transistors</option>-->					
					</select>
                </div>
                <input type="hidden" name="order" value="<?php echo $_REQUEST['order_id']; ?>">
                <div>
                <br>
                <input type='submit' name='submit' value="Update"class='btn btn-primary center-block'>
                </div>
          </form>
        
        </div>
      </div>
        </div>
		 </div>
<?php
echo $_REQUEST['order_id'];
if(isset($_POST['submit']))
		 {
             $status=$_POST['status'];
             $id=$_POST['order'];
        $q="update `order` set `status`='$status' where `order_id`='$id'";
        $exe=mysql_query($q);
        echo "<script type='text/javascript'>alert('Product Updated Successfully');</script>";
        echo '<meta http-equiv="refresh" content="0;url=order_view.php">';
        }
?>