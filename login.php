<?php include('header.php') ?>
<?php include('login-process.php');?>

<?php
  if (!isset($_SESSION['id']) && !isset($_SESSION['email'])){
?>
  <!-- registration area -->
  <section id="login-form">
    <div class="row m-0">
      <div class="col-lg-4 offset-lg-2">
        <div class="text-center pb-5">
          <h1 class="login-title text-dark">Login</h1>

          <p class="p-1 m-0 font-ubuntu text-black-50">Login and enjoy additional features</p>
          <span class="font-ubuntu text-black-50">Create a new <a href="register.php">account</a></span>
        </div>
        <div class="upload-profile-image d-flex justify-content-center pb-5">
          <div class="text-center">
            <img
              src="<?php echo isset($row['profile']) ? $row['profile'] : './assets/profile/beard.png'; ?>"
              style="width: 200px; height: 200px" class="img rounded-circle" alt="profile">
          </div>
        </div>
  
        <?php if ($error):?>
          <div class="alert alert-danger" role="alert" style="width: 250px; height: auto; margin: auto">
            <?=$error?>
          </div>
        <?php endif; ?>
        
        <div class="d-flex justify-content-center">
          <form action="login.php" method="post" enctype="multipart/form-data" id="log-form">

            <div class="form-row my-4">
              <div class="col">
                <input type="email" value="<?=isset($_POST['email']) ? $_POST['email'] : null?>" name="email" id="email" class="form-control" placeholder="Email*">
              </div>
            </div>

            <div class="form-row my-4">
              <div class="col">
                <input type="password" name="password" id="password" class="form-control"
                       placeholder="password*">
              </div>
            </div>

            <div class="submit-btn text-center my-5">
              <button type="submit" name="login" class="btn btn-warning rounded-pill text-dark px-5">Login</button>
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
