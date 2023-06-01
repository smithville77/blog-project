<?php

echo " debug statement";
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


  echo "Post ID: $postId<br>";
  echo "User ID: $userId<br>";

  if ($result->num_rows > 0) {
    // Delete the post
    $deleteSql = "DELETE FROM posts WHERE id = ?";
    $deleteStmt = $conn->prepare($deleteSql);
    $deleteStmt->bind_param("i", $postId);
    $deleteStmt->execute();
    $deleteStmt->close();

    // Redirect to the home page or any other desired location
    header("Location: ../home.php?delete=success");
    exit();
  } else {
    // The user is not authorized to delete the post
    header("Location: ../home.php?error=unauthorized");
    exit();
  }
} else {
  // Invalid request or user not logged in
  header("Location: ../signup.php");
  exit();
}
?>
