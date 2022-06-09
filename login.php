<?php 

include 'config.php';

error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
    header("Location: utama.php");
}

if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM users WHERE username='$email' AND password='$password'";
  $result = mysqli_query($conn, $sql);
  if ($result->num_rows > 0) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['username'] = $row['username'];
    header("Location: utama.php");
  } else {
    echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
  }
}

?><!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
   <link rel="stylesheet" href="css/loker.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }
  </style>
</head>
<body>


<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">LOKER</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Home</a></li>
       
        <li><a href="#">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"> Login</a></li>
            <li><a href="#"> daftar</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="jumbotron bgdepan1">s
 <div class="container text-center">
  <h1>LOKER</h1>      
    <p>WUJUDKAN IMPIAN DAN CITA-CITAMU</p>
     Bersama Loker mari membangun Negeri
 </div>
</div>

<div class="alert alert-warning" role="alert">
    <?php echo $_SESSION['error']?>
  </div>
<div class="container">
<div class="row col-xs-3 col-md-4"></div>
<div class="col-xs-8 col-md-4 kotak2">
  <form action="" method="POST" class="form-signin">
        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
        <label for="inputEmail" class="sr-only">Usarname</label>
        <input name="email" type="text" id="" class="form-control" placeholder="Usarname" required autofocus>
        <div class="clear" style="margin-bottom: 5px;"></div>
        <label for="inputPassword" class="sr-only">Password</label>
        <input name ="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox mb-2">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign in</button>
        <p class="mt-5 mb-3 text-muted">© 2017-2020</p>
    </form>
</div>




 
 
  
















</body>
</html>
