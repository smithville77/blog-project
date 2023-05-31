<?php
  session_start();
  if (isset($_POST['post-submit']) && isset($_SESSION['userId'])) {

    require 'connect.inc.php';


    $title =  $conn->real_escape_string($_POST['title']);
    $review = $conn->real_escape_string($_POST['review']);
    $imageUrl = $conn->real_escape_string($_POST['imageUrl']);
    


    if (empty($title) || empty($review) || empty($imageUrl)) {
      header("Location: ../createPost.php?error=emptyfields");
      exit();
    }

    $sql = "INSERT INTO posts (id, title, review, imageUrl, idUsers) VALUES (NULL, ?, ?, ?, ?);";

    $stmt = $conn->prepare($sql);

      if(!$stmt) {
        header("Location: ../createPost.php?error=sqlerror");
        exit();
      } 

    
    $stmt->bind_param("sssi", $title, $review, $imageUrl, $_SESSION['userId']);
    $stmt->execute();

    header("Location: ../home.php?post=success");
    exit();

    $stmt->close();
    $conn->close();

  }


	

?>