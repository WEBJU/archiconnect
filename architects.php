<?php include('./include/header.php');
$stmt=$users->architects();
$num=$stmt->rowCount();
 ?>
  <main id="main">

    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box">
              <h4>Our Amazing Architects Portfolio Highlights</h4>
            </div>
          </div>
          <div class="col-md-12 col-lg-4">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="#">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  Architects Grid
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section><!-- End Intro Single-->

    <section>
      <div class="container">
        <div class="row pb-5 mb-4">
          <?php if ($num > 0): ?>
          <?php while($row= $stmt->fetch(PDO::FETCH_ASSOC)): ?>
            <?php extract($row); ?>
        <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
            <!-- Card-->
            <div class="card rounded shadow-sm border-0">
                <div class="card-body p-4"><img src="designs/<?php echo $image ?>" alt="" class="img-fluid d-block mx-auto mb-3">
                    <h5> <a href="#" class="text-dark"><?php echo $title ?></a></h5>
                    <p class="small text-muted font-italic"><?php echo $description ?></p>
                    <p class="small text-muted font-italic">Designed by <?php echo $name ?></p>
                    <ul class="list-inline small">
                        <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                        <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                        <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                        <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                        <li class="list-inline-item m-0"><i class="fa fa-star-o text-success"></i></li>
                    </ul>
                </div>
            </div>
        </div>

          <?php endwhile; ?>
          <?php else: ?>
            <div class="col-md-12">
              <p class="text-danger">There are no architects with portfolio to view</p>

            </div>
          <?php endif; ?>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <?php include('./include/footer.php') ?>
