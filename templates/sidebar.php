


<sidebar class="profile-sidebar d-none d-md-flex">
<?php

if(isset($_SESSION['userId'])) {
  echo '<h4>Welcome, ' . $_SESSION['userUid'] . '</h4>';
} else {
  echo '<h4>Welcome </h4>';
}

?>



<div class="image-placeholder">IMAGE GOES HERE</div>

  <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Culpa dolorem cupiditate ducimus quidem ullam quo eum voluptatem neque quasi nihil.</p>
  <hr class="line-break">
</sidebar>