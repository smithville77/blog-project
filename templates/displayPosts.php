



<?php 

include './includes/connect.inc.php';

$sql = "SELECT * FROM posts";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $title = $row['title'];
    $review = $row['review'];
    $imageUrl = $row['imageUrl'];
    $postId = $row['id'];
    $postUserId = $row['idUsers'];

    // Prepared statement to get the username associated with the posted review
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
    echo '<p>posted by: ' . $username . '&nbsp; &nbsp; </p> || &nbsp; &nbsp; <p><em>Date: 01-01-1970</em></p>';
    echo '</div>';
    echo '<p class="user-review">' . $review . '</p>';

    $postUserId = intval($postUserId);
    $userId = intval($userId);
    if (isset($_SESSION['userId']) && $_SESSION['userId'] == $userId) {
      echo '<div class="card-btn-container">';
      echo '<button class="btn btn-primary m-1">EDIT</button>';
      echo '<a href="includes/deletePost.inc.php?id=' . $postId . '" class="btn btn-danger m-1">DELETE</a>';
      echo '</div>';
    }

    echo '</div>';
    echo '</div>';
    echo '</div>';
  }
} 
    // var_dump($userId);
    // var_dump($postUserId);
    // var_dump($userRow['idUsers']);

$conn->close();
?>
