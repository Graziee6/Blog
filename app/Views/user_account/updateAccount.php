<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css');?>">
    <title>Update</title>
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
            <a class="nav-link text-light" href="#">Home </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="#">blogs</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="/register/updateAccount">account <span class="sr-only">(current)</span></a>
          </li>
        </ul>
      </div>
      <a class="btn btn-primary" href="/Login/logout">logout</a>
    </nav>
    <div class="container-fluid bg-light">
        <div class="d-flex flex-row justify-content-between">
            <div class="col-6 border p-5 bg-white">
                <h1>Update account</h1>
                <?php
                    $session = session();
                ?>
                <?php if(isset($validation)):?>
                    <div class="alert alert-danger"><?=$validation->listErrors()?></div>
                <?php endif;?>
                <form action="/register/update" method="POST">
                    <div class="mb-3">
                        <label for="InputForName" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="InputForName" value="<?=$session->user_name?>"  required>
                    </div>
                    <div class="mb-3">
                        <label for="InputForEmail" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" id="InputForEmail" value="<?=$session->user_email?>" required>
                    </div>
                    <div class="mb-3 form-group">
                        <h4 class="p-2">Location</h4>
                        <select  onchange="getSectors(event)" class="form-select" aria-label="select district" >
                            <option value="#">--select district--</option>
                            <?php
                                $db = db_connect();
                                $query= $db->query("select * from districts");
                                if($query){
                                    foreach ($query->getResult() as $district) {
                            ?>
                                <option value="<?=$district->districtId?>"><?=$district->districtName?></option>
                            <?php 
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3 form-group">
                        <select name="sector" id="sector" class="form-select">
                                <option value="#">--select sector--</option>
                            <?php 
                                $db = db_connect();
                                $query= $db->query("select * from sectors");
                                if($query){
                                    foreach ($query->getResult() as $sector) {
                            ?>
                                <option class="sectors <?=$sector->districtId?>" value="<?=$sector->sectorId?>"><?=$sector->sectorName?></option>
                            <?php
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Change</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        function getSectors(ev){
            id = ev.target.value 
            sectors = document.getElementsByClassName("sectors")
            for (let i = 0; i < sectors.length; i++) {
                    sectors[i].style.display = 'none'
            }
            for (let i = 0; i < sectors.length; i++) {
                if(sectors[i].className.includes(id)){
                    sectors[i].style.display='block'
                }
            }
        }
    </script>
    <!-- Popper.js first, then Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</body>
</html>