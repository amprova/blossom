<?php
session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['user']))
{
  header("Location: index.php");
}

$res = "select * from user where User_name=.$_SESSION[user] ";
$qu=mysqli_query($con,$res);

//$username= $qu['User_name'];
//$row = $qu->fetch_assoc());

$user = $_SESSION['user'];


?>

<!DOCTYPE html>
<head>
  <title> Blossom </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/navigation.css">
  <style type="text/css">
  </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <style>
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 70%;
      margin: auto;
  }
  </style>
  <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/ver.css">
  <link rel="stylesheet" href="css/st1.css">
    <link rel="stylesheet" href="css/brown.css">
  <link href='http://fonts.googleapis.com/css?family=Indie+Flower' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Ubuntu:500' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="css/green.css">
  <link rel="stylesheet" href="image/logo1.css" type="text/css">
   <script src="js/jquery-1.11.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
</head>

<body background = "image/t8.jpg">
<div class = "container">

  <div class = "row" >
    <div class = "col-md-6">
      <img src="image/nn.png" alt="nutella">
    </div>
      
    <div class = "col-md-6">
       <div id='green'>
    <ul>
   <li class='active'><a href="home.php"><span><img src="image/h.jpg" alt="Home">
    <a href=></a></span></a></li>
   <li><a href='useracc.php'><span><img src="image/u.png" alt="User Account"</span></a></li>
   <li><a href='cart.php'><span><img src="image/c.jpeg" alt="View Cart"</span></a></li>
   <li><a href='#'><span><img src="image/c.png" alt="Contact Us"</span></a></li>
   <li><a href="custom.php"><span>Custom</span></a></li>
    <li><a href="logout.php?logout"><span>Log-out</span></a></li>
    <li><span>HI <?php echo $user;?> !!!</span></li></br>
    </ul>
       </div>
    </div>
  </div>

  <div class="row">

    <form method = "POST" action="search.php" enctype="multipart/form-data">

<input type="text" name="query" placeholder="Search a product"/>
<input type = "submit" name="submit">
    <?php

if(isset($_POST['submit']))
{
   

         
        $search = $_POST['query'];
        //echo $search;
        $con = new mysqli('localhost','root','','blossom');


if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 
    
   
     $sql= "select * from products where keyword like '%$search%'";
     $result = mysqli_query($con, $sql);
     //echo $search;
    
      if ($result->num_rows > 0) {
   
    while($row = $result->fetch_assoc()) {
      
        $pro_ID = $row['product_ID'];
        $pro_name = $row['name'];
        $pro_image = $row['image'];
        $pro_price = $row['price'];
       
       
          
              echo"
            
            <div class='col-md-4'>
              <div class='itm'>
              
              <h3>$pro_name</h3>
              
              <img src = 'prod_image/$pro_image' class='img-thumbnail' size='60'>
              <p><b>BDT $pro_price</b></p>
             

               <a href='home.php?add_cart=$row[product_ID]'><img src='image/add.png' alt='add to cart''></a>

             </div>
          </div>";
          
   }
 }
         
else {
    echo "0 results";
}
}
?>

</form>

  </div>


<p class="it">
  <div class="row">
    <div class="col-md-12">
      <ul class="nav">
    <li><a href="bestseller.php">Best Sellers</a></li>
    <li>
      <a href="#">Special Days</a>
      <ul>
       
        <li><a href="birthday.php">Birthday</a></li>
        <li><a href="anniversary.php">Anniversary</a></li>
        <li><a href="valentines.php">Valentines Day</a></li>
        <li><a href="Mother.php">Mothers Day</a></li>
        <li><a href="wedding.php">Wedding Day</a></li>
      </ul>
    </li>
    <li>
      <a href="#">Special Purpose</a>
      <ul>
       
        <li><a href="congratulation.php">Congratulations</a></li>
        <li><a href="thank.php">Thank you</a></li>
        <li><a href="sorry.php">Sorry</a></li>
        <li><a href="love.php">Love</a></li>
        <li><a href="get_well.php">Get well soon</a></li>
        <li><a href="sympathy.php">Sympathy</a></li>
      </ul>
    </li>
     <li>
      <a href="#">Special Persons</a>
      <ul>
        
        <li><a href="parents.php">Parents</a></li>
        <li><a href="sibling.php">Siblings</a></li>
        <li><a href="anniversary.php">Wife-Husband</a></li>
        <li><a href="friends.php">Friends</a></li>
        <li><a href="teacher.php">Teacher</a></li>
      </ul>
    </li>
    <li><a href="flowers.php">Flowers</a></li>
    <li>
      <a href="#">Decoration</a>
      <ul>
        <li><a href="wrapping.php">Wrapping Paper</a></li>
        <li><a href="ribbon.php">Ribbon</a></li>
        <li><a href="vase.php">Vase</a></li>
        <li><a href="#">Cards</a></li>
      </ul>
    </li>
  </ul>
</div>
</div>


<div class= "row">

     <div class = "col-md-6">
       <div id='green'>
    <ul>
   <li>


   <?php

    //session_start();
    include_once 'dbconnect.php';

    if(isset($_SESSION['user']))
    {
      $user = $_SESSION['user'];
      if($user=='Bazingaa')
    {

       $total=0;

                $con = new mysqli('localhost','root',"",'blossom');

                if ($con->connect_error) {
               die("Connection failed: " . $con->connect_error);
                  }

                  //local var
                  //$pro_ID;
     $sql = "select * from ordererd";
     $result = mysqli_query($con, $sql);
     
      $total= $result->num_rows;
      echo "$total"; 
    }

    //echo"<a href='adminorder.php?>
     

    }
?>
  </li></br>
    </ul>
       </div>

  </div>

</p>
  <div class = "row">
    <div class="col-md-12">
      <br>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
      <li data-target="#myCarousel" data-slide-to="4"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">

      <div class="item active">
        <img src="image/s10.jpg" alt="flower" width="460" height="345">
         <div class="carousel-caption">
          <p class="flower">where flower bloom, so does hope</p>
        </div>
      </div>

      <div class="item">
        <img src="image/s6.jpg" alt="Chania" width="460" height="345">
        <div class="carousel-caption">
          <p>make your special days more special</p>
        </div>
      </div>
    
      <div class="item">
        <img src="image/s5.jpg" alt="Flower" width="460" height="345">
        <div class="carousel-caption">
          <p>life is flower for which love is honey</p>
        </div>
      </div>

      <div class="item">
        <img src="image/s2.jpg" alt="Flower" width="460" height="345">
      </div>
       <div class="item">
        <img src="image/d5.jpg" alt="Flower" width="460" height="345">
        <div class="carousel-caption">
          <p>feel free to decorate</p>
        </div>
       </div>
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
    </div>
  </div>


 
<p class="q">
  <div class="row">
    <div class="col-md-12">
      <img src="image/bk.png" alt="flower" >
    </div>
  </div>
</p>
</div>
</body>
