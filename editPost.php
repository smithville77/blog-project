
<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);
     ?>
    <?php require './templates/header.php' ?> 
    <?php include './templates/optionsBar.php' ?>





  <div class="content-structure">
  <?php include './templates/sidebar.php' ?>
    <div class="container-header-main">
      <?php include './templates/bannerDisplay.php' ?>
    <?php
    
    // var_dump($_SESSION['userId']);
    // var_dump($_GET['id']);
    
    if(isset($_SESSION['userId']) && isset($_GET['id'])) {
      

      require './includes/connect.inc.php';

      $row;

      $id = $conn->real_escape_string(($_GET['id']));
      $id = intval($id);

      // var_dump($id);

      $sql = "SELECT title, review, imageUrl FROM posts WHERE id=?";

      $stmt = $conn->prepare($sql);

      if(!$stmt) {
        header("Location: editPost.php?id=" . $id . "&error=sqlerror"); 
        exit();
      } else {
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        // var_dump($row);
      }

    } else {
      header("Location: index.php");
      exit();
    }
   
    ?>

    <?php
    
    if(isset($_GET['error'])){
      
      if($_GET['error'] == "emptyfields"){
        $errorMsg = "Please fill in all fields";
 
      } else if ($_GET['error'] == "sqlerror") {
        $errorMsg = "An internal server error has occurred - please try again later";
      }

      echo '<div class="alert alert-danger" role="alert">' . $errorMsg . '</div>';
  
    }
    
  ?>
    


      <div class="row">
            <div class="form">
              
            <form action="includes/editPost.inc.php?id=<?php echo $_GET['id']; ?>" method="POST">

                
              <main class="container p-4 bg-dark text-light mt-3 >" id="edit-form">
        
              <h2>Edit Post</h2>

      
              <div class="mb-3">
                <label for="title" class="form-label">Title:</label>
                <input type="text" class="form-control" name="title" placeholder="Title.." value="<?php echo $row['title'] ?>">
              </div>  

  
         
              <div class="mb-3">
                <label for="review" class="form-label">Review</label>
                <textarea id="review-text" type="textarea" class="form-control" name="review" placeholder="Enter your review" value=""><?php echo $row['review'] ?></textarea>
              </div>

             

              
              <div class="mb-3">
                <label for="imageUrl" class="form-label">Select image to upload: </label>
                <input type="file" class="form-control" name="imageUrl" placeholder="file.." value="<?php echo $row['imageUrl'] ?>">
              </div>

              
              <button type="submit" name="edit-submit" class="btn btn-primary w-50">Edit review</button>
            </form>
          </main>
          </form>
        </div>
      </div>
    
   
  
    </div>

<?php include './templates/newsBar.php' ?>
