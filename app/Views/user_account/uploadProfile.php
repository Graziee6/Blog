<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css');?>">
    <title>upload Profile</title>
<style>
      .sidebar-logo {
  height: 80px;
  /* max-width:10%; */
  position: relative;
  /* padding: 10px 1px; */
  /* display: flex; */
  align-items: center;
  justify-content: center;
  }
  .bg-purple{background:#333}
  .sidebar-logo img {
  height: 50px;
  max-width: 100%;
  }
</style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-purple">
    <a class="navbar-brand text-white h4" href="#">
    <div class="sidebar-logo">
    <img src="../assets/aimages/logo-lg.png" alt="Comapny logo">
  </div>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link text-light" href="/dashboard">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light" href="/Blog">blogs</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link text-light" href="/dashboard/viewProfile">profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light" href="/register/updateAccount">account</a>
      </li>
    </ul>
  </div>
  <a class="btn btn-primary" href="/Login/logout">logout</a>
</nav>
    <form action="/register/uploadProfile" method="post" enctype="multipart/form-data">
        <?php 
            if (isset($validation)) {
         ?>
            <div class="alert alert-message"><?=$validation->listErrors()?></div>
         <?php       
            }
        ?>
        <input type="file" name="profile" id="profile" accept="image/*">
        <input type="submit" value="upload profile">
    </form>
</body>
</html>