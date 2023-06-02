

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

    $target_dir = "../images/";
    $uploadOk = 1;
    $the_message = "";
    $the_message_ext = "";

    

    $phpFileUploadErrors = array(
      0 => 'There is no error, the file uploaded with success',
      1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
      2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
      3 => 'The uploaded file was only partially uploaded',
      4 => 'No file was uploaded',
      6 => 'Missing a temporary folder',
      7 => 'Failed to write file to disk.',
      8 => 'A PHP extension stopped the file upload.',
    ); 

    $temp_name =$_FILES['imageUrl']['tmp_name'];
    $target_file = $_FILES['imageUrl']['name'];

    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $my_url = $target_dir . $target_file;
    $relativePath = str_replace('../images/', './images/', $my_url);




    $maxSize = 1024 * 1024 * 2;    
    $imageFileSize = $_FILES['imageUrl']['size'];
    $imageFileMimeType = "";


    if (file_exists($temp_name) && filesize($temp_name) > 0) {
      // Get the MIME type using finfo
      $finfo = finfo_open(FILEINFO_MIME_TYPE);
      $imageFileMimeType = finfo_file($finfo, $temp_name);
      finfo_close($finfo);
    } else {
      $the_message_ext = "Invalid file.";
      $uploadOk = 0;
    }

    $the_error = $_FILES['imageUrl']['error'];
    if($_FILES['imageUrl']['error'] != 0){
      $the_message_ext = $phpFileUploadErrors[$the_error];
      $uploadOk = 0;
    }


    if($the_message_ext == "" && file_exists($my_url)){
      $the_message_ext = "The file already exists.";
      $uploadOk = 0;
    }


    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
    }

    if($the_message_ext == "" && $imageFileMimeType != "image/jpg" && $imageFileMimeType != "image/gif" && $imageFileMimeType != "image/jpeg" && $imageFileMimeType != "image/png") {
      $the_message_ext = "File is not an accepted image type";
      $uploadOk = 0;
    }

    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded." . $the_message_ext;
    } else {


//debugging
      var_dump($target_dir);
      var_dump($target_file);
      var_dump(is_writable($target_dir));


      if (move_uploaded_file($temp_name, $target_dir . $target_file)) {
        $the_message = "<p>File Uploaded Successfully. " . 'Preview it: <a href="' . $my_url . '" target="_blank">' . $my_url . '</a></p>';
      
        $sql = "INSERT INTO posts (id, title, review, imageUrl, idUsers, created_at) VALUES (NULL, ?, ?, ?, ?, NOW());";
        $stmt = $conn->prepare($sql);
      
        if (!$stmt) {
          header("Location: ../createPost.php?error=sqlerror");
          exit();
        }
      
        $stmt->bind_param("sssi", $title, $review, $relativePath, $_SESSION['userId']);
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


