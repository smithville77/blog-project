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
    <div class="col-12 col-sm-12 col-xl-6">
      <div class="card-container">
      <div class="img-placeholder">
            <h3>Image goes here</h3>
        </div>
        <div class="description">

          <h4>title...</h4>
          <div class="user-date-sect">
            <p>posted by: Adam1991 &nbsp; &nbsp; </p> || &nbsp; &nbsp; <p><em>Date: 01-01-1970</em></p>
            
          </div>
          <p class="user-review">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi illum magni, molestiae architecto sequi nobis doloremque sapiente quasi quos eum quibusdam ex aut adipisci. Voluptatem porro dolore eum aliquid deserunt!</p>
          <div class="card-btn-container">
            <button class="btn btn-primary m-1">EDIT</button>
            <button class="btn btn-danger m-1">DELETE</button>
          </div>

        </div>
      </div>
    </div>
    <div class="col-12 col-sm-12 col-xl-6">
      <div class="card-container">
      <div class="img-placeholder">
            <h3>Image goes here</h3>
        </div>
        <div class="description">

          <h4>title...</h4>
          <div class="user-date-sect">
            <p>posted by: Adam1991 &nbsp; &nbsp; </p> || &nbsp; &nbsp; <p><em>Date: 01-01-1970</em></p>
            
          </div>
          <p class="user-review">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi illum magni, molestiae architecto sequi nobis doloremque sapiente quasi quos eum quibusdam ex aut adipisci. Voluptatem porro dolore eum aliquid deserunt!</p>
          <div class="card-btn-container">
            <button class="btn btn-primary m-1">EDIT</button>
            <button class="btn btn-danger m-1">DELETE</button>
          </div>

        </div>
      </div>
    </div>
    <div class="col-12 col-sm-12 col-xl-6">
      <div class="card-container">
      <div class="img-placeholder">
            <h3>Image goes here</h3>
        </div>
        <div class="description">

          <h4>title...</h4>
          <div class="user-date-sect">
            <p>posted by: Adam1991 &nbsp; &nbsp; </p> || &nbsp; &nbsp; <p><em>Date: 01-01-1970</em></p>
            
          </div>
          <p class="user-review">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi illum magni, molestiae architecto sequi nobis doloremque sapiente quasi quos eum quibusdam ex aut adipisci. Voluptatem porro dolore eum aliquid deserunt!</p>
          <div class="card-btn-container">
            <button class="btn btn-primary m-1">EDIT</button>
            <button class="btn btn-danger m-1">DELETE</button>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>


    </div>
   
      <?php include './templates/newsBar.php' ?>
  
    </container>

   
  </div>
 
  </container>