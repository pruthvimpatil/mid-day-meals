<?php
$con=mysqli_connect("localhost","root","","mid_day_meal") or die("cannot connect".mysqli_connect_error());


session_start();
$name=$_POST["name"];
$pwd=$_POST["pwd"];







$s="select * from admin";
$result=mysqli_query($con,$s);

while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
{
    echo $row["name"];
    echo $row["pwd"];
    

if($row["name"]==$name && $row["pwd"]==$pwd)
{
    header('Location:adashboard.html');
}
}


    echo "<script>document.location='plogin.php';alert('Wrong password or email id .Please try again.')</script>";





?>