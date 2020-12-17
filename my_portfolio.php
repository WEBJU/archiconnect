<?php include('./include/header.php');
$stmt=$architects->viewPortfolio($user_id);
$num=$stmt->rowCount();
 ?>
  <main id="main">

    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
      <div class="container">
        <div class="row">

          <div class="col-md-12 col-lg-8">

            <div class="">
                <a href="add_portfolio.php" class="btn btn-info">Add New Portfolio</a>
              <h4 class="mt-3">Your portfolio</h4>
            </div>

          </div>
          <div class="col-md-12 col-lg-4">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="#">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  portfolio
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
                <th scope="col">Specialization</th>
                <th scope="col">Experience</th>
                <th scope="col">Availability status</th>
                <th scope="col">Rate</th>
                <th scope="col">Title Description</th>
                <th colspan="2">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php if ($num > 0): ?>
                <?php while($row=$stmt->fetch(PDO::FETCH_ASSOC)): ?>
                  <?php extract($row); ?>
                <tr>
                  <th scope="row"><?php echo $id ?></th>
                  <td><?php echo $specialization ?></td>
                  <td><?php echo $experience ?></td>
                  <td><?php echo $availability_status ?></td>
                  <td style="color:green">Ksh.<?php echo $rate ?></td>
                  <td><?php echo $title_description ?></td>
                  <td><button class="btn btn-primary" id="<?php echo $id ?>">Edit</button> <button class="btn btn-danger" id="<?php echo $id ?>">Delete</button></td>
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
