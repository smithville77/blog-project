<?php require './templates/header.php' ?> 
<?php include './templates/optionsBar.php' ?>




<form action="./includes/editProfile.inc.php" method="POST" enctype="multipart/form-data">
  <div class="content-structure">
  <?php include './templates/sidebar.php' ?>
    <div class="container-header-main">


      <div>
        <div class="row">
          <div class="form">
            <h3> Edit Profile </h3>

            <div class="mb-3">
                <label for="biography" class="form-label">Biography</label>
                <textarea id="biography" type="textarea" class="form-control" name="biography" placeholder="Write something about yourself!" value=""></textarea>
              </div>

             

              
              <div class="mb-3">
                <label for="profileUrl" class="form-label">Select a profile picture: </label>
                <input type="file" class="form-control" name="profileUrl">
              </div>

              <button type="submit" name="profile-submit" class="btn btn-primary w-50">Submit profile</button>

          </div>
        </div>
      </div>
    </div>  
   <?php include './templates/newsBar.php' ?>
  </div> 
</form>