<?php include "header.php"; ?>
<?php include "login-process.php"; ?>

<?php
if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
  ?>
  <section id="main-site">
    <div class="container py-5">
      <div class="row">
        <div class="col-4 offset-4 shadow py-4">
          <div class="upload-profile-image d-flex justify-content-center pb-5">
            <div class="text-center">
              <img class="img rounded-circle" style="width: 200px; height: 200px;"
                   src="<?php echo isset($user['profileImage']) ? $user['profileImage'] : './assets/profile/beard.png'; ?>"
                   alt="">
              <h4 class="py-3">
                <?= isset($_SESSION['firstname']) ? $_SESSION['firstname'] : null ?>
              </h4>

            </div>
          </div>

          <div class="user-info px-3">
            <ul class="font-ubuntu navbar-nav">
              <li class="nav-link"><b>First
                  Name: </b><span><?= isset($_SESSION['firstname']) ? $_SESSION['firstname'] : null; ?></span></li>
              <li class="nav-link"><b>Last
                  Name: </b><span><?= isset($_SESSION['lastname']) ? $_SESSION['lastname'] : null; ?></span></li>
              <li class="nav-link">
                <b>Email: </b><span><?= isset($_SESSION['email']) ? $_SESSION['email'] : null; ?></span></li>
            </ul>
          </div>

          <div class="submit-btn text-center my-5">
            <button type="submit" class="btn btn-warning rounded-pill text-dark px-4"><a href="logout.php">Logout</a>
            </button>
          </div>

        </div>
      </div>
    </div>
  </section>
  
  <?php
} else {
  header('location: login.php');
}
?>

<?php
include "footer.php";
?>