<?php

echo "debug statement";
session_start();
if (isset($_GET['id']) && isset($_SESSION['userId'])) {
  require 'connect.inc.php';

  $postId = $_GET['id'];
  $userId = $_SESSION['userId'];

  $postId = intval($postId);
  $userId = intval($userId);

  // Check if the user is authorized to delete the post
  $sql = "SELECT * FROM posts WHERE id = ? AND idUsers = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ii", $postId, $userId);
  $stmt->execute();
  $result = $stmt->get_result();

 
  
    // in both editProfile and deletePost, I had issues with pathing to delete the image from the server when it's also been removed from the database. Breaking down the file path ($target_dir) and concatenating it with the basename from the database gave me a bit more control to make sure it would be removed correctly.
  $row = $result->fetch_assoc();
  $imageToDelete = $row['imageUrl'];

  $target_dir =  "../images/";
  $target_file = $target_dir . basename($imageToDelete);


  //check if $imageToDelete was set
    if (!empty($imageToDelete)) {
        // Check if the file exists
        if (file_exists($target_file)) {
          //delete file from server
          unlink($target_file); 
        }
    }



//debugging
  // echo "Post ID: $postId <br>";
  // echo "User ID: $userId <br>";

  if ($result->num_rows > 0) {
    // Delete the post from DB.
    $deleteSql = "DELETE FROM posts WHERE id = ?";
    $deleteStmt = $conn->prepare($deleteSql);
    $deleteStmt->bind_param("i", $postId);
    $deleteStmt->execute();

    $deleteStmt->close();
    
    // redirect to the home page with success
    header("Location: ../index.php?delete=success");
    exit();
  } else {
    // the user is not authorized to delete the post
    header("Location: ../index.php?error=unauthorized");
    exit();
  }
} else {
  // Invalid request or user not logged in
  header("Location: ../signup.php");
  exit();
}
$stmt->close();
$result->close();
?>
