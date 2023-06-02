


<sidebar class="profile-sidebar d-none d-md-flex">
<?php
require './includes/connect.inc.php';

if(isset($_SESSION['userId'])) {
  echo '<h4 class="welcome-header">Welcome, ' . $_SESSION['userUid'] . '</h4>';
} else {
  echo '<h4 class="welcome-header">Welcome To Salt&Pepper</h4>';
  echo '<a href="./signup.php" class="btn welcome-btn text-light">SIGN UP</a>';

  // Rest of the code in the else statement to be shown only when no user is logged in
  echo '<hr class="line-break">';
  echo '<p>Made by Smithville77</p>';
  echo '<p>Github</p>';
  echo '<a href="https://github.com/smithville77"><img src="./github-mark/github-mark-white.svg"></a>';
}

if(isset($_SESSION['userId'])) {
  $userId = $_SESSION['userId'];

  $sql = 'SELECT * FROM profiles WHERE idUsers = ?';

  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $userId);
  $stmt->execute();
  $result = $stmt->get_result();
  $profile = $result->fetch_assoc();

  $stmt->close();

  $imagePath = './pfp/' . basename($profile['profileImageUrl']);

  if (!empty($profile['profileImageUrl'])) {
    echo '<img src="' . $imagePath . '" alt="Profile Image" class="image-placeholder"></img>';
  } else {
    echo '<p>No profile image available</p>';
  }

  echo '<hr class="line-break">';
  echo '<p>Bio:</p>';
  echo '<p class="bio">' . $profile['biography'] . '</p>';
  echo '<hr class="line-break">';
  echo '<p>Made by Smithville77</p>';
  echo '<p>Github</p>';
  echo '<a href="https://github.com/smithville77"><img src="./github-mark/github-mark-white.svg"></a>';
}

echo '</sidebar>';
?>
