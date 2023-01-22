<?php
$con=mysqli_connect("localhost","root","","mid_day_meal") or die("cannot connect".mysqli_connect_error());
session_start();
$dice_code=$_SESSION["dice"];

$rice=$_POST["rice"];
$dal=$_POST["dal"];
$oil=$_POST["oil"];
$milk=$_POST["milk"];
$amt=$_POST["amt"];
$val=0;

$s="insert into grants value('$dice_code',curdate(),'$rice','$dal','$oil','$milk','$val','$amt')";
$res=mysqli_query($con,$s);

$val1=1;
$s="update indents set val='$val1' where dice='$dice_code' and val='$val'";
$result=mysqli_query($con,$s);


header('Location:aindent.php');




?>