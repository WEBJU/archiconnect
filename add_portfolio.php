<?php include('./include/header.php'); ?>
  <main id="main">

    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
      <div class="container">
        <div class="row">

          <div class="col-md-12 col-lg-8">

            <div class="">
                <a href="specifications.php" class="btn btn-info">View Portfolio</a>
              <h4 class="mt-3">Add New Portfolio</h4>
            </div>

          </div>
          <div class="col-md-12 col-lg-4">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="#">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  Portfolio
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section><!-- End Intro Single-->

    <section class="property-grid grid">
      <div class="container">
      <div class="row">
        <div class="col-md-7">
          <?php

            if ($_POST) {
            $architects->user_id=$_SESSION['user_id'];
            $architects->specialization=$_POST['specialization'];
            $architects->rate=$_POST['rate'];
            $architects->experience=$_POST['experience'];
            $architects->description=$_POST['description'];
            $architects->availability=$_POST['availability'];


            if ($architects->addPortfolio()) {
                  echo "<div class='alert alert-success'>New portfolio added successfully!!</div>";
          }else {
                  echo "<div class='alert alert-danger'>Could not create portfolio now!!</div>";
              }
            }
           ?>
          <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])  ?>" method="post">
            <div class="row">
              <div class="col-md-12 mb-3">
                <div class="form-group">
                  <label for="">Specialization</label>
                <select name="specialization" class="form-control">
                  <option>Commercial Building</option>
                  <option>Residential Buildings</option>
                  <option>Institutional Buildings</option>
                  <option>Business Buildings</option>
                </select>
                </div>
              </div>
              <div class="col-md-12 mb-3">
                <div class="form-group">
                  <label for="">Experience</label>
                  <input name="experience" type="text" class="form-control" placeholder="Your Experience in building industry">
                  <div class="validate"></div>
                </div>
              </div>
              <div class="col-md-12 mb-3">
                <div class="form-group">
                  <label for="">How much do you charge</label>
                <select name="rate" class="form-control">
                  <option>below Ksh.1m</option>
                  <option>Ksh.1m-Ksh.2m</option>
                  <option>Ksh.2m-Ksh.20m</option>
                  <option>Ksh.20m-Ksh.100m</option>
                  <option>above Ksh.100m</option>
                </select>
                </div>
              </div>
              <div class="col-md-12 mb-3">
                <div class="form-group">
                  <label for="">Availability Status</label>
                <select name="availability" class="form-control">
                  <option>Available</option>
                  <option>Not Available</option>
                  <option>Prefer not to say</option>
                </select>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="">Title Description</label>
                  <textarea name="description" class="form-control" cols="45" rows="5" placeholder="Description your building more"></textarea>
                  <div class="validate"></div>
                </div>
              </div>
              <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-info btn-block">Add Now</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    </section>
  </main><!-- End #main -->

  <?php include('./include/footer.php') ?>
