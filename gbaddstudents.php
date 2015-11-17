<!DOCTYPE html>
<html>
<head>
<title>Add Users</title>
</head>
<body>
<?php
// Setting up the Database Connection
$servername = "localhost";
$username = "jhamler10";
$password = "aqu3a5uvu";
$dbname = "jhamler10_gradebook";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {


//Capturing the POST Data
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$advisor_id = $_POST['advisor_id'];
$state_id = $_POST['state_id'];
$city_id = $_POST['city_id'];

// Creating the SQL statement
$sql = "INSERT INTO students (first_name, last_name, advisor_id, state_id, city_id)
VALUES ('$firstname', '$lastname', '$advisor_id', '$state_id', '$city_id');";
// Executing the SQL statement
if ($conn->query($sql) === TRUE) {
echo "Record added successfully";
} else {
echo "Error: " . $sql . "
" . $conn->error;
}
//$conn->close();
}

?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
First Name: <input type="text" name="firstname"><br />
Last Name: <input type="text" name="lastname"><br />
Advisor ID: <select name="advisor_id"><br />

<?php
$sql = "SELECT * FROM advisor;";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()){
echo "<option value='" . $row['advisor_id'] . "'>" . $row['first_name'] . " " . $row['last_name'] . "</option>";
}
?>
</select>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
State: <select name="state_id">
<?php
$sql = "SELECT * FROM state;";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()){
echo "<option value='" . $row['state_id'] . "'>" . $row['name'] . "</option>";
}
?>
</select>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
City: <select name="city_id">
<?php
$sql = "SELECT * FROM city;";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()){
echo "<option value='" . $row['city_id'] . "'>" . $row['name'] . "</option>";
}
?>
</select>

<br />
<input type="submit" value="submit">
</form>
</body>
</html>