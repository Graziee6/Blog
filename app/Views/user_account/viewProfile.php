<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link  rel="stylesheet" href= "<?=base_url('assets/css/style.css')?>">
    <title>upload Profile</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-purple">
  <a class="navbar-brand text-white h4" href="#">Medium</a>
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
    <?php
        if (empty(session()->user_profile)) {
    ?>
        <h1 class="jumbotron">No profile</h1>
        <a href="http://localhost/register/profile" class="btn btn-primary">Upload Profile</a>
    <?php
        }else{
    ?>      
            <img src="<?=base_url('assets/images/profiles/'.session()->user_profile)?>" alt="profile">
            <a href="http://localhost/register/profile" class="btn btn-primary">update</a>
            <a href="http://localhost/register/deleteProfile" class="btn btn-primary">delete</a>
    <?php } ?>
</body>
</html>