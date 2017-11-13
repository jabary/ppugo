<?php 
session_start();
if(!isset($_SESSION['username'])){
  header("location:login.php");
}
require 'MyDb.php';

$mydb = new MyDb();

?>

<html>
<head>
  <title></title>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
   <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    
</head>

<body>



 <?php 
 require 'nav.php';
 ?>
  
<div class="row">

<div class="col-md-3">
      <div class="act">
      
          <div class='logo'>
         <a href="app.php"> <img src='treasure.png' /></a>
          
          </div>
      </div>
      
    </div>
    <div class="col-md-9 hidden-xs">
      <div class="act">
          <img alt="" src="map1.png">
      </div>
      
    </div>
 </div>
<div class="row">
    

    
    <div class="col-md-12">
      <div class="act1">

      <table class="table table-striped">
        <thead> <tr> <th>Player Id</th> <th>Tre Id</th><th>Name</th> <th>Mobile</th> <th>Latitude</th> <th>Longitude</th><th>Time</th><th>Received Gift</th><th>update</th>
        </tr> </thead>

      <?php 
      
      $rows = $mydb->getWinnerplayers();


      foreach ($rows as $player){

      ?>
      <tr>
        <td><?php echo $player['pid'];?></td>
        <td><?php echo $player['tid'];?></td>
        <td><?php echo $player['name'];?></td>
        <td><?php echo $player['mobile'];?></td>
        <td><?php echo $player['latitude'];?></td>
        <td><?php echo $player['longitude'];?></td>
        <td><?php echo $player['foundtime'];?></td>
        <td><?php echo $player['gift'];?></td>

        <td><a href='receivegift.php?id=<?php echo $player['pid'] ?>'>Receive Gift</a></td>
      </tr>
     
     
      <?php 
      }
      ?>
      </table>
           
      </div>
      
    </div>
  </div>

<div class=“row”> 

<div>
      <div class="act1">


</div>
</div>
</div>



<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>

