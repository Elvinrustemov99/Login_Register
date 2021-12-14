<?php include('header.php'); ?>
<?php include ('register-process.php'); ?>

<?php session_start();
  if (!isset($_SESSION['id']) && !isset($_SESSION['email'])) {
?>
<!-- registration area -->
<section id="register">
  <div class="row m-0">
    <div class="col-lg-4 offset-lg-2">
      <div class="text-center pb-5">
        <h1 class="login-title text-dark">Register</h1>
        <p class="p-1 m-0 font-ubuntu text-black-50">Register and enjoy additional features</p>
        <span class="font-ubuntu text-black-50">I already have <a href="login.php">Login</a></span>
      </div>
      
      <div class="upload-profile-image d-flex justify-content-center pb-5">
        <div class="text-center">
          <div class="d-flex justify-content-center">
            <img class="camera-icon" src="./assets/camera-solid.svg" alt="camera">
          </div>
          
          <img src="./assets/profile/beard.png" style="width: 200px; height: 200px" class="img rounded-circle"
               alt="profile">
          <small class="form-text text-black-50">Choose Image</small>
          <input type="file" form="reg-form" class="form-control-file" name="profile" id="upload-profile">
        </div>
      </div>
      
      <?php if ($error):?>
        <div class="alert alert-danger" role="alert">
          <?=$error?>
        </div>
      <?php endif; ?>
      
      <div class="d-flex justify-content-center">
        <form action="" method="post" enctype="multipart/form-data" id="reg-form">
          <div class="form-row">
            <div class="col">
              <input type="text" name="firstname" value="<?php if (isset($_POST['firstname'])) echo $_POST['firstname'];?>" id="firstname" class="form-control" placeholder="First Name">
            </div>
            
            <div class="col">
              <input type="text" name="lastname" value="<?php if (isset($_POST['lastname'])) echo $_POST['lastname'];?>" id="lastName" class="form-control" placeholder="Last Name">
            </div>
          </div>

          <div class="form-row my-4">
            <div class="col">
              <input type="email" name="email" value="<?php if (isset($_POST['email'])) echo $_POST['email'];?>" id="email" class="form-control" placeholder="Email*">
            </div>
          </div>

          <div class="form-row my-4">
            <div class="col">
              <input type="password" name="password1" id="password1" class="form-control" placeholder="password*">
            </div>
          </div>

          <div class="form-row my-4">
            <div class="col">
              <input type="password" name="password2" id="password2" class="form-control" placeholder="Confirm Password*">
              <small id="confirm_error" class="text-danger"></small>
            </div>
          </div>

          <div class="form-check form-check-inline">
            <input type="checkbox" name="agreement" class="form-check-input" required>
            <label for="agreement" class="form-check-label font-ubuntu text-black-50">I agree <a href="#">term, conditions, and policy </a>(*) </label>
          </div>

          <div class="submit-btn text-center my-5">
            <button type="submit" name="register" class="btn btn-warning rounded-pill text-dark px-5">Continue</button>
          </div>


        </form>
      </div>
    </div>
  </div>
</section>
<!-- #registration area -->

<?php
  }else {
    header("Location: index.php");
  }
?>

<?php
// footer.php
include('footer.php');
?>