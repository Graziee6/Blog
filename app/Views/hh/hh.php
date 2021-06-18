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
    <link rel="stylesheet" href="./assets/aacss/grid.css">
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
  flex-basis:350px;
  border:1px solid #eee;
  margin-bottom:5%;
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
  padding:10px;
}
.blog-content h4{
  font-size:22px;
  font-weight:600;
  text-transform:capitalize;
  border-bottom:1px dashed #eee;
  margin-bottom:10px;
  padding-bottom:2px;
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
    <a class="navbar-brand text-white h4" href="#">
           <div class="sidebar-logo">
    <img src="../assets/aimages/logo-lg.png" alt="Comapny logo">
  </div>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link text-light" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light" href="/Dashboard">dashboard</a>
      </li>
    </ul>
  </div>
<?php 
if(!empty(session()->user_profile)){
?>
<img src="../assets/aimages/user-image-3.png" class="profile-image">
<?php              }
    else{
      echo "<a class=\"btn btn-primary\" href=\"Register\index\">join us</a>";
                }
?>          
</nav>

  <!-- Popper.js first, then Bootstrap JS -->
  <h6 style="margin-top:5%; margin-bottom:3pxx;margin-left:5%;"> Recommended for you</h6>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
<div class="wrapper">

<?php
use App\Models\BlogModel;
$model=new BlogModel();
$blogArray=$model->getRecords();
$data['blogs']=$blogArray;
if(!empty($data['blogs'])){
  for($i=0;$i < count($blogArray);$i++){
    $blogId=$blogArray[$i]['blogId'];
  }}?>
        <div class="blog">
        <div class="single-blog">
                <div class="blog-img">
                    <img src="https://image.shutterstock.com/image-photo/sunset-coast-lake-nature-landscape-600w-1960131820.jpg" alt="">
                    <a href="">Hot</a>
                </div>
                <div class="blog-info">
                    <a href=""><i class="far fa-comment"></i> 30 comments</a>
                </div>
                <div class="blog-content">
<h5 class="card-title">Ishuri riranze</h5>
    <h6 class="card-subtitle mb-2 text-muted"> Ishuri rirananiye </h6>
    <p class="card-text show-read-more"> Mubyukuri ishuri rirananiye sinkubeshye peeh </p>
                <a href="/Blog/readMore/<?=$blogId?>"class="read-more"> <i class="fas fa-long-arrow-alt-right"></i>read more...</a>

               </div>
            </div>      
                   <div class="single-blog">
                <div class="blog-img">
                    <img src="data:image/jpeg;base64,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" alt="">
                    <a href="">Hot</a>
                </div>
                <div class="blog-info">
                    <a href=""><i class="far fa-comment"></i> 6 comments</a>
                </div>
                <div class="blog-content">
<h5 class="card-title">New Tesla Car</h5>
    <h6 class="card-subtitle mb-2 text-muted">Tesla Model s plaid </h6>
    <p class="card-text show-read-more"> New Tesla Model s plaid is out now go and By peeh </p>
                <a href="/Blog/readMore/<?=$blogId?>"class="read-more"> <i class="fas fa-long-arrow-alt-right"></i>read more...</a>

               </div>
            </div>      
                   <div class="single-blog">
                <div class="blog-img">
                    <img src="https://e0.365dm.com/21/04/1600x900/skysports-jadon-sancho-dortmund_5340865.jpg?20210413130754" alt="">
                    <a href="">Hot</a>
                </div>
                <div class="blog-info">
                    <a href=""><i class="far fa-comment"></i> 3 comments</a>
                </div>
                <div class="blog-content">
<h5 class="card-title">Sancho'Transfer</h5>
    <h6 class="card-subtitle mb-2 text-muted"> Man uniter ir gukotana </h6>
    <p class="card-text show-read-more"> Man uniter ir gukotana ngo izane Jadon Sancho </p>
                <a href="/Blog/readMore/<?=$blogId?>"class="read-more"> <i class="fas fa-long-arrow-alt-right"></i>read more...</a>

               </div>
            </div>        
       <div class="single-blog">
                <div class="blog-img">
                    <img src="https://image.shutterstock.com/image-photo/sunset-coast-lake-nature-landscape-600w-1960131820.jpg" alt="">
                    <a href="">Hot</a>
                </div>
                <div class="blog-info">
                    <a href=""><i class="far fa-comment"></i> 3 comments</a>
                </div>
                <div class="blog-content">
<h5 class="card-title">Ishuri riranze</h5>
    <h6 class="card-subtitle mb-2 text-muted"> Ishuri rirananiye </h6>
    <p class="card-text show-read-more"> Mubyukuri ishuri rirananiye sinkubeshye peeh </p>
                <a href="/Blog/readMore/<?=$blogId?>"class="read-more"> <i class="fas fa-long-arrow-alt-right"></i>read more...</a>

               </div>
            </div>      
                   <div class="single-blog">
                <div class="blog-img">
                    <img src="https://image.shutterstock.com/image-vector/programming-code-coding-hacker-background-260nw-1714491562.jpg" alt="">
                    <a href="">Hot</a>
                </div>
                <div class="blog-info">
                    <a href=""><i class="far fa-comment"></i> 3 comments</a>
                </div>
                <div class="blog-content">
<h5 class="card-title">Coding is life</h5>
    <h6 class="card-subtitle mb-2 text-muted"> Coding do magic in owr life </h6>
    <p class="card-text show-read-more"> MubyukuriCoding ishuriCoding rirananiyeCoding sinkubeshyeCoding peeh </p>
                <a href="/Blog/readMore/<?=$blogId?>"class="read-more"> <i class="fas fa-long-arrow-alt-right"></i>read more...</a>

               </div>
            </div>     
                   <div class="single-blog">
                <div class="blog-img">
                    <img src="https://e0.365dm.com/21/04/1600x900/skysports-jadon-sancho-dortmund_5340865.jpg?20210413130754" alt="">
                    <a href="">Hot</a>
                </div>
                <div class="blog-info">
                    <a href=""><i class="far fa-comment"></i> 3 comments</a>
                </div>
                <div class="blog-content">
<h5 class="card-title">Sancho'Transfer</h5>
    <h6 class="card-subtitle mb-2 text-muted"> Man uniter ir gukotana </h6>
    <p class="card-text show-read-more"> Man uniter ir gukotana ngo izane Jadon Sancho </p>
                <a href="/Blog/readMore/<?=$blogId?>"class="read-more"> <i class="fas fa-long-arrow-alt-right"></i>read more...</a>

               </div>
            </div>        
 <div class="single-blog">
                <div class="blog-img">
                    <img src="https://i0.wp.com/www.menabytes.com/wp-content/uploads/2021/03/NFTs-B.jpg?fit=1000%2C560&ssl=1" alt="">
                    <a href="">Hot</a>
                </div>
                <div class="blog-info">
                    <a href=""><i class="far fa-comment"></i> 30 comments</a>
                </div>
                <div class="blog-content">
<h5 class="card-title">Unbelievable NFTs</h5>
    <h6 class="card-subtitle mb-2 text-muted">The most exepensive NFTs</h6>
    <p class="card-text show-read-more">NFTS crypto is most exepensive NFTs </p>
                <a href="/Blog/readMore/<?=$blogId?>"class="read-more"> <i class="fas fa-long-arrow-alt-right"></i>read more...</a>

               </div>
            </div>      
                   <div class="single-blog">
                <div class="blog-img">
                    <img src="data:image/jpeg;base64,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" alt="">
                    <a href="">Hot</a>
                </div>
                <div class="blog-info">
                    <a href=""><i class="far fa-comment"></i> 6 comments</a>
                </div>
                <div class="blog-content">
<h5 class="card-title">New Tesla Car</h5>
    <h6 class="card-subtitle mb-2 text-muted">Tesla Model s plaid </h6>
    <p class="card-text show-read-more"> New Tesla Model s plaid is out now go and By peeh </p>
                <a href="/Blog/readMore/<?=$blogId?>"class="read-more"> <i class="fas fa-long-arrow-alt-right"></i>read more...</a>

               </div>
            </div>      
                   <div class="single-blog">
                <div class="blog-img">
                    <img src="data:image/jpeg;base64,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" alt="">
                    <a href="">Hot</a>
                </div>
                <div class="blog-info">
                    <a href=""><i class="far fa-comment"></i> 3 comments</a>
                </div>
                <div class="blog-content">
<h5 class="card-title">Bit coin</h5>
    <h6 class="card-subtitle mb-2 text-muted"> Man uniter ir gukotana </h6>
    <p class="card-text show-read-more">Bit Coin in New era of money Bit Coin in New era of money </p>
                <a href="/Blog/readMore/<?=$blogId?>"class="read-more"> <i class="fas fa-long-arrow-alt-right"></i>read more...</a>

               </div>
            </div>        
                      <div class="single-blog">
                <div class="blog-img">
                    <img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAoHCBUSEhEREhYYEhISERERERgVGBgYEhERGBgZGRgYGBgcIS4lHB4rIRgYJjgmKy8xNTU1GiQ7QDs0Py40NTEBDAwMEA8QHhISHjQkIyE0MTQ1MTQ0NDQ0NDQ0NDQ0NDQ0NDExNDQ0NDQ0NTQ0MTE0NDE0NDE0NDQ0NDQ0NDQ0NP/AABEIAKgBLAMBIgACEQEDEQH/xAAbAAABBQEBAAAAAAAAAAAAAAAAAQIDBAUGB//EAD4QAAIBAgMEBwYEBQQCAwAAAAECAAMRBBIhBTFBUQYTYXGBkaEiMlKxwdEUQpLwFSNygqJTYtLhQ+IWwvH/xAAZAQEBAQEBAQAAAAAAAAAAAAAAAQIDBAX/xAAtEQACAgECBQMDAwUAAAAAAAAAAQIRAxIhBBMxQVEikaEUYXEFgbEjMkJSYv/aAAwDAQACEQMRAD8A9EywyyW0ULNWWiILFyyQiIYsUMywtFMS0pAheES0EFvEvFhAG5oXi2haANjotoloARLR0IAwwtFtC0AbaFo60MsAbaFo60LQKG2haOtC0AbaJaPtC0AZaJH2haAMhH2iSWBsLR1oWlsUMtC0daFoA20S0faFoFDLQj7RLSWKLggzRCYhkNWIWiR1oloIJaFo6JKBLQjrQiyDLRbR0LSWUbaFo6JLYEtEtHRYsDLQjrQtJYGwtHWhaWwNhHWhaQDbRLR0IsDbQtHRIsCWiWjoRZRtoWjoRZBtolo+JFgbaFo6EWBtoWi2haLAloWi2haLA20LR1olosFi0LRxELTNlG2haOtC0WKGWhaOtC0WQSEdaFostDYWi2hFihtoWjoWixQlo2K7BQSxAA3kmwHeZz20umGGokqGNVxwTUef2Bgqi30OghPPMb08qm/V01pjm2p9f+MxqvSvF1L/AMwr3G3h7IEWdFj8tI9chaeMvtjEtvqsf73/AOcjO0q/xk/3uP8A7SWa5UfPwe0wvPFf43WU2LPuvo5I8iJKnSJ+Lkf1r9VltDkJ/wBsl/B7LFtPIV2/UPG45q1/35yan0if42HYdP8Ar1mkovuSWDKlbW323PV7QtPNafSaqLe23noZeodLHG9r94X7TWhnCzvIWnK4fpZf3gD6GadDpBSbfdfIyOMhaNa0LSKji6b+64+UntMdCjYR1oWiy0MhHQtFihsI60LSWKG2haOtC0WKGWhaOtC0tkontCLCZstCQvCEWKEhFhFihIRYRYoSFoShiNsUKbIrvbO4phgrGmGOgDOBlGum/fFlov2nPdIOlVHCXpj+bXtoiH3e1z+UTnukvTQ1M9HCNkRTlqVuJPFaf3nMYPChvavoTmJPvueZJ18YNJFjaW1cTjG/mOcvBEutNe87z3yGngLC17diiXlQKLAWErY6t1aEj3j7K954+Gpi7NGTimAYqpzBdO9pLhcOXIQamzMe4Ak/KVaSXbu18eH1mnhH6sdZfK17Kd1tNTr3wyLruaLYZaVLDtlF6iuzkjUksbA9wA9Zl4nC5mLJYA8OR7JYxm2OtCqzLlQkqqAHLck8Lk75WTF3NlR3PILa3ffUQrrc3pbfpVlNqDCpl3koDv4XMZUom2o8dJarpUZg5Ap2GXeGYgniOEb+Ev77Fzx3keWmnnFnfHwmSfRMyuqLn2B7QOrDQL3mX6dEhbO2c89B4f8A7LeQDQA2G6xAHlaNKLyPnMOVn1uG4ZYVdNt+xUNMj3SR3bj3jjEFcjePFftu+Us9WvI/vxjWROIb0+81GbXRkz8PHJ1xv9kLRxBPunN2DRv0n6XlmnjiOY79JnuKQ3hxBNohdzMw5NY+s7Rn5PjZeFp+lNflHQYfarDjNvA9InW3tTh06RZd1EH+pgo9AZfodJGI0pYZf687fJRLricY8Nlk6SPSsH0iVrZrTWo45H3H6/LWeTf/ACDE/lXCDlai1/8AJjEbpDjh7ppj+ikn2JnOUoG/pcy6o9kWxF1IIO4jUecQieN0uk+P6xctUU2YgXZEVezN7Oo75cbphtSnUdC9GoyHKwNO4zDeLoRqNx7jMWvJHhmtmj1i0JwWz+muKVc+Mwn8oe/Uok+wOZRiTbxE7ulUDqrrqrqrKd11IuNDFmHFrqOtEtHQkslDSIlo6FosUSQtFhM6i0JaFosI1ChLQtFmbtXbNLDD+Y3tcFG+Fb6BRvY0bRGIAuSABvJ0E4fE9OnJIpIoHNrsfS0ysTtuvW94+AUWEtLuz1Q4LLLtR1+39sIKFZKVVRWZGVDYsoY8yCLcdb6ds4HbW3VbBHDOhWsBRVOr9qmQjIcwN7ruMHLt7x0HcNZE+GD6EZvC5EOSXQ9sP09aakzDw9NkC/yy1t17BRfvOsuUKlcnMQgGttRfxIvLw2WRqivfhoLf5WkibJqnklxrqL/WZeY6L9MwxVttlYPWP5kH9pP1Eiq4VntndjlvawAGu/nymtS2My3YuWIB3kt5DSWk2TzY+AAmXmR0hwmBL1L5OeXZ6j4j3sfpHLglG5V8hOlTZScbnvJ+kednoPyDx1+cw8x3jiwLol7HOFCo0GY8ALCOo03JuVVFOra3Zj4aTbegBuAHcJVrrwG8+glU2zpy4WpLau2xnslzfgL27+J/fbI2WXGwzEcFHC8ifCOuvvDsiz145RIMkX8PeKpk6GSzsVXwh5jkOZMz8ZTdbblBvaxu2nPlN4puO4jiP+5DVwge1y2l+XHwljKnueTillnBxg6fsZGytnK7M9QZwlrBtxY339mh85X2jXGoRKeW/wACaa7ud9BeaWLDUQBTYjNcm4U7vCVFxjn8w/Qn2mk25N1a7HzeR/TWO6l1bq7KL49ABmpU9RuXOp/xe3pEFek49lCjflCuGzNwGUrfX+rzmlh8Q6gqGFrk6qh3m/Ebrkyb8W/Nf0J/xmr8L5MLhskd3k+DCOPCmxVh3mx+Unw+0S5CojO3AKbk+AEuVMOKhLNYsSWOgAJOp3eMEQKjZPZbKSLX3ibtV0OUo5W2tXwRLtjKcrIVNyCC1iD4ialDa/WFqhBOZrsbi2ZjffulR6FNyGKg3185ayI1Pqyvs77bh5SbeCcnJ/svY3MDtxU0JKXFgSAyg/2k6TutibUFcMuYOUAOYAi/Ma8d3Ab55FTwKJUpZUAu6303+0J6l0ewyU3JRFp51IOTQE6HUeG+JPY8WXE47yaOghCF5z1HGgiQvC8uoUc0nSGrfVUI5WYetzJf/kr8aQ/X/wCspHYzfGPI/eJ/B2+P0P3nXQjNl4dJH/01/WftJB0ltvpjwf8A9ZmHY7fGPL/uO/g7/GP0n7yaELF6QdMRh8LUqhLOzClRGa7PUIvYabgNb/PdPPFx+MqE1XZWDalMl6faC28+cu9IqorYynQ308BRc1OGaszsXPiAovwvMzGbTuAVOU2W1tAuu4CZe2yO0JOO6dGrhaK1kL070z7jqNTTcjQg8Ry/YG1sno4tNM93diAC7Mbns03DsmDgcYtGsjtpTrWp1NPdzGysB2Nl8GM6XGbaZKQpIToCxtoTw0PDh5zzZJS6I+vinLMk0t1tf2JqWBUD3R7zcLn3jJhhwOQnJHaTm+t9TvLHiZGca3Z5Tm4yfc9y4ab6s7HKg3so8REz0x+df1Ccd+Mbn6CN/Fv8Xy+0nLl5NfSvydhVxFIK3tD3TuueHYI/8bR5/wCLfacW+JYg+0dxiiux/M3mfvHKfkv0i7s7P+IUe09yxRiKb6KdeRFjOLznmfMyWjiWUg3O/wAu6Tl+GR8IktmdLWXeeHHunJbf221NhQogNXcXJtfqUPu6fFbWx3X7Z0Nbai9XUY3/AJSGpUFtCigkWPHMRa3fOL2BRz9bjMR7VyXa/wCcsTlX+nQkjkANxnpx7RtnzOLzSj6Fs38IZQ6PVa/8yqXqE/mZgFPdmOo7tI84TEYIhqRYL8LHNSbs0Nr91jNDaG0y5Ug6HS3ASxsVmqB+s9qkxK2J39q9o5yuUkrfTwfPTp3F7+R9PEJiaQrUyFcC1Rb6q3EHn2HiI2lVHOZSOcDjRc/yqpFOofylW1V/C4PgZs4zD9XUI4N7Q8d484aXbuff4Pi3khUuq6kqOO3yMkDjt8jI0OkGc8jMNHpbbKW1WuRodB2TGD2O75TVxzk/u0xqtJuHzH3nSGy3PHmi09RaSqN/nH9cvOUUw1Q7h6yb8DV7POdNjm5ya2RZFZecbn10ZfGQrg6nZ5n7SZMI/Z6/aXY88mx9EEAC62AsN+6WaSseKesiTCPzEs0sIecWjm5NFvC4QmojM62Rg1hxsbzu9lYlQUN/zG/P3GnEYbCnmJ02xhkYHTt7uMPS+55Mzk+x1iYpG3MPHT5x7V0H5h5zHfC8jpw7o0Yc8/SZ0Hms2xWX4h5iJ16fEvmJj/hzzh1R5+kcsakPV+890dm7DMcbRcfmHip+8f8AxZh8Hk876WczVPaIp7PmRMgbXb/b/l9RHDap4hSP67fSTSynA4q5xe1nG/Oiju0J+U59kFSoy36vKhc33FhrYds3XbPi8eo0NamKqWN7sp1t4AzFalm3D3QwHad8592dpqiXFMThX1uQbg8b7/oJtYasW6kndVpLbsDi3oflMbbDquHULpnsdd+pt9Gl7oy2enQB1yM41tooYsL34aznJemz6P6dk05HF90TKm8a3vJ0wFRtysfA28zLY2jVBOXKv9KoPlFbE4luDHuUH6Tnufb5kvsRpsapxyr/AFMPpeSLscD3qijuBP2kbNifgf8AQPtIm/EfA/6P+pP3Jrk+6Lv4CgvvOx7gB87xUTDqB7LMbC924+FpmOK2vsP+g/aMLVfhf9LxSJTfWXybAxNEbqSnvufmY9K9N9DSXwW3ymH1lT/f5NBqj2sc2unHdx9I0oOH/XySdLsqYJ8hIzup5Hq72APMXLEd4lZwKeEorawYux/tORfRBKvSIk4d+wqfUTQxbK2EoMRfR18Q7Totor8nxOOi45au9kc1iHIKhTmzNoJewGIqocjAizGwze7z0lB6ZR1rAn2WuF4eE0mepiKz1HFmds7aWFzwnSS2Pnxe5J0pTNh6TnfZgf7W09H9JoYPaXW0aLvckIBftX2T5lZD0sQU6FJP9pPffKL+amZvR5r0WT4HNuwMAR6hpzSuF+GfR4CaWdxfdfJuvtA7l9kesqVKrNvJMVViMBM0j7ylFIr1LyjWEvVGlNxfSaieTPktUgw1VrgKT5y82Ky6PWVTyFmaYuKq5Lqp13Ejh2SjmO686KF7nyp8fo9KVnStj0/1T4KfpIzjqf8Aquf7X+8wEU9smWmeR8ppY0jyy46b7I3BjaXxufBvvJaWMpX95/ATFRecuUKIPA+n2l0Ix9VN+Deo4qmNc1T9+M1MHtGjoTVqqL23cZzi0yLKL68Du8+EuUqJA1Kgb7ZlDMRwEmhGHnkz07ZpDUkZWNRWW4axu2p3g63lgiVNm4fq6NKmbgrTQNrb27e16kyzrzb5zVHOxcvf5RuU/sR4vbe3iI3KeZ8oByHWnsh10hzRbzqSiYVe6L1w5iQecYwHbIWittHBU6jrWRhTroDkYWCv/tccRe3bMY4qjrdGRwTmQWtm42blNTEJcyo2GB3qD3gGc5R1G1Jo5faNbrG5KNABuHAAdgEudH8KzVAubJSBzVDcDTkt/wAx3es2jgk+Bf0iTJgUta1h2bo2SosVLVqi6ZO+Fww/O47nQ/SRNSojdiKi/wBy/SRPspDwkD7HTtkqPg7rJmX+T9yd1XhinHff6NK7uw3Ypv8AP/nIX2IvMiQNsPkxmdMfBtZs67k74you7Ek/3OPvIG25VX/zE25M31WQvsNuD+krvsJ+YMmiI+qzrv8ABbTpPV/1H8x9pHU27mN3ZmPNiT5XlBtguOF5C+xag/LHLidFx+ddEvY0auKFdHRdSVIG7fvHqJf6O1RiMK1Em7r7acyQAHXyCt4nlMChgnpm+X0lrDVGpPnVSjZg1101HG26/wA+Mrj6aRwy8RLLJSn+C22EZi9x7u4cps7Kohimh6ywB35SF3Enu5ww+3qFRf5qWfiUt7XaVYjL5mV8ft1Ahp0VyKdDrd3HIkbh2Dz4TlcpbUc6S3szulmMFWrlXVVsq9qruPiSx8ZnbMxBpFtNHAv3i9j6mNcFmLNvMt4LChiC+iDU/wC7sE9CilGjlHLKM9Udmid8cw0ta4DC+mhFwfIiQHFO24TonxSNbMqNYAC4U2A3AXG6QM9G+bIl+NgAPIG0zpXg7vic0urMPXe7HuH3jXxgUEILHne7efCbwagDfq18dR5GWF2ig/Io7gPtLpXczz8nZnE6nd6RDmBsbg9t52r7bUbgJk7WxyVlAZRmHutuZeztHYZq0eemYaXlimhGu+OSkvxyyiKPzen/AHFkpgjONwE16GzcU4UqhAYXU+yot3k6RNmVqdNgzKKhBBFzoD3cZ19DbTuLhm/V9zGw3MTDdFq7e/UWn/czH/HfNzZfRajTdalV2rOpDAEEU7jdcak+csrjnPG/flMcMS/Z+lftKU2zXXs9Y3rV7PO0yOvfkP0j6CIazfCPX7yULNg1Bz8iNfON6xf2RMg4g/CPNvvE68fCPM/eKFmWY0v+7Rc0LidAN60QNXv9IthGMogpE5vIjJmSNySFIpIp7ItoWmaNxYX7IkCDCRo2pDSImSSQvFGlJkRQROqksLyUasi6mBoyW8NZKLbKr4eQ/hpdaMIlOMupUbDDiAfCCYRPgXyEtRRLRiip+DT4R5CPXBpy9JZuI4ESFUUVTgl5DyEacAvIS8DCDWlGecCvKNOCXlNK0aUgzpRltghykb4BT+WappxOrgjiZa4Ffh9I9cKvL0mgEihJozRVTCr2eUvUVtujVSSKIFFqnUPZ5S3SqmZ6yxTeShRqI0cZUSqZKK3ZKZZIRE8IzrhDrRAMO0UExbwvOgAMYuaNi3kAZol4hMQmAPDxc0ivFko2mS5uyJGQuZmjSkSWEQqIzPFzwbTQ4qIZYl4XgqDLGkR+aJmmS0iNowiStGWmjEhloWjssMsGBtooi2iiDogBi3igQyzJbDNEJi5YmWA2NMSOKxMs0YYl4t4QtBlihpIDI7RQIIWKaX4gd5tLdPCE7mQ9zreZ4vHqYIaybNrHchPcVP1iNgqw3038FJ+UzleTpi6g3Ow7mIlISujjerDvVh9JF1ksLtSsP/I/ib/OS/xit8fon2gGAWhmiwmyCZoZosJAJmheLCAEIQkKKIGEJDSEhCEhRsIQgqC8M0IQatiZoZoQgywDxc0IQQcGi3hCDaCEIQULwzdsIQQLwhCDLEtEtFhBGIBHCEIIOEev71iwlISAmLfsHlCEGRwPZ6xbjkfSEIB//9k=" alt="">
                    <a href="">Hot</a>
                </div>
                <div class="blog-info">
                    <a href=""><i class="far fa-comment"></i> 6 comments</a>
                </div>
                <div class="blog-content">
<h5 class="card-title">New Tesla Car</h5>
    <h6 class="card-subtitle mb-2 text-muted">Tesla Model s plaid </h6>
    <p class="card-text show-read-more"> New Tesla Model s plaid is out now go and By peeh </p>
                <a href="/Blog/readMore/<?=$blogId?>"class="read-more"> <i class="fas fa-long-arrow-alt-right"></i>read more...</a>
               </div>
            </div>      
    
        </div>
    </div>

</body>
</html>