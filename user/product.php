<html>
<head>
<title>product</title>
</head>
<body>
<?php
    include ('connection.php');
    $sql="select * from product";
    $result=  mysql_query($sql);
    while($row=mysql_fetch_assoc($result)){
        echo "";
    }   

?>
</body>
</html>