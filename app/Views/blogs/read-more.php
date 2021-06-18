<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css');?>">
    <title>Medium</title>
    <style>
    .bg-purple{
        background-color:#333;
    }
    .sidebar-logo {
  height: 80px;
  /* max-width:10%; */
  position: relative;
  /* padding: 10px 1px; */
  /* display: flex; */
  align-items: center;
  justify-content: center;
  }
  
  .sidebar-logo img {
  height: 50px;
  max-width: 100%;
  }
  .profile-image {
    width:45px;
    height:45px;
    border-radius: 10px;
}
    </style>
    <?php

        use App\Models\BlogModel;
use App\Models\CommentsModel;

$session = session();
        $id = $session->getFlashdata('blogId');
        $blogModel = new BlogModel();
        $blog = $blogModel->getRow($id);
    ?>
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-light bg-purple">
  <a class="navbar-brand text-white h4" href="#">
   <div class="sidebar-logo">
    <img src=<?php echo base_url('assets/aimages/logo-lg.png');?> alt="Comapny logo">
  </div>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link text-light" href="/Dashboard">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light" href="/Blog">blogs</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light" href="/register/updateAccount">account</a>
      </li>
    </ul>
  </div>
  <!-- <a class="btn btn-primary" href="/Login/logout">logout</a> -->
  <img src=<?php echo base_url('assets/images/people.svg');?> class="profile-image">
</nav>
    <div class="container-fluid d-flex flex-column align-items-center mt-5">
        <div class="card w-75 p-5 mb-3">
            <div class="card-body">
                <h1 class="card-title"><?php echo $blog['blogTitle']?></h1>
                <h6 class="card-subtitle mb-2 text-muted"><?=$blog['blogDescription']?></h6>
                <p class="card-text"><?=$blog['blogContent']?> </p>
            </div>
        <a href="/Blog/generatePDF" class="btn btn-primary w-25">Download</a>
        </div>
        <div class="comments w-75 d-flex flex-column">
            <h4 style="color: purple;">Comments</h4>
        <?php
            $model = new CommentsModel();
            $allComments = $model->getCommentsByBlog($id);
            if(!empty($allComments)):
                foreach ($allComments as $comment) {   
        ?>
            <div class="border p-3 rounded-2 mt-1 rounded align-self-end" style="width: 95%;">
                <?=$comment->commentBody?>
            </div>
        <?php
                }
            endif;
        ?>
        </div>
        <?php
            $session = session();
            if(($session->user_id == $blog['writerId']) == false){
        ?>
        <form class="w-75 d-flex flex-column" action="/Comments/create/<?=$id?>" method="POST">
                <?php if(isset($validation)):?>
                    <div class="alert alert-danger"><?=$validation->listErrors()?></div>
                <?php endif;?>
            <textarea name="comment" id="comment" cols="30" placeholder="Add comment...." value="<?=old('comment')?>" rows="5" class="w-100 p-2"></textarea>
            <button class="btn mt-2 bg-purple w-25 text-white">comment</button>
        </form>
        <?php
            }
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</body>
</html>