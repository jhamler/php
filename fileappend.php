<?php
if (isset($_POST['submit'])){
$myfile = fopen("files/test.txt", "a+") or die("Something went wrong");
$data = $_POST['data'];
fwrite($myfile, $data . "\n");
}
?>

<?php
$folder = "files/";
$filelist = scandir($folder);
foreach ($filelist as $val) {
echo $val;
echo "<br>";	
}


?>

<form method="post" action="fileappend.php">
Data: <input type="text" name="data">
<br>
<input type="submit" name="submit" value="submit">
</form>