<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/navStyle.css">
    <title>navbar</title>
</head>
<body>
<?php 

?>
<div class="topnav">
  <a href="../pages/informations.php">Generate CV</a>
  <!-- <a href="../pages/profile.php">Profile</a> -->
  <a href="../pages/aboutUS.php">About US</a>
  <?php if(isset($_SESSION['user'])){ ?>
    <a href="../pages/logout.php">Logout</a>
  <?php  }else{ ?>
  
    <a href="../pages/login.php">Login</a>
  <?php  
  } ?>
</div>

</body>
</html> 