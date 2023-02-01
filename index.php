
 <?php session_start()?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
     <meta charset="utf-8">
<meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="main.css">
<style type="text/css">
   #who{
      text-align: right;
      color: tomato;
    }
    #reg{
      text-align: center;
      color: red;
    }
</style>
	
  
</head>
<body>
   <div id="header">
    <img id="img1" src="img/asmislg1.png" alt="logo" width="22%" height="8%" />

   </div>
   <?php
include('menu.php');
//echo "<br>";
echo '<div id="who">';
if (isset($_SESSION['user'])) {
  echo "LOGGED IN AS ".$_SESSION['user']." </div>";
}else{
  echo "LOGGED IN AS VISITOR </div>";
}
 if (isset($_GET['reg'])) {
         echo "<div id='reg'> You Must <a href='login.php'>LOGIN</a> to be Able to Buy Products or Click <a href='register.php'>HERE</a> to register if You Don't Have an Account  </div>";
       }

include('slider.php');
   ?>
    <div class="main-container">
    <?php
            

include('config.php');
 

     $sql="SELECT * FROM products where item='harrows' ";
     $sqlqr=mysqli_query($con,$sql) or die("failed to fetch: ".mysqli_error());
     
     echo "<table cellspacing=33 cellpadding=2>";
     $count=0;
     while($row=mysqli_fetch_assoc($sqlqr)){
      echo "<div class='cont'>";
                if($count==0){
			         echo "<tr>"; 

    echo "<td>";
    echo "<a href='addtocart.php?id=".$row['id']."'><img src='./img/".$row['image']."' width=230 height=300></a>";
    echo "<h2>".$row['name']."</h2>";
    echo "<p>$ ".$row['price']."</p>";
    echo "<p>".$row['description']."</p>";

     echo "</div>";

}else{

    echo "<div class='cont'>";

    echo "<td>";
    echo "<a href='addtocart.php?id=".$row['id']."'><img src='./img/".$row['image']."' width=230 height=300></a>";
    echo "<h2>".$row['name']."</h2>";
    echo "<p> $ ".$row['price']."</p>";
    echo "<p>".$row['description']."</p>";

    echo "</div>";
     }$count++;
       if($count==6){
     	  $count=0;
}
   }echo "</tr>";
   
    echo "</table>";

?>
</section>
 

 <footer>
  <style type="text/css">
    #table{
      position: absolute;
      top: 7%;
      left: 10%;
      font-size: 90%;
    }
    .tr{
      position: relative;
      left:80%;
    }
    #label{
      position: absolute;
      top: 4%;
      left: 3%;
      font-size: 70%;
      
    }
    #s{
      font-size: 150%;
      color: black;
      font-weight: bolder;

    }
  </style>
      <table id="table" cellspacing="">
        <tr class="tr"><td><img src="place.png" width="2%" height="2%">&nbsp&nbsp No12 Ahmadu Bello way Nassarawa, Kano State, Nigeria</td></tr>
         <tr class="tr"><td><img src="phone.png" width="2%" height="2%">&nbsp&nbsp +256 755923076</td></tr>
          <tr class="tr"><td><img src="contact.png" width="2%" height="2%">&nbsp&nbsp asmis@yahoo.com</td></tr>
       </table>
       <label id="label"><strong id="s">ABOUT US</strong><br><br>ASMIS system is basically a consultancy platform for farmers in need for particular consultation<br> in their farming activities, and the other is agricultural products sects for farmers that may buy<br> their desired Products from this platform. Using this system the agency (KNARDA) officials will<br> digitally manage their certain activities efficiently. </label>
    </footer>

 </div>
 </body>
</html>
