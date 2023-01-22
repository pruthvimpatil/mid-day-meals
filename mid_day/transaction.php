<?php
$con=mysqli_connect("localhost","root","","mid_day_meal") or die("cannot connect".mysqli_connect_error());
session_start();
$nos=$_POST["nos"];
$dice=$_SESSION["dice"];
$rice=$nos*0.150;
$dal=$nos*0.020;
$oil=$nos*0.005;
$milk=$nos*0.018;
$amt=$nos*2;

$s="insert into transaction values(CURRENT_DATE(),'$nos','$rice','$dal','$oil','$milk','$amt','$dice')";
$result=mysqli_query($con,$s);



$s1="select * from stock where dice='$dice'";
$data=mysqli_query($con,$s1);

$res=mysqli_fetch_array($data,MYSQLI_ASSOC);

$rice1=$res["rice"]-$rice;
$dal1=$res["dal"]-$dal;
$oil1=$res["oil"]-$oil;
$milk1=$res["milk"]-$milk;
$amt1=$res["amt"]-$amt;

echo "$rice1";




$s2="update stock set rice='$rice1',dal='$dal1',oil='$oil1',milk='$milk1',amt='$amt1' where dice='$dice'";
$result=mysqli_query($con,$s2);
echo "$result";
if($result)
{
    
    
    
    echo "<script>document.location='transactd.php';alert('Transaction added successfully')</script>";
    
    
}



?>