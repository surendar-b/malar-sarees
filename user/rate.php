<?php
// echo $_POST['product_id'];
// echo $_POST['search'];
include ('connection.php');
$sql="select * from product where product_id='".$_POST['product_id']."'";
            $result=  mysql_query($sql);
            $price="";
            while($row=mysql_fetch_assoc($result)){
                $price=$_POST['search']*$row['price'];
                echo $price;
            }   
    ?>