  <?php
date_default_timezone_set('Europe/Berlin');
$servername = "localhost";
$username = "user";
$password = "password";
$dbname = "p3afast";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM Saldo ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
	 $sum = $row["saldo_sms"]+$row["saldo_auksjon"]+$row["sum_diverse"]+$row["sum_robot"];
	 $pros = $row["saldo_sms"]/$sum*100;
	 $pros = number_format($pros, 2, ',', ' ');
	 $proa = $row["saldo_auksjon"]/$sum*100;
	 $proa = number_format($proa, 2, ',', ' ');
	 $proc = $row["sum_diverse"]/$sum*100;
	 $proc = number_format($proc, 2, ',', ' ');
	 $prod = $row["sum_robot"]/$sum*100;
	 $prod = number_format($prod, 2, ',', ' ');
 
	 print( gmdate("H:i", $row["tid"]+7200) );
	 print("<table id=\"sumtabell\"><tr>");
	 print("<td>P3A til 2133:</td><td> ");
	 print( number_format($row["saldo_sms"], 0, ',', ' ') );
	 print(" NOK ".$pros."%</td></tr><tr><td>");
	 print("Auksjoner:    </td><td> ");
	 print( number_format($row["saldo_auksjon"], 0, ',', ' ') );
	 print(" NOK  ".$proa."%</td></tr><tr><td>");
	 print("Arrangjement:    </td><td> ");
	 print( number_format($row["sum_diverse"], 0, ',', ' ') );
	 print(" NOK  ".$proc."%</td></tr><tr><td>");
	 print("Robot:    </td><td> ");
	 print( number_format($row["sum_robot"], 0, ',', ' ') );
	 print(" NOK  ".$prod."%</td></tr><tr><td>");
	 print("Total:</td><td> ");
         print( number_format($sum, 0, ',', ' ')  );
	 print(" NOK</td></tr></table>");
     }
} else {
echo "error!";
}

$conn->close();
?>

