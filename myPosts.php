
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
    
  <?php


if (isset($_SESSION['userId'])) {
  include './includes/connect.inc.php';

  $loggedInUserId = $_SESSION['userId'];

  $sql = "SELECT * FROM posts WHERE idUsers = $loggedInUserId";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $title = $row['title'];
      $review = $row['review'];
      $imageUrl = $row['imageUrl'];
      $postId = $row['id'];
      $postUserId = $row['idUsers'];
      $postCreatedAt = $row['created_at'];

      
      $userSql = "SELECT uidUsers, idUsers FROM users WHERE idUsers = ?";
      $userStmt = $conn->prepare($userSql);
      $userStmt->bind_param("i", $postUserId);
      $userStmt->execute();
      $userResult = $userStmt->get_result();

      if ($userResult->num_rows > 0) {
        $userRow = $userResult->fetch_assoc();
        $username = $userRow['uidUsers'];
        $userId = $userRow['idUsers'];
      } else {
        $username = "Error, no username found";
      }

      echo '<div class="col-12 col-sm-12 col-xl-6">';
      echo '<div class="card-container">';
      echo '<div class="img-placeholder">';
      echo '<img src="' . $imageUrl . '" alt="Image">';
      echo '</div>';
      echo '<div class="description">';
      echo '<h4>' . $title . '</h4>';
      echo '<div class="user-date-sect">';
      echo '<p>posted by: ' . $username . '&nbsp; &nbsp; </p> || &nbsp; &nbsp; <p><em>posted on: ' . date('F j, Y', strtotime($postCreatedAt)) . '</em></p>';
      echo '</div>';

      echo '<p class="user-review">' . $review . '</p>';

      $postUserId = intval($postUserId);
      $userId = intval($userId);
      if (isset($_SESSION['userId']) && $_SESSION['userId'] == $userId) {
        echo '<div class="card-btn-container">';
      echo '<a href="editPost.php?id=' . $postId . '" class="btn m-1"><i class="fa-solid fa-pen-to-square"></i></a>';
      echo '<a href="includes/deletePost.inc.php?id=' . $postId . '" class="btn m-1"><i class="fa-solid fa-trash"></i></a>';
      echo '</div>';
    }

      echo '</div>';
      echo '</div>';
      echo '</div>';
    }
  } else {
    echo "<p>No posts found.</p>";
  }

  $conn->close();
} else {
  echo "<p>User not authenticated.</p>";
}
?>
  
  </div>
</div>


    </div>
   
      <?php include './templates/newsBar.php' ?>
  
    </container>

   
  </div>
 
  </container>



