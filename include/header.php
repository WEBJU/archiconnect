<?php include('./include/config.php');
include('./functions/users.php');
include('./functions/architects.php');
include('./functions/clients.php');
session_start();
$database=new Database();
$db=$database->getConnection();
//pass connection to objects
 $architects=new Architects($db);
 $users=new Users($db);
 $clients=new Clients($db);
 // $user_id= $_SESSION['user_id'];
 // $user_details=$users->userDetails($_SESSION['user_id']);
 if (isset($_SESSION['user_id'])) {
 $user_id=$_SESSION['user_id'];
 $user_details=$users->userDetails($user_id);
 $user_role=$user_details->role;
 }

  ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>ArchiConnect - Index</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Property Search Section ======= -->
  <div class="click-closed"></div>
  <!--/ Form Search Star /-->
  <div class="box-collapse">
    <div class="title-box-d">
      <h3 class="title-d">Search Architects</h3>
    </div>
    <span class="close-box-collapse right-boxed ion-ios-close"></span>
    <div class="box-collapse-wrap form">
      <form class="form-a">
        <div class="row">
          <div class="col-md-12 mb-2">
            <div class="form-group">
              <label for="Type">Keyword</label>
              <input type="text" class="form-control form-control-lg form-control-a" placeholder="Keyword">
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group">
              <label for="Type">Building Specialization</label>
              <select class="form-control form-control-lg form-control-a" id="Type">
                <option>All Type</option>
                <option>Residential</option>
                <option>Commercial</option>
                <option>Educational</option>
                <option>Industrial</option>
                <option>Storage</option>
              </select>
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group">
              <label for="city">Location</label>
              <select class="form-control form-control-lg form-control-a" id="city">
                <option>All City</option>
                <option>Nairobi</option>
                <option>Kisumu</option>
                <option>Mombasa</option>
                <option>Kwanza</option>
                <option>Voi</option>
                <option>Nyeri</option>
                <option>Kajiado</option>
              </select>
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group">
              <label for="bedrooms">Min Price</label>
              <select class="form-control form-control-lg form-control-a" id="bedrooms">
                <option>Any</option>
                <option>Ksh.3m</option>
                <option>Ksh.1m</option>
                <option>Ksh.3m</option>
              </select>
            </div>
          </div>
          <div class="col-md-12">
            <button type="submit" class="btn btn-b">Search Architects</button>
          </div>
        </div>
      </form>
    </div>
  </div><!-- End Property Search Section -->>

  <!-- ======= Header/Navbar ======= -->
  <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
    <div class="container">
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <a class="navbar-brand" href="index.php">Archi<span class="color-b">Connect</span></a>
      <button type="button" class="btn btn-link nav-search navbar-toggle-box-collapse d-md-none" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-expanded="false">
        <span class="fa fa-search" aria-hidden="true"></span>
      </button>
      <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" href="index.php">Home</a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
          </li> -->
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="architects.php">Architects</a>
          </li>
          <?php if ($users->isLoggedIn()==""): ?>
          <li class="nav-item">
            <a class="nav-link" href="register.php">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
          </li>
          <?php else: ?>
            <?php if($user_role == 'Architect'): ?>
              <li class="nav-item">
                <a class="nav-link" href="my_portfolio.php">My Portfolio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="sample_design.php">My Designs</a>
              </li>
            <?php else: ?>
              <li class="nav-item">
                <a class="nav-link" href="specifications.php">My Specifications</a>
              </li>
              <!-- <li class="nav-item">
                <a class="nav-link" href="property-grid.php">Architects</a>
              </li> -->
            <?php endif; ?>
            <li class="nav-item">
              <a class="nav-link">Welcome,<?php echo $_SESSION['username']; ?></a>
            </li>

            <li class="nav-item text-danger">
              <a class="nav-link" class="text-danger" href="logout.php">Logout</a>
            </li>
            <?php endif; ?>
        </ul>
      </div>
      <button type="button" class="btn btn-b-n navbar-toggle-box-collapse d-none d-md-block" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-expanded="false">
        <span class="fa fa-search" aria-hidden="true"></span>
      </button>
    </div>
  </nav><!-- End Header/Navbar -->
