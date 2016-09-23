<?php


print("['Tid', 'Total', 'Auksjon', 'SMS', 'Arrangjemnt', 'Robot'],");
print("\n");
date_default_timezone_set('Europe/Berlin');
$servername = "localhost";
$username = "user";
$password = "password";
$dbname = "p3a";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM Saldo";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	// output data of each row
	while($row = $result->fetch_assoc()) {
		print("['");
		print( gmdate("D H:i", $row["tid"]+7200) );
		print("', ");
		print( $row["saldo_sms"]+$row["saldo_auksjon"]+$row["sum_diverse"]+$row["sum_robot"]  );
		print(", ");
		print( $row["saldo_auksjon"]) ;
		print(", ");
		print( $row["saldo_sms"]) ;
		print(", ");
		print( $row["sum_diverse"]) ;
		print(", ");
		print( $row["sum_robot"]) ;
		print("],");
		
		print("\n");
	}
} else {
	echo "error!";
}

$conn->close();
?>

