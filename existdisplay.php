<html>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$email=$_POST["existemail"];
$adhaar=$_POST["existadhaar"];
// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
echo "<br>";
echo $email." ".$adhaar."<br>";
// sql to select user detail's
$sql = "SELECT * FROM digilock.users WHERE email='$email'";

$result = $conn->query($sql);
echo "<br> <b>Details of registered user :</b> <br>";

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "FULL NAME: " . $row["name"]. "<br>". " BIRTHDATE: " . $row["birthdate"]. "<br>"." CONTACT: " . $row["contact"]. "<br>"." EMAILID: " . $row["email"]. "<br>"." ADHAARID: " . $row["adhaar"]. "<br>";
    }
} else {
    echo "USER DOES NOT EXIST";
}

// sql to select user document detail's
$sql = "SELECT * FROM digilock.urls WHERE adhaarID='$adhaar'";

$result = $conn->query($sql);
echo "<br> <b>Details of registered user Documents: </b> <br>";

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
     echo "URL: ". $row["url"]." DOCUMENT TYPE: ". $row["doctype"]." ADHAAR ID: " . $row["adhaarID"]. "<br>";
	 }
} else {
    echo "USER DOCUMENTS DETAILS DOES NOT EXIST";
}
$conn->close();
echo "<br>";
echo "Connection closed";
?>
<br>
<br>
<a href="./index.html"> <b> HOME </b> </a>
</body>
</html>