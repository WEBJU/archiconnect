<?php include('./include/header.php'); ?>
  <main id="main">

    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
      <div class="container">
        <div class="row">

          <div class="col-md-12 col-lg-8">

            <div class="">
                <a href="sample_design.php" class="btn btn-info">View Designs</a>
              <h4 class="mt-3">Add New Design</h4>
            </div>

          </div>
          <div class="col-md-12 col-lg-4">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="#">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  Designs
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
            $architects->title=$_POST['title'];
            $architects->sample_description=$_POST['description'];
            $architects->date_designed=$_POST['date_designed'];
            $image_name=$_FILES['image']['name'];
            $tmp_dir=$_FILES['image']['tmp_name'];
            $imgSize=$_FILES['image']['size'];
            $upload_dir='designs/';
            $imgExt=strtolower(pathinfo($image_name,PATHINFO_EXTENSION));
            $valid_extensions=array('jpeg','jpg','png','gif');
            $architects->image=rand(1000,1000000).".".$imgExt;

            if (in_array($imgExt,$valid_extensions)) {
              // check if file size is less than 5m
              if ($imgSize < 5000000) {
                move_uploaded_file($tmp_dir,$upload_dir.$architects->image);
              }else {
                echo "<div class='alert alert-danger'>image is too big!!</div>";
              }
            }else {
              echo "<div class='alert alert-danger'>image format not allowed!!</div>";
            }

            if ($architects->addSampleDesign()) {
                  echo "<div class='alert alert-success'>New design added successfully!!</div>";
            }else {
                  echo "<div class='alert alert-danger'>Could not create new design!!</div>";
              }
            }
           ?>
          <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])  ?>" method="post" enctype="multipart/form-data">
            <div class="row">

              <div class="col-md-12 mb-3">
                <div class="form-group">
                  <label for="">Building Title</label>
                  <input type="text" name="title" class="form-control" placeholder="The title of the project" required>
                  <div class="validate"></div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="">Description</label>
                  <textarea name="description" class="form-control" cols="45" rows="5" placeholder="Description your design" required></textarea>
                  <div class="validate"></div>
                </div>
              </div>
              <div class="col-md-12 mb-3">
                <div class="form-group">
                  <label for="">Upload Your Work</label><br>
                  <input name="image" type="file" required>
                  <div class="validate"></div>
                </div>
              </div>
              <div class="col-md-12 mb-3">
                <div class="form-group">
                  <label for="">Date Designed</label>
                  <input type="date" name="date_designed" class="form-control" required>
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
