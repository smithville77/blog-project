



<?php 

include './includes/connect.inc.php';

//Select all posts in "posts" table

$sql = "SELECT * FROM posts";
$result = $conn->query($sql);

// loop and display all posts from db.

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $title = $row['title'];
    $review = $row['review'];
    $imageUrl = $row['imageUrl'];
    $postId = $row['id'];
    $postUserId = $row['idUsers'];
    $postCreatedAt = $row['created_at'];

    // Prepared statement to get the username associated with the posted review
    $userSql = "SELECT uidUsers, idUsers FROM users WHERE idUsers = ?";
    $userStmt = $conn->prepare($userSql);
    $userStmt->bind_param("i", $postUserId);
    $userStmt->execute();
    $userResult = $userStmt->get_result();

    //check if the username exists
    if ($userResult->num_rows > 0) {
      $userRow = $userResult->fetch_assoc();
      $username = $userRow['uidUsers'];
      $userId = $userRow['idUsers'];
    } else {
      $username = "Error, no username found";
    }


    echo '<div class="col-12 col-sm-12 col-xl-6">';
    echo '<div class="card-container">';
    // container for the image, sitting on top of the description container
    echo '<div class="img-placeholder">';
    echo '<img src="' . $imageUrl . '" alt="Image">';
    echo '</div>';
    //container that has two child containers, one sitting left ("title-review-sect") and one sitting right ("user-date-sect")
    echo '<div class="description">';
    //section with title and review, this should sit left inside the "description" container
    echo '<div class="title-review-sect">';
    echo '<h4>' . $title . '</h4>';
    echo '<p class="user-review">' . $review . '</p>';
    echo '</div>';
    // section container with username and posted-date, on right side of "description" container
    echo '<div class="user-date-sect">';
    echo '<p>posted by: ' . $username . '</p>'; 
    echo '<p><em>' . date('F j, Y', strtotime($postCreatedAt)) . '</em></p>';
    if (isset($_SESSION['userId']) && $_SESSION['userId'] == $userId) {
      $postUserId = intval($postUserId);
      $userId = intval($userId);
      echo '<div class="card-btn-container">';
      echo '<a href="editPost.php?id=' . $postId . '" class="btn m-1"><i class="fa-solid fa-pen-to-square"></i></a>';
      echo '<a href="includes/deletePost.inc.php?id=' . $postId . '" class="btn m-1"><i class="fa-solid fa-trash"></i></a>';
      echo '</div>';
    }
    echo '</div>';

    

    // if there is a user logged in, and that $_SESSION['userId'] matches the id of $postUserId (which is the id of the user that created the post), the delete and edit buttons will be visible on that post.

    
    

    echo '</div>';
    echo '</div>';
    echo '</div>';
  }
} 

// testing variable output at the end of this code block
    // var_dump($userId);
    // var_dump($postUserId);
    // var_dump($userRow['idUsers']);

$conn->close();
?>
