<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href= "<?=base_url('assets/css/style.css')?>">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
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
<div class="container-fluid d-flex justify-content-evenly mt-2">
<?php
use App\Models\BlogModel;
$model=new BlogModel();
$blogArray=$model->getRecords();
$data['blogs']=$blogArray;
if(!empty($data['blogs'])){
  foreach ($blogArray as $blog) {
    $blogId = $blog['blogId'];
?>
<div class="card" style="width: 18rem;">
  <div class="card-body shadow-sm">
    <h5 class="card-title"> <?=$blog['blogTitle']?> </h5>
    <h6 class="card-subtitle mb-2 text-muted"> <?=$blog['blogDescription']?> </h6>
    <p class="card-text show-read-more"> <?=$blog['blogContent']?> </p>
    <a href="Blog/readMore/<?=$blogId?>"class="read-more">read more...</a>
  </div>
</div>

<?php
  }
}
?>

</div>
  <!-- Popper.js first, then Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</body>
</html>