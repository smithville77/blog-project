<?php include './templates/header.php' ?>
<?php include './templates/optionsBar.php' ?>

<?php require './includes/connect.inc.php' ?>
<?php require './includes/signup.inc.php' ?>



<container class="content-structure">
  <?php include './templates/sidebar.php' ?>

  <div class="container-header-main">
  <?php include './templates/bannerDisplay.php' ?>


  <?php
    if(isset($_SESSION['userId'])) {
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 250px; position: absolute; top: 110px; right: 20px;">
      You are logged in!
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    else
    {
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert" style="width: 250px; position: absolute; top: 200px; right: 20px;">You are not logged in
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    }
    
  ?>

  <div>
  <div class="row">
    
    <?php require './templates/displayPosts.php'; ?>
  
  </div>
</div>


    </div>
   
      <?php include './templates/newsBar.php' ?>
  
    </container>

   
  </div>
 
  </container>