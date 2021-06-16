<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <title>Document</title>
    <?php
        $session = session();
    ?>
</head>
<body>
    <h1>enter the code sent to your email</h1>
    <?php 
        if (session()->getFlashdata('msg')) :
    ?>
        <div class="alert alert-danger"><?=session()->getFlashData('msg')?></div>
    <?php
        endif;
    ?>  
    <form action="/Password/checkCode" method="POST">
        <input type="number" name="code" id="code">
        <input class="btn btn-primary" type="submit" value="send">
    </form>
</body>
</html>