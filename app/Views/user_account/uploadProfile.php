<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>upload Profile</title>
</head>
<body>
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