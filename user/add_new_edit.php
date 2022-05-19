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
	padding-left:500px;
	padding-right:200px;
}
</style>
<body>
<?php
	include_once("includes/connection.php");
	include_once("includes/header.php");
?>
<?php
if($_GET['Mode'] =="Delete") {
	$sqldel="Delete from product where product_id='".$_REQUEST['prod_id']."' ";
	//$pho = $_REQUEST['unlink_file'];
	//unlink($pho);
	mysql_query($sqldel);
	echo "<script type='text/javascript'>alert('Product Deleted Successfully');</script>";
	echo '<meta http-equiv="refresh" content="0;url=view_product.php">';

	}	
?>
    <?php include("includes/admin_navbar.php"); 
    $product_id=$_REQUEST['prod_id'];
    $sql="select * from product where product_id='$product_id'";
    $query=mysql_query($sql);
    while($r=mysql_fetch_array($query))
{
    ?>
<div id="wrapper">

     <div id="content-wrapper">
               <div class="abc">
 <!-- Icon Cards-->
 <div class="card card-register mx-auto mt-5">
        <div class="card-header">Add New Product</div>
        <div class="card-body">
          <form name="booking" method="post" action="add_new_edit.php" enctype="multipart/form-data">
		  
		  
            <div class="form-group">
              <div class="form-row">
			  
                <div class="col-md-6">  
					<label for="firstName">Product code</label>				
					<input type="text" name="product_code" class="form-control"  value="<?php echo $r['product_code'];?>" required>         
                  
                </div>
                <div class="col-md-6">  
					<label for="firstName">Product name</label>				
					<input type="text" name="product_name" class="form-control" placeholder="Enter Note Type" value="<?php echo $r['product_name'];?>" required>         
                  
                </div>
                <div class="col-md-6">
					 <label for="lastName">Material</label>
                    <select class="form-control" name="material">
						<option value="<?php echo $r['material'];?>"><?php echo $r['material'];?></option>
						<option value="Cotton">Cotton</option>
						<option value="Pattu">Pattu</option>	
						<!--<option value="Transistors">Transistors</option>-->					
					</select>
					<label>
                </div>
              </div>
            </div>
			<div class="form-group">
              <div class="form-row">
                <div class="col-md-6">  
					<label for="firstName">Price</label>				
					<input type="text" name="price" class="form-control" value="<?php echo $r['price'];?>" placeholder="Enter The Price" required="required">         
                </div>
                 </div>
            </div>
            <div class="col-md-6">
				<label for="inputEmail">Product Image</label>
                <input type="file"  name="image">
			</div>
			 <div class="form-group">
				<label for="inputEmail">Description</label>
                <textarea id="" name="description" class="form-control" placeholder="Enter Description"><?php echo $r['description'];?></textarea>
             </div>
			<input name='product_id' type="hidden" value="<?php echo $r['product_id'];?>">
           <input type='submit' name='submit' value="Update"class='btn btn-primary center-block'>
          </form>
        
        </div>
      </div>
        </div>
		 </div>
<?php
}
if(isset($_POST['submit']))
		 {
			 $pc=$_POST['product_code'];
			 $pn=$_POST['product_name'];
			 $mtrl=$_POST['material'];
			 $prc=$_POST['price'];
             $dsc=$_POST['description'];
             $photo=$_FILES['image']['name'];
             $pro_id=$_POST['product_id'];
			 $path = "upload/$photo";						
			$file_tmp_name=$_FILES['image']['tmp_name'];
			if(move_uploaded_file($file_tmp_name, $path))
			{
				echo"upload";
			}
			else{
				echo"fail";
            }
        $q="update product set product_code='$pc',
                product_name='$pn',
                material='$mtrl',
                price='$prc',
                description='$dsc',
                img_path='$path'
                where product_id='$pro_id'";
        $exe=mysql_query($q);
        echo "<script type='text/javascript'>alert('Product Updated Successfully');</script>";
        echo '<meta http-equiv="refresh" content="0;url=view_product.php">';
        }
?>