<!doctype html>
<html>
<head>
<title>order</title>
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
	padding-left:200px;
	padding-right:200px;
}
</style>
<body>
<?php
include_once("includes/navbar.php");
include_once("includes/header.php");
include ('connection.php');

$sql="select price from product where product_id='".$_REQUEST['prod_id']."'";
            $result=  mysql_query($sql);
            $price="";
            while($row=mysql_fetch_array($result)){
                $price=$row['price'];
            }
?>
<div id="wrapper">

     <div id="content-wrapper">
               <div class="abc">
 <!-- Icon Cards-->
 <div class="card card-register mx-auto mt-5">
        <div class="card-header">Order</div>
        <div class="card-body">
        <table>
          <form name="booking" method="post" action="order.php" enctype="multipart/form-data">
		     <tr>
          <td><label for="firstName">Number Of Sarees</label></td>				
					<td><input type="text" name="number" placeholder="Enter No Of Sarees" class="form-control" id="number_of_sarees" required></td>
          </tr>                
              
                <tr> 
					<td><label for="firstName">Contact</label></td>				
					<td><input type="text" name="contact" class="form-control" placeholder="Enter Note Type" required></td>         
                  </tr>
			  
                <tr>
					<td><label for="firstName">color</label>	</td>			
					<td><input type="text" name="color" class="form-control" placeholder="Choose Color" required="required">    </td>     
                  </tr>
                
       <tr>
				<td><label for="inputEmail">Address</label></td>
                <td><textarea id="" name="address" class="form-control" placeholder="Enter Address"></textarea></td>
			</tr>
      <tr>
          <td> <input type='submit' name='submit' value="add product"class='btn btn-primary center-block'>
          </td></tr>
          </table>
          <div id="rate"></div>
          <input type="hidden" id="price" name="price" value="<?php echo $price?>">
        <input type="hidden" id="rate_store" name="rate_store">
          <input type="hidden" name="product_id" id="product_id" value="<?php echo $_REQUEST['prod_id']?>">
          </form>

		 
<?php
@session_start();
        if(isset($_POST['submit']))
        {
            $adrs=$_POST['address'];
            $color=$_POST['color'];
            $nos=$_POST['number'];
            $pr=$_POST['price'];
            $rate=(int)$nos*(int)$pr;
            $cont=$_POST['contact'];
            $user=$_SESSION['user_id'];
            $product_id=$_POST['product_id'];
            $status='placed';
            $date=date('Y-m-d h:i:s',strtotime('+1 day'));
            //echo "????????",$price;
            $sql="insert into `order` (user_id,product_id,rate,no_of_sarees,color,address,contact,status,date)values('$user','$product_id','$rate','$nos','$color','$adrs','$cont','$status','$date')";
            $q=mysql_query($sql) or die(mysql_error());
        }
?>
</body>

</html>
<script type="text/javascript" src="includes/js/jquery.min.js"></script>

<script>
$(document).ready(function(){
    $('#number_of_sarees').keyup(function(){
        var txt=$(this).val();
        var id=$('#product_id').val()
        console.log("id",id)
        console.log("num",txt)
        if(txt!='')
        {
            $.ajax({
                url:"rate.php",
                method:"post",
                data:{search:txt,product_id:id},
                datatype:"text",
                success:function(data)
                {   
                    $('#rate').html(data);
                    $('#rate_store').val(data)
                }
            });
            }
        else{
            $('rate').html("");
        }
    });
});
</script>