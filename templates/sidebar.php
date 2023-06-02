


<sidebar class="profile-sidebar d-none d-md-flex">
<?php
require './includes/connect.inc.php';
// conditionally render the welcome with username if they are logged in
if(isset($_SESSION['userId'])) {
  echo '<h4>Welcome, ' . $_SESSION['userUid'] . '</h4>';
} else {
  echo '<h4>Welcome </h4>';
}

  $userId = $_SESSION['userId'];

  $sql = 'SELECT * FROM profiles WHERE idUsers = ?';

  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $userId);
  $stmt->execute();
  $result = $stmt->get_result();
  $profile = $result->fetch_assoc();

  $stmt->close();


  $imagePath = './pfp/' . basename($profile['profileImageUrl']);
// var_dump($profile); // seems like profile img path is incorrect

  if (!empty($profile['profileImageUrl'])) {
    echo '<img src="' . $imagePath . '" alt="Profile Image" class="image-placeholder"></img>';
  } else {
    echo '<p>No profile image available</p>';
  }

echo '<hr class="line-break">';
echo '<p>Bio:</p>';
echo '  <p class="bio">' . $profile['biography']   . '</p>';
echo '<hr class="line-break">';
echo '</sidebar>';

?>