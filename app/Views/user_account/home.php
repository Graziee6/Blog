<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous"> -->
    <link rel="stylesheet" href= "<?=base_url('assets/css/style.css')?>">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- <link rel="stylesheet" href="./assets/css/style.css"> -->
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <!-- <link rel="stylesheet" href="./assets/css/style.css"> -->
    <style>
    *{
    margin:0;
    padding:0;
    box-sizing:border-box;
}
@import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
body{
    font-family: 'Poppins', sans-serif;
}
.bg-purple{
  background-color:#3F3F3F;
}
.wrapper{
  width:1200px;
  margin:100px auto;
}
.blog{
  display:flex;
  flex-wrap:wrap;
  justify-content:space-between
}
.single-blog{
  flex-basis:390px;
  border:1px solid #eee;
}
.blog-img{
  position:relative;
  overflow:hidden;
}
.blog-img img{
  width:100%;
  transition:.3s;
}
.single-blog:hover .blog-img img{
  transform:scale(1.1)
}
.blog-img a{
  position:absolute;
  left:0;
  top:0;
  color:#fff;
  text-decoration:none;
  text-transform:capitalize;
  font-size:18px;
  background-color:#ff7720;
  padding:10px 30px;
}
.blog-info{
  width:80%;
  margin:0 auto;
  border:1px solid #ccc;
  position:relative;
  z-index:2;
  margin-top:-30px;
  padding:10px 5px;
  background-color:#fff;
  text-align:center;
}
.blog-info a{
  color:#333;
  text-decoration:none;
  margin:0 10px;
  display:inline-block
}
.blog-content{
  padding:20px;
}
.blog-content h4{
  font-size:22px;
  font-weight:600;
  text-transform:capitalize;
  border-bottom:1px dashed #eee;
  margin-bottom:10px;
  padding-bottom:5px;
}
.blog-content a{
  background-color:#ff7720;
  color:#fff;
  text-decoration:none;
  padding:10px 20px;
  font-size:16px;
  text-transform:capitalize;
  display:inline-block;
  margin-top:20px;
  position:relative;
  z-index:2;
  overflow:hidden;
}
.blog-content a::before{
  position:absolute;
  width:100%;
  height:100%;
  left:-100%;
  top:0;
  background-color:#333;
  content:"";
  transition:.3s;
  z-index:-1;
}
.blog-content a:hover::before{
  left:0;
}
    </style>
<script>
$(document).ready(function(){
    var maxLength = 300;
    $(".show-read-more").each(function(){
        var myStr = $(this).text();
        if($.trim(myStr).length > maxLength){
            var newStr = myStr.substring(0, maxLength);
            var removedStr = myStr.substring(maxLength, $.trim(myStr).length);
            $(this).empty().html(newStr);
        }
    });
});
</script>
<style>
    .show-read-more .more-text{
        display: none;
    }
</style>
    <title>Dashboard</title>
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-light bg-purple">
  <a class="navbar-brand text-white h4" href="#">Medium</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link text-light" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light" href="/Blog">blogs</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light" href="/register/updateAccount">account</a>
      </li>
    </ul>
  </div>
  <a class="btn btn-primary" href="/register/index">join us</a>
</nav>

  <!-- Popper.js first, then Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
<div class="wrapper">
        <div class="blog">
            <div class="single-blog">
                <div class="blog-img">
                    <img src="https://image.shutterstock.com/image-photo/sunset-coast-lake-nature-landscape-600w-1960131820.jpg" alt="">
                    <a href="">Hot</a>
                </div>
                <div class="blog-info">
                    <!-- <a href=""><i class="far fa-user"></i> admin</a> -->
                    <a href=""><i class="far fa-comment"></i> 3 comments</a>
                </div>
                <div class="blog-content">
<?php
use App\Models\BlogModel;
$model=new BlogModel();
$blogArray=$model->getRecords();
$data['blogs']=$blogArray;
if(!empty($data['blogs'])){
  foreach ($blogArray as $blog) {
    $blogId = $blog['blogId'];
?>
    <h5 class="card-title"> <?=$blog['blogTitle']?> </h5>
    <h6 class="card-subtitle mb-2 text-muted"> <?=$blog['blogDescription']?> </h6>
    <p class="card-text show-read-more"> <?=$blog['blogContent']?> </p>
    <a href="/Blog/readMore/<?=$blogId?>"class="read-more"> <i class="fas fa-long-arrow-alt-right"></i>read more...</a>
<?php
  }
}
?>



                </div>
            </div>
            <div class="single-blog">
                <div class="blog-img">
                    <img src="https://image.shutterstock.com/image-photo/sunset-coast-lake-nature-landscape-600w-1960131820.jpg" alt="">
                    <a href="">Hot</a>
                </div>
                <div class="blog-info">
                    <a href=""><i class="far fa-user"></i> admin</a>
                    <a href=""><i class="far fa-comment"></i> 3 comments</a>
                </div>
                <div class="blog-content">
                    <h4>Mobilies UX Treend</h4>
                    <p>Athena was regarded as the patron and protectress of various cities across Greece, particularly the city of Athens, from which she most likely received her name.</p>
                    <a href="">read more <i class="fas fa-long-arrow-alt-right"></i></a>
                </div>
            </div>
            <div class="single-blog">
                <div class="blog-img">
                    <img src="https://image.shutterstock.com/image-photo/sunset-coast-lake-nature-landscape-600w-1960131820.jpg" alt="">
                    <a href="">category</a>
                </div>
                <div class="blog-info">
                    <a href=""><i class="far fa-user"></i> admin</a>
                    <a href=""><i class="far fa-comment"></i> 3 comments</a>
                </div>
                <div class="blog-content">
                    <h4>Mobilies UX Treend</h4>
                    <p>Athena was regarded as the patron and protectress of various cities across Greece, particularly the city of Athens, from which she most likely received her name.</p>
                    <a href="">read more <i class="fas fa-long-arrow-alt-right"></i></a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>