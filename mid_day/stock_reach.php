<?php
$con=mysqli_connect("localhost","root","","mid_day_meal") or die("Couldn't connect".mysqli_error());
session_start();
$dice_code=$_SESSION["dice"];

$s="select * from stock where dice='$dice_code'";
$data=mysqli_query($con,$s);
$row=mysqli_fetch_array($data,MYSQLI_ASSOC);
$rice=$row["rice"];
$dal=$row["dal"];
$oil=$row["oil"];
$milk=$row["milk"];
$amt=$row["amt"];


$val=0;
$s1="select * from grants where dice='$dice_code' and val='$val'";
$res=mysqli_query($con,$s1);
$row=mysqli_fetch_array($res,MYSQLI_ASSOC);
$rice1=$row["rice"];
$dal1=$row["dal"];
$oil1=$row["oil"];
$milk1=$row["milk"];
$amt1=$row["amt"];


$rice2=$rice1+$rice;
$oil2=$oil1+$oil;
$dal2=$dal1+$dal;
$milk2=$milk1+$milk;
$amt2=$amt1+$amt;



$s3="update stock set rice='$rice2',dal='$dal2',oil='$oil2',milk='$milk2',amt='$amt2' where dice='$dice_code'";
$res1=mysqli_query($con,$s3);
$val2=1;
$s1="update grants set val='$val2' where dice='$dice_code'";
$r=mysqli_query($con,$s1);

if($res1)
{
header('Location:stock.php');
}

?>