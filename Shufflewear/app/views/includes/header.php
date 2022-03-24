<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/stuff.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/footer.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/Home.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/reset.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <title><?php echo SITENAME; ?></title>
</head>

<body>

 
  
  <!-- Background image -->

  <header style=" position: sticky !important; margin-top: 30px;">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white">
      <button
        class="navbar-toggler"
        type="button"
        data-mdb-toggle="collapse"
        data-mdb-target="#navbarExample01"
        aria-controls="navbarExample01"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <i class="fas fa-bars"></i>
      </button>
     
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="/Shufflewear/Home">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/Shufflewear/Mens">Mens</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/Shufflewear/Womens">Womens</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/Shufflewear/Auction">Auction</a>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <?php
            if (isLoggedIn()) {
            echo '<li class="nav-item"><a class="nav-link" href="/Shufflewear/Login/logout"><i class="fa-solid fa-sign-out"></i> Logout  '.'</a></li>';
            echo '<li class="nav-item"><a class="nav-link" href="/Shufflewear/Profile/index "><i class="fa-solid fa-user-plus"></i>Account </a></li>';
        } 
            else {
            echo '<li class="nav-item"><a class="nav-link" href="/Shufflewear/Login/index "><i class="fa-solid fa-user-plus"></i>Login </a></li>
                <li class="nav-item"><a class="nav-link" href="/Shufflewear/Login/register"><i class="fa-solid fa-right-to-bracket"></i>Sign Up</a></li>';
            }
            ?>
        </ul>
    </div>
  </nav>
  <!-- Navbar -->
</header>
