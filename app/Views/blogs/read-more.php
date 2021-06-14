<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css');?>">
    <title>Medium</title>
    <?php

        use App\Models\BlogModel;
        $session = session();
        $id = $session->getFlashdata('blogId');
        $blogModel = new BlogModel();
        $blog = $blogModel->getRow($id);
    ?>
</head>
<body class="bg-light">
<div class="container-fluid bg-purple shadow-sm">
        <div class="container pb-2 pt-2 d-flex justify-content-between">
            <div class="text-white h4">Medium</div>
            <a class="btn btn-primary" href="/Login/logout">logout</a>
        </div>
    </div>
    <div class="bg-white shadow-sm">
    <div class="container">
    <div class="row">
    <nav class="nav nav-underline">
    <div class="nav-link">blogs / View blog</div>
    </nav>
    </div>
    </div>
    </div>
    <div class="container-fluid d-flex flex-column align-items-center mt-5">
        <div class="card w-75 p-5 mb-3">
            <div class="card-body">
                <h1 class="card-title"><?=$blog['blogTitle']?></h1>
                <h6 class="card-subtitle mb-2 text-muted"><?=$blog['blogDescription']?></h6>
                <p class="card-text"><?=$blog['blogContent']?> </p>
            </div>
        <a href="/Blog/generatePDF" class="btn btn-primary w-25">Download</a>
        </div>
            <textarea name="comment" id="comment" cols="30" rows="10" class="w-75"></textarea>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</body>
</html>