<?php
$con=mysqli_connect("localhost","root","","mid_day_meal") or die("cannot connect".mysqli_connect_error());
//$s="insert into date1 values()"
$transdate = date('Y-m-d', time());
echo $transdate;

$month = date('m', strtotime($transdate));
echo $month;
$year = date('Y', strtotime($transdate));
echo $year;
$date="30-$month-$year";
echo $date;
$s="insert into checkdate values('$date')";
$res=mysqli_query($con,$s);
//echo date('F Y'); 
//echo date('M Y'); 
//$now = new \DateTime('now');
?>