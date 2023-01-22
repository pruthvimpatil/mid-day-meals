<?php
$con=mysqli_connect("localhost","root","","mid_day_meal") or die("cannot connect".mysqli_connect_error());

session_start();
$dice=$_POST["dice"];
$pwd=$_POST["pwd"];
$rice=$_POST["rice"];
$dal=$_POST["dal"];
$oil=$_POST["oil"];
$milk=$_POST["milk"];
$amt=$_POST["amt"];
$nos=$_POST["nos"];




$s="insert into user values('$dice','$nos','$pwd')";
$res=mysqli_query($con,$s);

$s="insert into stock values('$dice','$rice','$dal','$oil','$milk','$amt')";
$res=mysqli_query($con,$s);

//$s="insert into transaction values(CURRENT_DATE(),'$nos','$rice','$dal','$oil','$milk','$amt','$dice')";
//$res=mysqli_query($con,$s);

header('Location:login1.html');



?>