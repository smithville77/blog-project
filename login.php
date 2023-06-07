<?php require './templates/header.php' ?> 
<?php include './templates/optionsBar.php' ?>


<?php
  if(isset($_GET['success']) && $_GET['success'] === "true") {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 250px; position: absolute; top: 100px; right: 20px;"> Success! You have signed up. Please log in to continue.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
  }

?>


  <container class="content-structure">
  <?php include './templates/sidebar.php' ?>
    <div class="container-header-main">
      <?php include './templates/bannerDisplay.php' ?>

      <div>
      <form action="includes/login.inc.php" method="POST">
                
        <main class="container p-4 bg-dark text-light mt-3 >" id="login-form">
        <h3>Login</h3>


          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" name="mailuid" placeholder="username" value="<?php echo isset($_GET['mailuid']) ? $_GET['mailuid'] : ''; ?>">
          </div> 
          
          <?php if(isset($_GET['error']) && $_GET['error'] === 'emptyfields') {
                echo '<span class="alert alert-danger mt-1 w-100 error-message"> Please enter a username.  </span>';
              } ?>
          
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input id="password-input" type="password" class="form-control" name="pwd" placeholder="Password">
          </div>

          <button type="submit" name="login-form-submit" class="btn btn-primary w-25">Login</button>

        </div>
      </div>
    </div>  
   <?php include './templates/newsBar.php' ?>
  </container> 
