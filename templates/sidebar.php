


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

  
// conditionally render the profile bar.
// if there is no one signed in - render a signup button
// if user is logged in but hasn't created a profile - render a button that leads to the create Profile page
// if user is signed in and has created a profile - render the profile image and bio
  if(empty($profile['profileImageUrl']) && empty($profile['biography'])) {
    echo '<p>Looks like you haven\'t created your profile yet, click <a href="./profile.php" class="btn btn-light">here</a> to create one.</p>';
  } 


  if (!empty($profile['profileImageUrl'])) {
    $imagePath = './pfp/' . basename($profile['profileImageUrl']);
    echo '<img src="' . $imagePath . '" alt="Profile Image" class="image-placeholder"></img>';

    if(!empty($profile['biography'])) {
      echo '<hr class="line-break">';
      echo '<p>Bio:</p>';
      echo '<p class="bio">' . $profile['biography'] . '</p>';
      echo '<hr class="line-break">';
      echo '<p>Made by Smithville77</p>';
      echo '<p>Github</p>';
      echo '<a href="https://github.com/smithville77"><img src="./github-mark/github-mark-white.svg"></a>';
    } else {
      echo '<hr class="line-break">';
      echo '<p>Made by Smithville77</p>';
      echo '<p>Github</p>';
      echo '<a href="https://github.com/smithville77"><img src="./github-mark/github-mark-white.svg"></a>';
    }


  } else {

  
}
}
echo '</sidebar>';
?>
