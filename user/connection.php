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
        // connectivity code
            $con= mysql_connect("127.0.0.1:3306","root","")or die("connection faild".mysql_error());
            $db=mysql_select_db('malar_sarees',$con)or die(mysql_error());
       ?>
    </body>
</html>
