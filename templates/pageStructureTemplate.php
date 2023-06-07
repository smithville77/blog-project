<?php require './templates/header.php' ?> 
<?php include './templates/optionsBar.php' ?>



<!-- template that has the navbar, profile sidebar and news sidebar, with the createPost button -->
<form action="" method="">
  <container class="content-structure">
  <?php include './templates/sidebar.php' ?>
    <div class="container-header-main">
      <?php include './templates/bannerDisplay.php' ?>

      <div>
        <div class="row">
          <div class="form">
            <h3> Sign Up </h3>
          </div>
        </div>
      </div>
    </div>  
   <?php include './templates/newsBar.php' ?>
  </container> 
</form>