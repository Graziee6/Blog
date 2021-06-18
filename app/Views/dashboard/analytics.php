<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Apex Admin
    </title>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
<link rel="stylesheet" href=<?php echo base_url("./assets/aacss/grid.css")?>>
<link rel="stylesheet" href=<?php echo base_url("./assets/aacss/app.css")?>>
<style>
.cont{
    display: flex;
    /* margin-top:10%; */
}

</style>
</head>
<body>
<div class="S sidebar">
          <div class="sidebar-logo">
            <img src=<?php echo base_url("assets/aimages/logo-lg.png")?> alt="Comapny logo">
            <div class="sidebar-close" id="sidebar-close">
                <i class='bx bx-left-arrow-alt'></i>
            </div>
        </div>
  <div>
                  <?php 
                if(empty(session()->user_profile)){
                    echo '<img src="./assets/images/person.svg" class="profile-image">';
                }else{
                    ?>
<img src=<?php echo base_url("assets/images/profiles/".session()->user_profile)?> class="profile-image">
                
<?php                }
?><span style="font-weight:700;text-transform:capitalize;"><?php echo session()->user_name?></span>
  </div>
    <ul class="sidebar-menu">
                 <li>
                <a href="/Dashboard">
                  <i class='bx bxs-dashboard'></i>
                    <span>dashboard</span>
                </a>
            </li>
            <li>
                <a href="#" class="active">
                    <i class='bx bx-chart'></i>
                    <span>analytic</span>
                </a>
            </li>
            <li class="sidebar-submenu">
                <a href="#" class="sidebar-menu-dropdown">
                    <i class='bx bx-user-circle'></i>
                    <span>account</span>
                    <div class="dropdown-icon"></div>
                </a>
                <ul class="sidebar-menu sidebar-menu-dropdown-content">
                    <li>
                        <a href="/Dashboard/viewProfile">
                            edit profile
                        </a>
                    </li>
                    <li>
                        <a href="/register/updateAccount">
                            account settings
                        </a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-submenu">
                <a href="" class="sidebar-menu-dropdown">
                    <i class='bx bx-category'></i>
                    <span>Manage blogs</span>
                    <div class="dropdown-icon"></div>
                </a>
                <ul class="sidebar-menu sidebar-menu-dropdown-content">
                    <li>
                        <a href="/blog/index">
                            list
                        </a>
                    </li>
                    <li>
                        <a href="/blog/create">
                            add blog
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-mail-send'></i>
                    <span>mail</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-chat'></i>
                    <span>chat</span>
                </a>
            </li>
            <li class="sidebar-submenu">
                <a href="#" class="sidebar-menu-dropdown">
                    <i class='bx bx-cog'></i>
                    <span>settings</span>
                    <div class="dropdown-icon"></div>
                </a>
                <ul class="sidebar-menu sidebar-menu-dropdown-content">
                    <li>
                        <a href="#" class="darkmode-toggle" id="darkmode-toggle">
                            darkmode
                            <span class="darkmode-switch"></span>
                        </a>
                    </li>
                </ul>
            </li>
            <li><a href="login/logout"><i class='bx bx-log-out'></i><span>Logout</span></a>
            </li>
        </ul>
  </div>
<div class="main">
   <div class="main-header">
            <div class="mobile-toggle" id="mobile-toggle">
                <i class='bx bx-menu-alt-right'></i>
            </div>
            <div class="main-title">
               analytics
            </div>
        </div>
                <div class="main-content">
            <div class="row">
                <div class="col-3 col-md-6 col-sm-12">
                    <div class="box box-hover">
                        <!-- COUNTER -->
                        <div class="counter">
                            <div class="counter-title">
                                total blogs
                            </div>
                            <div class="counter-info">
                                <div class="counter-count">
                                    6578
                                </div>
                                <i class='bx bx-shopping-bag'></i>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="col-3 col-md-6 col-sm-12">
                    <div class="box box-hover">

                        <div class="counter">
                            <div class="counter-title">
                                conversion rate
                            </div>
                            <div class="counter-info">
                                <div class="counter-count">
                                    30.5%
                                </div>
                                <i class='bx bx-chat'></i>
                            </div>
                        </div>
                       
                    </div>
                </div>
                <div class="col-3 col-md-6 col-sm-12">
                    <div class="box box-hover">
                     
                        <div class="counter">
                            <div class="counter-title">
                                total profit
                            </div>
                            <div class="counter-info">
                                <div class="counter-count">
                                    $9,780
                                </div>
                                <i class='bx bx-line-chart'></i>
                            </div>
                        </div>
                       
                    </div>
                </div>
                <div class="col-3 col-md-6 col-sm-12">
                    <div class="box box-hover">
                     
                        <div class="counter">
                            <div class="counter-title">
                                daily visitors
                            </div>
                            <div class="counter-info">
                                <div class="counter-count">
                                    690
                                </div>
                                <i class='bx bx-user'></i>
                            </div>
                        </div>
                      
                    </div>
                </div>
            </div>
            </div>
        <div class="cont">
                            <div class="col-7 col-md-12 col-sm-12">
                            <div class="box f-height">
                        <div class="box-header">
                            Comments
                        </div>
                        <div class="box-body">
                            <div id="customer-chart"></div>
                        </div>
                    </div>
                        </div>
   <div class="col-5 col-md-12 col-sm-12">
                            <div class="box f-height">
                        <div class="box-header">
                 Categories                        </div>
                        <div class="box-body">
                            <div id="category-chart"></div>
                        </div>
                    </div>
                        </div>
       </div>
       <div class="overlay"></div>
<script>
$(document).ready(function(){
    var maxLength = 50;
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
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script src=<?php echo base_url("./assets/js/app.js")?>></script>
</body>
</html>