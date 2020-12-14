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
              <h1 class="title-single">Create a free account</h1>
            </div>
          </div>
          <div class="col-md-12 col-lg-4">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="index.php">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  Register
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section><!-- End Intro Single-->

    <!-- ======= Contact Single ======= -->
    <section class="contact">
      <div class="container">
        <div class="row">

          <div class="col-sm-12">
            <div class="row">
              <div class="col-md-7">
                <?php
                //get database connection

                if ($_POST) {
                  //set user property values
                  $users->name=$_POST['name'];
                  $users->email=$_POST['email'];
                  $users->contact=$_POST['contact'];
                  $users->role=$_POST['role'];
                  $users->username=$_POST['username'];
                  $users->password=$_POST['password'];
                  $confirm=$_POST['confirm'];
                  // $hash=password_hash($users->password);
                  if ($users->isEmail($users->email)) {
                    // code...
                    echo "<div class='alert alert-danger'>Email is already in use!!</div>";
                    // return;
                  }
                  else if ($users->isUsername($users->email)) {
                    // code...
                    echo "<div class='alert alert-danger'>Username is already in use!!</div>";
                    // return;
                  }
                  //register users
                  else if ($users->register()) {
                    echo "<div class='alert alert-success'>You have been registered successfully!!</div>";
                  }
                  else {
                    echo "<div class='alert alert-danger'>An error occured while creating your account!!</div>";
                  }
                }
                 ?>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" >
                  <div class="row">
                    <div class="col-md-12 mb-3">
                      <div class="form-group">
                        <input type="text" name="name" class="form-control form-control-lg form-control-a" placeholder="Name">
                        <div class="validate"></div>
                      </div>
                    </div>
                    <div class="col-md-12 mb-3">
                      <div class="form-group">
                        <input type="email" name="email" class="form-control form-control-lg form-control-a" placeholder="Email">
                        <div class="validate"></div>
                      </div>
                    </div>
                    <div class="col-md-12 mb-3">
                      <div class="form-group">
                        <input type="text" name="contact" class="form-control form-control-lg form-control-a" placeholder="Contact">
                        <div class="validate"></div>
                      </div>
                    </div>
                    <div class="col-md-12 mb-3">
                      <div class="form-group">
                        <select  class="form-control form-control-lg form-control-a" name="role">
                          <option>Role</option>
                          <option>Architect</option>
                          <option>Client</option>
                        </select>
                        <div class="validate"></div>
                      </div>
                    </div>
                    <div class="col-md-12 mb-3">
                      <div class="form-group">
                        <input type="text" name="username" class="form-control form-control-lg form-control-a" placeholder="Username">
                        <div class="validate"></div>
                      </div>
                    </div>
                    <div class="col-md-12 mb-3">
                      <div class="form-group">
                        <input type="password" name="password" class="form-control form-control-lg form-control-a" placeholder="Password" data-rule="minlen:6" data-msg="Please enter at least 8 characters">
                        <div class="validate"></div>
                      </div>
                    </div>
                    <div class="col-md-12 mb-3">
                      <div class="form-group">
                        <input type="password" name="confirm" class="form-control form-control-lg form-control-a" placeholder="Confirm Password" data-rule="minlen:6" data-msg="Please enter at least 6 characters">
                        <div class="validate"></div>
                      </div>
                    </div>
                    <div class="col-md-12 text-center">
                      <button type="submit" class="btn btn-a btn-block">Register</button>
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
