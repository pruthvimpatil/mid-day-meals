<?php
session_start();
$con=mysqli_connect("localhost","root","","mid_day_meal") or die("Couldn't connect".mysqli_error());
$dice_code=$_SESSION["dice"];

$s="select * from transaction where dice='$dice_code' ";
$data=mysqli_query($con,$s);



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
    .tbl{
        position: absolute;
        top:200px;
        left: 120px;
    }


.dropdown{
    top:8px;
    color: black;
}
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 30px;
  font-size:large;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  
  text-align: center;
  background-color: gray;
  color: white;
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
       
        <li class="nav-item">
          <a class="nav-link " href="register.html" ><h3>Register</h3></a>
        </li>
      </ul>

</div>







    <div>
        <img src="background.jpg" style="width:100%">

<div class="tbl">   
    <table id="customers" >
            <tr>
                
                
               
                
              
                

              <th><h4>Date</h4></th>
              <th><h4>No of students</h4></th>
              <th> <h4>Rice  (in Kg)</h4></th>
              <th><h4>Dal  (in Kg)</h4></th>
              <th>  <h4>Oil  (in Kg)</h4></th>
              <th>  <h4>Milk Powder (in Kg)</h4></th>
              <th><h4>Amount (in rupees)</h4></th>
            </tr>
              <?php
                    while($row=mysqli_fetch_array($data,MYSQLI_ASSOC))
                    {
              ?>         
            <tr>
              <td><?php echo $row["date"]?></td>
              <td><?php echo $row["nos"]?></td>
              <td><?php echo $row["rice"]?></td>
              <td><?php echo $row["dal"]?></td>
              <td><?php echo $row["oil"]?></td>
              <td><?php echo $row["milk"]?></td>
              <td><?php echo $row["amt"]?></td>
            </tr>
            <?php
                    }
            ?>
            


            </table>
        </div>         
    </div>






    
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>
</html>