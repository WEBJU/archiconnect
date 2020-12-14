<?php include('./include/header.php'); ?>
  <main id="main">

    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
      <div class="container">
        <div class="row">

          <div class="col-md-12 col-lg-8">

            <div class="">
                <a href="specifications.php" class="btn btn-info">View Specifications</a>
              <h4 class="mt-3">Add New specification</h4>
            </div>

          </div>
          <div class="col-md-12 col-lg-4">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="#">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  Specifications
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
            $clients->user_id=$_SESSION['user_id'];
            $clients->building_type=$_POST['building_type'];
            $clients->budget=$_POST['budget'];
            $clients->location=$_POST['location'];
            $clients->description=$_POST['description'];
            $clients->starting_date=$_POST['starting_date'];
            $clients->expected_completion=$_POST['expected_completion'];

            if ($clients->addSpecification()) {
                  echo "<div class='alert alert-success'>New specifications added successfully!!</div>";
          }else {
                  echo "<div class='alert alert-danger'>Could not create new specifications!!</div>";
              }
            }
           ?>
          <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])  ?>" method="post">
            <div class="row">
              <div class="col-md-12 mb-3">
                <div class="form-group">
                  <label for="">Building Type</label>
                <select name="building_type" class="form-control">
                  <option>Commercial</option>
                  <option>Residential</option>
                  <option>Business</option>
                  <option>Educational</option>
                </select>
                </div>
              </div>
              <div class="col-md-12 mb-3">
                <div class="form-group">
                  <label for="">Building Location</label>
                  <input type="text" name="location" class="form-control" placeholder="Location">
                  <div class="validate"></div>
                </div>
              </div>
              <div class="col-md-12 mb-3">
                <div class="form-group">
                  <label for="">Your Budget</label>
                  <input name="budget" type="text" class="form-control" placeholder="Budget">
                  <div class="validate"></div>
                </div>
              </div>
              <div class="col-md-12 mb-3">
                <div class="form-group">
                  <label for="">Expected start date</label>
                  <input type="date" name="starting_date" class="form-control">
                  <div class="validate"></div>
                </div>
              </div>
              <div class="col-md-12 mb-3">
                <div class="form-group">
                  <label for="">Expected end date</label>
                  <input type="date" name="expected_completion" class="form-control">
                  <div class="validate"></div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="">Description</label>
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
