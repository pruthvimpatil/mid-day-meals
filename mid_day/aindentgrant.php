<?php

$con=mysqli_connect("localhost","root","","mid_day_meal") or die("Couldn't connect".mysqli_error());
session_start();
$dice_code=$_POST["dice"];
$_SESSION["dice"]=$dice_code;
$val=0;
$s="select * from indents where dice='$dice_code' and val='$val'";
$data=mysqli_query($con,$s);
$res=mysqli_fetch_array($data,MYSQLI_ASSOC);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
     
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
     <title>Document</title>
<style>
    .head1{
      
    height: 40px;
    }
    .navibar{
        background-color: darkblue;
        border: 20px;
    }

    .head2{
        padding-top: 25px;
        padding-bottom: 25px;

        
        background-color:black;
    }

  
.dropdown{
    top:8px;
    color: black;
}

.loginform1{
    border:solid gray 2px;
    background-color:gray;
    opacity:0.8;
   position: absolute;
   padding: 20px;
   top: 100px;
   left:400px;

    
}

</style>


</head>
<body>






<div class="head2">
    <ul class="nav justify-content-end">
      <li class="nav-item">
        <a class="nav-link " href="hmpg.html" ><h3>Home</h3></a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="abtus.html" ><h3>About us</h3></a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="contact.html" ><h3>Contact us</h3></a>
      </li>
      
        
        <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle"style="background-color:black;color:blue;" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
           <h3>Login</h3> 
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="login1.html"><h4>School login</h4></a>
            <a class="dropdown-item" href="alogin.html"><h4>Admin login</h4></a>
          </ul>
        </div>
        <!--
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown button
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </div>
          -->
        <li class="nav-item">
          <a class="nav-link " href="register.html" ><h3>Register</h3></a>
        </li>
      </ul>

</div>




    <img src="background.jpg" style="width:100%;height: 900px;" >
    

    <div class="loginform1">
    <h2 style="text-align:center">Indents Placed</h2>
    <br>
     <h3>School DISE Code:<?php echo $res["dice"]?></h3>
     <br>
     <h3>Indent Placed Date :<?php echo $res["date"]?></h3>
     <br>
      <h3>Rice :<?php echo $res["rice"]; ?>Kg</h3>
     <br>
     <h3>Dal : <?php echo $res["dal"]?> kg</h3>
     <br>
     <h3>Oil: <?php echo $res["oil"]?> Kg</h3>
     <br>
     <h3>Milk :<?php echo $res["milk"]?> Kg</h3>
     <br>
     <h3>Amount :<?php echo $res["amt"]?> rupees</h3>
     <br>

     <hr>
      <form method="POST" action="aindentgrant1.php" onsubmit="return validation()" name="f1">
       <h2 style="text-align:center">Grants To Be Made</h2>
                     <br>
                    
           
<div >
  <label><h3> Rice in kg:</h3></label>
   <div><input type="text" id="em"name="rice" style="width:500px;"></div>
</div>
<br>

<div >
  <label><h3>Dal in kg:</h3></label>
   <div><input type="text" id="em"name="dal" style="width:500px;"></div>
</div>
<br>
<div >
  <label><h3>Oil in kg:</h3></label>
   <div><input type="text" id="em"name="oil" style="width:500px;"></div>
</div>
<br>
<div >
  <label><h3>Milk Powder in kg:</h3></label>
   <div><input type="text" id="em"name="milk" style="width:500px;"></div>
</div>
<br>
<div >
  <label><h3>Amount in rupees:</h3></label>
   <div><input type="text" id="em"name="amt" style="width:500px;"></div>
</div>
<br>
<div >
  

           

           <div>
              <button type="submit" style="background-color:blue;color:white;"><h4>Submit</h4></button>
           </div>
      </form>

</div>
    
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>
</html>