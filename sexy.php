<?php
$host='localhost';
$user='root';
$pass='';
$db='website';

$con=mysqli_connect($host,$user,$pass,$db);
if($con)
echo 'connection is successful to mydb database';

$sql="insert into contact (name,email,number,message) values ('aksahy','devkatte.akshay98@gmail.com','8562369845','hello! there i did it ')";
$query=mysqli_query($con,$sql);
if($query)
echo 'data inserted sucessfully';
?>
