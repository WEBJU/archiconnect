
<?php
include('./include/header.php');
?>

  <main id="main">
    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box">
              <h6 class="title-single">Use your details to login</h6>
            </div>
          </div>
          <div class="col-md-12 col-lg-4">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="index.html">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  Login
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section><!-- End Intro Single-->

    <!-- ======= Login Single ======= -->
    <section class="contact justify-content-center">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="row">
              <div class="col-md-7">
                <?php
                //get database connection
                if ($users->isLoggedIn() !="") {
                  echo "<script>document.location='index.php'</script>";
                }
                if (!empty($_POST)) {
                  //set user property values
                  $users->username=$_POST['username'];
                  $users->password=$_POST['password'];
                  // $hash=password_hash($users->password);
                  //register users
                  $user_id=$users->login($users->username,$users->password);
                  if ($user_id > 0) {
                    $_SESSION['username']=$users->username;
                    $_SESSION['user_id']=$user_id;

                    echo "<div class='alert alert-success'>You have loggedIn successfully!!</div>";
                    $users->redirect('index.php');

                  }
                  else {
                    // $error="Username or password incorrect!!";
                    echo "<div class='alert alert-danger'>Username or password incorrect</div>";

                  }
                }
                 ?>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" onsubmit="return loginValidatiion()">
                  <div class="row">

                    <div class="col-md-12 mb-3">
                      <div class="form-group">
                        <input type="text" name="username" class="form-control form-control-lg form-control-a" placeholder="Username">
                        <div class="validate"></div>
                      </div>
                    </div>
                    <div class="col-md-12 mb-3">
                      <div class="form-group">
                        <input type="password" name="password" class="form-control form-control-lg form-control-a" placeholder="Password" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject">
                        <div class="validate"></div>
                      </div>
                    </div>
                    <div class="col-md-12 text-center">
                      <button type="submit" class="btn btn-a btn-block">Login</button>
                    </div>
                  </div>
                </form>
              </div>

            </div>
          </div>
        </div>
      </div>
    </section><!-- End Contact Single-->

  </main><!-- End #main -->

  <?php include('./include/footer.php') ?>
