<html>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$email=$_POST["email"];
$id=$_POST["adhaar"];
$name=$_POST["name"];
$birthdate=$_POST["dob"];
$contact=$_POST["contaddr"];
$urls=$_POST["hiddenurl"];
$doctypes=$_POST["hiddendoctype"];
$links = explode(" ", $urls);
$docs = explode(" ", $doctypes);
// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
echo "<br>";
?>
<br>
<b>Details of registered user :</b>
<br>
  Full Name     : <?php echo $name ?><br>
  Date of Birth : <?php echo $birthdate ?><br>
  Contact Number: <?php echo $contact ?><br>
  Email         : <?php echo $email ?><br>
  Adhaar ID     : <?php echo $id ?><br>
  urls          : <?php echo $urls ?><br>
  doctypes      : <?php echo $doctypes ?><br>
<?php
// sql to insert user detail's in user's database
$sql = "INSERT INTO digilock.users (name, birthdate, contact, email, adhaar) VALUES ('$name', '$birthdate', '$contact', '$email', '$id')";

if ($conn->query($sql) === TRUE) 
{
  echo "New user record created successfully";
} 
else 
{
  echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
<b>Documents Successfully saved are as below:</b> 
<br>

<?php

for($i=0;$i<(count($links)-1);$i++)
{
	//sql to insert url's database 
	$sql = "INSERT INTO digilock.urls ( url, doctype, adhaarID ,status) VALUES ( '$links[$i]', '$docs[$i]', '$id','NULL')";
	if ($conn->query($sql) === TRUE) 
	{
	echo "New user document record created successfully<br>";
	} 
	else 
	{
	echo "Error: " . $sql . "<br>" . $conn->error;
	}
}

?>

<?php
$conn->close();
echo "<br>";
echo "Connection closed";
?>
<br>
<br>
<a href="./index.html"> <b> HOME </b> </a>
</body>
</html>