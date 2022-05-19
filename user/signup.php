<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>registraion</title>
        <link rel="stylesheet" type="text/css" href="css/formstyle.css">
        <script type="text/javascript">
       function validation()
       {
         if(document.getElementById("pwd").value!=document.getElementById("cpwd").value)
          {
              alert("password not match");
              document.signup.cpwd.focus();
              return false;
          }
           }
        </script>
        <link rel="stylesheet" type="text/css" href="css/inputstyle.css">
    </head>
    <body>
         <script type="text/javascript">
        document.addEventListener('contextmenu',function(event){
            event.preventDefault();
        });
        </script>
        <?php 
        // include ('front.php');
        echo "<br><br>"; echo "<div class='table-heading'>
			<h2 align='center'>Signup</h2>
				</div>";?>
        <form name="signup" id="signup" method="post" action="signup.php" enctype="multipart/form-data">
            <table align="center">
            <tr><td><label>User Name</label></td>
                    <td><input type="text" name="usrnm" placeholder="user name" require class="text"></td></tr>
                <tr><td><label>Address</label></td>
            <td><textarea rows="4" cols="50" name="address" placeholder="  address" class="txtarea"></textarea></td>
                </tr>
                <tr><td><label>Mobile Number</label></td>
                    <td><input type="text" name="mob_no" placeholder="mobile no" require class="text"></td></tr>
                <tr><td><label>Password</label></td>
                    <td><input type="password" name="pwd" id="pwd" class="text" require placeholder="password"></td></tr>
                <tr><td><label>Conform Password</label></td>
                    <td><input type="password" name="cpwd" id="cpwd" class="text" require placeholder="conform password"></td></tr>
                <tr><td class="em"><label>Email</label></td>
                 <td><input type="email" name="email" class="text" placeholder="email"></td></tr>
                <tr><td><input type="submit" name="save" value="save" onclick=" return validation();" class="btn"></td>             
            </table>
        </form>
        <?php
        include ('connection.php');
        if(isset($_POST['save']))
        {
            $adrs=$_POST['address'];
            $mob=$_POST['mob_no'];
            $unm=$_POST['usrnm'];
            $pwd=md5($_POST['pwd']);
            $email=$_POST['email'];
            $sql="insert into users(username,password,mobile_number,address,email,user_type)values('$unm','$pwd','$mob','$adrs','$email','2')";
            $q=mysql_query($sql) or die(mysql_error());
            header("location:login.php");
        }
            ?>
<!-- //             //permited file existamce
//             $allowed=array('png', 'jpg', 'gif','zip','docx','jpeg');
//             if(isset($_FILES['image']) && $_FILES['image']['error'] == 0){

// 	$extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

// 	if(!in_array(strtolower($extension), $allowed)){
// 		echo '{"status":"error"}';
// 		exit;
// 	}
// 	if(move_uploaded_file($_FILES['image']['tmp_name'], 'images/'.$_FILES['image']['name'])){
// 		echo '{"status":"success"}';
// 		exit;
// 	}
// }
// echo '{"status":"error"}';
// exit;
//         }
//         include('footer.php'); -->
       
</body>
</html>