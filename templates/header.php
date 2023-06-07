<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUD web application</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Handlee&family=Mukta:wght@300&display=swap" rel="stylesheet">
  
  

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/1b9b34e027.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>


  <nav class="navbar sticky-top bg-dark text-light" id="navbar">
    <div class="container-fluid">

      <a class="navbar-brand text-light" href="./index.php">Salt&Pepper</a>

     

      <container id="btn-container">
        <?php if(isset($_SESSION['userId'])): ?> 

           <!-- conditionally render navbar buttons depending on if $_SESSION superglobal is set. () -->
          <a href="./includes/logout.inc.php" class="btn btn-large text-light">LOGOUT</a>
          <p>|</p>
          <a href="./profile.php" class="btn btn-large text-light">PROFILE</a>

        <?php else: ?>

          <a href="./login.php" class="btn btn-large text-light">LOGIN</a>

        <?php endif; ?>
        
        
        <!-- <p>⟡</p> -->
        <p>|</p>

         <!-- conditionally render navbar buttons depending on if $_SESSION superglobal is set. () -->
        <?php if(isset($_SESSION['userId'])): ?> 

        <a href="./signup.php" class="btn btn-large text-light d-none">SIGN UP</a>
        

        <?php else: ?>
          <a href="./signup.php" class="btn btn-large text-light ">SIGN UP</a>
          <p>|</p>
        <?php endif; ?>

        <a class="btn btn-large text-light">ABOUT</a>
      </container>
      

    </div>
  </nav>
  <script>
 
</script>
<script src="./transition.js" defer></script>
<script src="https://kit.fontawesome.com/1b9b34e027.js" crossorigin="anonymous"></script>
</body>
