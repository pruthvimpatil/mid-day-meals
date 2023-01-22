<?php
$con=mysqli_connect("localhost","root","","mid_day_meal") or die("cannot connect".mysqli_connect_error());


session_start();
$dice=$_POST["dice"];
$pwd=$_POST["pwd"];
$_SESSION["dice"]=$dice;







$s="select * from user";
$result=mysqli_query($con,$s);

while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
{
if($row["dice"]==$dice && $row["pwd"]==$pwd)
{
    header('Location:dashboard.html');
}
}


    echo "<script>document.location='plogin.php';alert('Wrong password or email id .Please try again.')</script>";





?>