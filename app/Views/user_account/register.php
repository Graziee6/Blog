<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <title>Register</title>
</head>
<body class="bg-dark">
    <div class="container">
        <div class="d-flex flex-row mt-2 justify-content-between">
            <img src="<?php echo base_url('assets/images/people.svg');?>" alt="image not visible" class="img-responsive col-5">

            <div class="col-6 border p-5 bg-white">
                <h1>Sign Up</h1>
                <?php if(isset($validation)):?>
                    <div class="alert alert-danger"><?=$validation->listErrors()?></div>
                <?php endif;?>
                <form action="/Register/save" method="POST">
                    <div class="mb-3">
                        <label for="InputForName" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="InputForName" value="<?= set_value('name') ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="InputForEmail" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" id="InputForEmail" value="<?= set_value('email') ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="InputForPassword" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="InputForPassword" required>
                    </div>
                    <div class="mb-3">
                        <label for="InputForConfPassword" class="form-label">Confirm Password</label>
                        <input type="password" name="confpassword" class="form-control" id="InputForConfPassword">
                    </div>

                    <div class="mb-3 form-group">
                        <h4 class="p-2">Location</h4>
                        <select  onchange="getSectors(event)" class="form-select" aria-label="select district" name="district">
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
                        <select name="sector" id="sector" class="form-select" name="sector">
                                <option selected value="#">--select sector--</option>
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
                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
                <p>Have an account? <a href="http://localhost/Login">login</a></p>
            </div>
        </div>
    </div>
    <script>
         function getSectors(ev){
            id = ev.target.value 
            sectors = document.getElementsByClassName("sectors")
            for (let i = 1; i < sectors.length; i++) {
                    sectors[i].style.display = 'none'
            }
            
            for (let i = 1; i < sectors.length; i++) {
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