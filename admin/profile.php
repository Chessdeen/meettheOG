<?php include "../includes/db.php";?>
<?php include "../includes/functions.php";?>

<?php
ob_start();
session_start();

if(!isset($_SESSION['email'])) {
    
    redirect("../login.php");
    
}



?>

<?php
if(isset($_POST['submit'])) {
    
     
     $firstname = $_POST['firstname'];
     $lastname = $_POST['lastname'];
     $username = $_POST['username'];
     $email = $_POST['email'];
     
    $connection = mysqli_connect('localhost', 'safeygwt_ade_codes', 'Zayb1010.', 'safeygwt_ade');
    if($connection) {
        //  echo $email;
         header("Location: profile.php");
    } else {
        die("Database connection failed");
    }
    
    $query = "INSERT INTO cohort WHERE email = $_SESSION[id] (firstname, lastname, username, email) ";
    $query .= "VALUES ('$firstname', '$lastname', '$username', '$email')";
    
   $result = mysqli_query($connection, $query);
    
    if(!$result) {
        
        die('Query FAILED' . mysqli_error());
        
    }
}

?>

<!doctype html>
<html lang="en">
  <head>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Ade Codes">
    <meta name="generator" content="Cohort v.1.0">
    <title>Cohort Dashboard v.1.0</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <link rel="canonical" href="https://ade.codes/web-dev">
    
    <!-- Favicon -->	
	<link rel="icon" type="image/png" href="../images/ade.png"/>
    

    <script src="https://kit.fontawesome.com/552e0e7386.js" crossorigin="anonymous"></script>

<link href="../css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
      .resource {
          color: red;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="../css/dashboard.css" rel="stylesheet">
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">Web-Dev</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="logout.php"><i class="fa fa-fw fa-power-off"></i></a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
          
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <span data-feather="layers" class="align-text-bottom"></span>
              My Projects
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="conference.php">
              <span data-feather="file-text" class="align-text-bottom"></span>
              Conference rooms
            </a>
          </li>
          
        </ul>
        
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted ">
          <span><?php  echo strtoupper(get_user_name()); ?> </span>
          <i class="fa-solid fa-gear"></i>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item ">
            <a class="nav-link disabled" href="profile.php">
              <span data-feather="users" class="align-text-bottom"></span>
              My Profile
            </a>
          </li>
          </ul>
       
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">My Profile</h1>
        
      </div>

      
      <div class="table-responsive">
         <form action="profile.php" method="post" class="row g-3">
          <div class="col-md-4">
            <label for="" class="form-label">First name</label>
            <input type="text" class="form-control " id="" placeholder="First Name" name="firstname" required>
          </div>
          <div class="col-md-4">
            <label for="" class="form-label">Last name</label>
            <input type="text" class="form-control " id="" placeholder="Last Name" name="lastname" required>
          
          </div>
          <div class="col-md-4">
            <label for="" class="form-label">Username</label>
            <div class="input-group ">
              <span class="input-group-text" id="inputGroupPrepend3">@</span>
              <input type="text" class="form-control" id="" aria-describedby="inputGroupPrepend3" name="username" placeholder="username" required>
            </div>
          </div>
          
          
          <div class="col-12">
            <button class="btn btn-primary" type="submit" name="submit">Edit Profile</button>
          </div>
        </form>
      </div>
          <div class="container">
  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <div class="col-md-4 d-flex align-items-center">
      <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
        <img src="../images/ade.png" alt="logo" width="42px" height="30">
      </a>
      <span class="mb-3 mb-md-0 text-muted">Web Dev &copy; <?php echo date("Y"); ?></span>
    </div>

    <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
      <li class="ms-3"><a class="text-muted" href="https://twitter.com/Adebest_pro"><i class="fa-brands fa-twitter"></i></a></li>
      <li class="ms-3"><a class="text-muted" href="https://www.linkedin.com/in/Ade Codes"><i class="fa-brands fa-linkedin-in"></i></a></li>
      <li class="ms-3"><a class="text-muted" href="https://github.com/Chessdeen"><i class="fa-brands fa-github"></i></a></li>
      
    </ul>
  </footer>
</div>
    </main>
  </div>
</div>


    <script src="../js/bootstrap.bundle.min.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="../js/dashboard.js"></script>
      
  </body>
</html>
