<?php
if (file_exists('counter.txt')) {
$myfile = fopen("counter.txt", "r");
$data = fread($myfile, filesize('counter.txt'));
echo "Visits: ";
echo $data + 1;
fclose($myfile);
$myfile = fopen("counter.txt", "w");
fwrite($myfile, $data+1);
}

else {
$myfile = fopen('counter.txt', 'w');
fwrite($myfile, 1);
echo '1';
fclose($myfile);	
}
?>