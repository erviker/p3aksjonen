<?php

$json = file_get_contents('https://s3.eu-central-1.amazonaws.com/p3aksjonen2015/saldo.json');
$obj = json_decode($json);
$tid = time();
$sms = $obj->sum_sms;
$auskjon = $obj->sum_auksjoner;
$robot = $obj->sum_robot; 
$diverse = $obj->sum_diverse;

$dbhost = 'localhost:3036';
   $dbuser = 'user';
   $dbpass = 'password';
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
   
   if(! $conn )
   {
      die('Could not connect: ' . mysql_error());
   }
   
   $sql = "INSERT INTO Saldo (tid, saldo_sms, saldo_auksjon, sum_diverse, sum_robot) VALUES ( '$tid', '$sms', '$auskjon','$diverse', '$robot')";
      
   mysql_select_db('p3a');
   $retval = mysql_query( $sql, $conn );
   
   if(! $retval )
   {
      die('Could not enter data: ' . mysql_error());
   }
   
   echo "Entered data successfully\n";
   
   mysql_close($conn);



?>
