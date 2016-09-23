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

$sql = "SELECT * FROM Saldo ORDER BY id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
         $var = $var+$row["saldo_sms"]+$row["saldo_auksjon"];
	 $i++;
     }
} else {
echo "error!";
}

$conn->close();
$i = $i/12;
print($var);
print("\n");


$var = $var/$i;
print($i);
print("\n");
print($var);
?>

