<?php include('./include/header.php');

  $stmt=$clients->viewSpecifications($user_id);
  $num=$stmt->rowCount();
 ?>
  <main id="main">

    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
      <div class="container">
        <div class="row">

          <div class="col-md-12 col-lg-8">

            <div class="">
                <a href="add_specifications.php" class="btn btn-info">Add New Specification</a>
              <h4 class="mt-3">Your specifications</h4>
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
    <section>
      <div class="container">
        <div class="row">
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Building Type</th>
                <th scope="col">Budget</th>
                <th scope="col">Location</th>
                <th scope="col">Description</th>
                <th scope="col">Starting Date</th>
                <th scope="col">Expected Completion</th>
                <th colspan="2">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php if ($num > 0): ?>
                <?php while($row=$stmt->fetch(PDO::FETCH_ASSOC)): ?>
                  <?php extract($row); ?>
                <tr>
                  <th scope="row"><?php echo $id ?></th>
                  <td><?php echo $building_type ?></td>
                  <td style="color:green">Ksh.<?php echo $budget ?></td>
                  <td><?php echo $location ?></td>
                  <td><?php echo $description ?></td>
                  <td><?php echo $starting_date ?></td>
                  <td><?php echo $expected_completion ?></td>
                  <td><a class="btn btn-primary" href="#">Edit</a> <a class="btn btn-danger" href="#">Delete</a></td>
                </tr>
              <?php endwhile; ?>
              <?php else: ?>
                  <tr>
                    <td><p class="text-danger">There are no matching records..</p></td>
                  </tr>


              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </section>


  </main><!-- End #main -->

  <?php include('./include/footer.php') ?>
