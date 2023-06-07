<?php require './templates/header.php' ?> 
<?php include './templates/optionsBar.php' ?>

<?php 
require './includes/connect.inc.php';
$userId = $_SESSION['userId'];

$query = "SELECT * FROM profiles WHERE idUsers = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();
$profile = $result->fetch_assoc();
$stmt->close();





?>

<form action="./includes/editProfile.inc.php" method="POST" enctype="multipart/form-data">
  <div class="content-structure">
  <?php include './templates/sidebar.php' ?>
    <div class="container-header-main">


      <div>
        <div class="row">
          <div class="form">
            <h3> Edit Profile </h3>

            <!-- // note: opening brace for the if statement STARTS here -->
            <?php if ($profile) {
              
                $biography = $profile['biography'];
                $previousImageUrl = $profile['profileImageUrl'];
               ?>
              <div class="mb-3">
                <label for="biography" class="form-label">Biography</label>
                <textarea id="biography" type="textarea" class="form-control" name="biography" placeholder="Write something about yourself!"><?php echo $biography; ?></textarea>
              </div>

              <div class="mb-3">
                <label for="profileUrl" class="form-label">Select a profile picture:</label>
                <input type="file" class="form-control" name="profileUrl">
               
              </div>
              <!-- php else tag -->
            <?php } else { ?>
              <div class="mb-3">
                <label for="biography" class="form-label">Biography</label>
                <textarea id="biography" type="textarea" class="form-control" name="biography" placeholder="Write something about yourself!"></textarea>
              </div>

              <div class="mb-3">
                <label for="profileUrl" class="form-label">Select a profile picture:</label>
                <input type="file" class="form-control" name="profileUrl">
              </div>
              <!-- php closing tag -->
              <?php } ?>

              <button type="submit" name="profile-submit" class="btn btn-primary w-50">Submit profile</button>

          </div>
        </div>
      </div>
    </div>  
   <?php include './templates/newsBar.php' ?>
  </div> 
</form>