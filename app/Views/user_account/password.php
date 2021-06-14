<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <title>Change Password</title>
</head>
<body>
    <?php 
        if (session()->getFlashdata('msg')):
    ?>
        <div class="alert alert-danger"><?=session()->getFlashdata('msg')?></div>
    <?php
        endif;
    ?>
    <form action="http://localhost/Password/changePassword" method="POST">
        <label for="email">Enter your email: </label>
        <input type="email" name="email" id="email">
        <input type="submit" value="verify email">
    </form>
</body>
</html>