<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        session_start();
        include("includes/connection.php");
    $username=  filter_input(INPUT_POST, 'uname');
    $password= filter_input(INPUT_POST, 'pwd');
    $n1=  $username;
    $n2= md5($password);
    $sql="select * from users where username='$n1' and password='$n2' and user_type='1'";
    $result=  mysql_query($sql);
    $count= mysql_num_rows($result);
    if($count==1)
    {
        echo $_SESSION['uname']=$username;
        $_SESSION['pwd']=$password;
        header("location:add_new_product.php");
    }
   else
    {
        echo "<script>alert('The Username and Password is Incorrect ...!')</script>";
        echo '<script> window.location.href="admin_login.php";</script>';
    }
        ?>
    </body>
</html>
