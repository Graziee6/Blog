<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <title>change password</title>
</head>
<body>
    <div class="container d-flex flex-column align-items-center h-100 bg-light">
    <h1>Change Password</h1>
    <form action="/Password/saveNewPassword" method="POST" class="h-100 w-75  d-flex flex-column align-items-center">
    <?php 
        if (session()->getFlashdata('msg')) :
    ?>
        <div class="alert alert-danger"><?=session()->getFlashData('msg')?></div>
    <?php
        endif;
    ?> 
      <?php if(isset($validation)):?>
                <div class="alert alert-danger"><?=$validation->listErrors()?></div>
            <?php endif;?>
        <div class="form-group">
            <input class="mt-5 p-2 rounded w-100" type="password" name="password" id="password" placeholder="enter password">
        </div>
        <div class="form-group">
            <input type="password" class="mt-3 p-2 rounded mb-4" name="confPassword" id="confPassword" placeholder="confirm password">
        </div>
        
        <input type="submit" value="change password" class="btn btn-success w-50 mt-3 p-2 rounded mb-4">
    </form>
    </div>
</body>
</html>