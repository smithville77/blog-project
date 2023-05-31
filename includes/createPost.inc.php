

<?php
error_reporting(E_ALL);

session_start();
if (isset($_POST['post-submit']) && isset($_SESSION['userId'])) {

  require 'connect.inc.php';

  $title = $conn->real_escape_string($_POST['title']);
  $review = $conn->real_escape_string($_POST['review']);

  if (empty($title) || empty($review)) {
    header("Location: ../createPost.php?error=emptyfields");
    exit();
  }

  // Code to upload image with checks
  if (isset($_FILES['imageUrl'])) {

    $target_dir = "./img/";
    $target_file = $target_dir . basename($_FILES['imageUrl']["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    

    if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
    }

    // if ($_FILES["imageUrl"]["size"] > 500000) {
    //   echo "Sorry, your file is too large.";
    //   $uploadOk = 0;
    // }

    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
    }

    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
    } else {
      if (move_uploaded_file($_FILES["imageUrl"]["tmp_name"], $target_file)) {
       

        $sql = "INSERT INTO posts (id, title, review, imageUrl, idUsers) VALUES (NULL, ?, ?, ?, ?);";
        $stmt = $conn->prepare($sql);

        if (!$stmt) {
          header("Location: ../createPost.php?error=sqlerror");
          exit();
        }

        $stmt->bind_param("ssbi", $title, $review, $imageUrl, $_SESSION['userId']);
        $stmt->execute();
        $stmt->close();

        header("Location: ../home.php?post=success");
        exit();

        echo "The file " . htmlspecialchars(basename($_FILES["imageUrl"]["name"])) . " has been uploaded.";
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }
  }

  $conn->close();
}
?>


