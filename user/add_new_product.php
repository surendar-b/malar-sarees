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
	padding-right:200px;
}
</style>
<body>
<?php
	$admin_add="active";
	include_once("includes/connection.php");
	include_once("includes/header.php");
?>
	<?php include("includes/admin_navbar.php"); ?>
<div id="wrapper">

     <div id="content-wrapper">
               <div class="abc">
 <!-- Icon Cards-->
 <div class="card card-register mx-auto mt-5">
        <div class="card-header">Add New Product</div>
        <div class="card-body">
          <form name="booking" method="post" action="add_new_product.php" enctype="multipart/form-data">
		  
		  
            <div class="form-group">
              <div class="form-row">
			  
                <div class="col-md-6">  
					<label for="firstName">Product code</label>				
					<input type="text" name="product_code" class="form-control"   required>         
                  
                </div>
                <div class="col-md-6">  
					<label for="firstName">Product name</label>				
					<input type="text" name="product_name" class="form-control" placeholder="Enter product name" required>         
                  
                </div>
                <div class="col-md-6">
					 <label for="lastName">Material</label>
                    <select class="form-control" name="material">
						<option>Choose Category</option>
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
					<input type="text" name="price" class="form-control" placeholder="Enter The Price" required="required">         
                  
                </div>
                 </div>
            </div>
            <div class="col-md-6">
				<label for="inputEmail">Product Image</label>
                <input type="file"  name="image" required="required">
			</div>
			 <div class="form-group">
				<label for="inputEmail">Description</label>
                <textarea id="" name="description" class="form-control" placeholder="Enter Description"></textarea>
             </div>
			
           <input type='submit' name='submit' value="add product"class='btn btn-primary center-block'>
          </form>
        
        </div>
      </div>
        </div>

		 </div>
		 <?php
		 if(isset($_POST['submit']))
		 {
			 $pc=$_POST['product_code'];
			 $pn=$_POST['product_name'];
			 $mtrl=$_POST['material'];
			 $prc=$_POST['price'];
			 $dsc=$_POST['description'];
			 $photo=$_FILES['image']['name'];
			 $path = "upload/$photo";						
			$file_tmp_name=$_FILES['image']['tmp_name'];
			if(move_uploaded_file($file_tmp_name, $path))
			{
				echo"upload";
			}
			else{
				echo"fail";
			}
			//permited file existamce
			// $allowed=array('png', 'jpg', 'gif','zip','docx','jpeg');
			// if(isset($_FILES['image']) && $_FILES['image']['error'] == 0){

			// $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
				
			// if(!in_array(strtolower($extension), $allowed)){
			// 	echo '{"status":"error"}';
			// 	exit;
			// 	}
			// if(move_uploaded_file($_FILES['image']['tmp_name'], 'images/'.$_FILES['image']['name'])){
			// 	echo '{"status":"success"}';
			// 	exit;
			// }
			// }
				
			 $sql="insert into product(product_code,product_name,price,material,img_path,description)values('$pc','$pn','$prc','$mtrl','$path','$dsc')";
			 $q=mysql_query($sql) or die(mysql_error());
		 }
			 ?>
</body>
</html>

