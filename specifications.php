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
    <!-- Modal update user details -->
    <div class="modal fade" id="update_client_specifications" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="close" name="button">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title" id="modalLabel">Update Client Specifications</h4>
            <div class="modal-body">
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
                  <!-- <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-info btn-block">Update</button>
                  </div> -->
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" name="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
              <button type="button" name="button" class="btn btn-primary" data-dismiss="modal">Save Changes</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php include('./include/footer.php') ?>
