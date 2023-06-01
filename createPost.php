


   <?php require './templates/header.php' ?> 
<?php include './templates/optionsBar.php' ?>




    <container class="content-structure">
    <?php include './templates/sidebar.php' ?>

      <div class="container-header-main">
      <?php include './templates/bannerDisplay.php' ?>
        <div>
          <div class="row">
            <div class="form">
              
              <form action="includes/createPost.inc.php" method="POST" enctype="multipart/form-data">
                
              <main class="container p-4 bg-dark text-light mt-3 >" id="signup-form">
              <h3> Write a new review: </h3>
      

      
              <div class="mb-3">
                <label for="title" class="form-label">Title:</label>
                <input type="text" class="form-control" name="title" placeholder="Title.." value="<?php echo isset($_GET['uid']) ? $_GET['uid'] : ''; ?>">
              </div>  

  
         
              <div class="mb-3">
                <label for="review" class="form-label">Review</label>
                <textarea id="review-text" type="textarea" class="form-control" name="review" placeholder="Enter your review"></textarea>
              </div>

             

              
              <div class="mb-3">
                <label for="imageUrl" class="form-label">Select image to upload: </label>
                <input type="file" class="form-control" name="imageUrl" placeholder="file..">
              </div>

              
              <button type="submit" name="post-submit" class="btn btn-primary w-50">Post review</button>
            </form>
          </main>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php include './templates/newsBar.php' ?></container>