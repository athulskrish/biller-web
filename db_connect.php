<?php
 define('HOST','localhost');         //hostname
 define('USER','root');     //username keramfvp_admin
 define('PASS','');        //user password AMAL@2024
 define('DB','keramfvp_smartpos');  //database name
 
 $con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect');

?>