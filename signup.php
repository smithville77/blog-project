<?php require './templates/header.php' ?> 
<?php include './templates/optionsBar.php' ?>



<?php
if (isset($_GET['error'])) {
    $displayError = "";

    if ($_GET['error'] === "emptyfields") {
        $displayError = "Please make sure all fields have been filled out.";
    } elseif ($_GET['error'] === "invalidemail") {
        $displayError = "Sorry, you have entered an incorrect email format.";
    } elseif ($_GET['error'] === "invalidusername") {
        $displayError = "Sorry, that username contains illegal characters.";
    } elseif ($_GET['error'] === "passwordmismatch") {
        $displayError = "Sorry, you have entered passwords that do not match.";
    }

    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert" style="width: 250px; position: absolute; top: 100px; right: 20px;">' . $displayError . '
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}
?>


    <container class="content-structure">
    <?php include './templates/sidebar.php' ?>

      <div class="container-header-main">
      <?php include './templates/bannerDisplay.php' ?>
        <div>
          <div class="row">
            <div class="form">
              
              <form action="includes/signup.inc.php" method="POST">

                
              <main class="container p-4 bg-dark text-light mt-3 >" id="signup-form">
              <h3> Sign Up </h3>
      

      
              <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" name="uid" placeholder="Username" value="<?php echo isset($_GET['uid']) ? $_GET['uid'] : ''; ?>">
              </div>  

              <!-- displays error message next to incorrect or empty fields -->
              <?php if(isset($_GET['error']) && $_GET['error'] === 'emptyfields') {
                echo '<span class="alert alert-danger mt-1 w-100 error-message"> Please enter a username.  </span>';
              } ?>

              
              <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" name="mail" placeholder="Email Address" value="<?php echo isset($_GET['mail']) ? $_GET['mail'] : ''; ?>">
              </div>

              <?php if(isset($_GET['error']) && $_GET['error'] === 'emptyfields') {
                echo '<span class="alert alert-danger mt-1 w-100 error-message"> Please enter a valid email address.  </span>';
              } ?>

              
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input id="password-input" type="password" class="form-control" name="pwd" placeholder="Password">
              </div>

              <div id="password-valid" class="d-none">
                <div id="uppercase-label">Password must contain atleast 1 uppercase letter</div>
                <div id="number-label">Password must contain atleast 1 number</div>
                <div id="length-label">Password must be at least 8 characters long</div>
                

              </div>

              
              <div class="mb-3">
                <label for="password" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="pwd-repeat" placeholder="Confirm Password">
              </div>

              
              <button type="submit" id="signup-btn" name="signup-form-submit" class="btn btn-primary w-50">Signup</button>
            </form>
          </main>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php include './templates/newsBar.php' ?></container>
