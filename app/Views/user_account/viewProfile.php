<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>blog</title>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
<link rel="stylesheet" href=<?php echo base_url("./assets/aacss/grid.css")?>>
<link rel="stylesheet" href=<?php echo base_url("./assets/aacss/app.css")?>>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
<link rel="stylesheet" href="../assets/css/style.css">
<link rel="stylesheet" href="../assets/css/bootstrap.css">
    <style>
.sidebar-menu a{
  color:black;
  text-decoration:none;
}
.sidebar-menu-dropdown{
  color:black;
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
  .profile-imager{
    width:50%;
  }
  .sidebar-logo img {
  height: 50px;
  max-width: 100%;
  }
  .bg-purple{
     background-color:#3F3F3F;
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
                <a href="#">
                    <i class='bx bx-chart'></i>
                    <span>analytic</span>
                </a>
            </li>
            <li class="sidebar-submenu">
                <a href="#" class="sidebar-menu-dropdown active">
                    <i class='bx bx-user-circle'></i>
                    <span>account</span>
                    <div class="dropdown-icon"></div>
                </a>
                <ul class="sidebar-menu sidebar-menu-dropdown-content">
                    <li>
                        <a href="Dashboard/viewProfile">
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
    <?php
        if (empty(session()->user_profile)) {
    ?>
        <h1 class="jumbotron">No profile</h1>
        <a href="http://localhost/register/profile" class="btn btn-primary">Upload Profile</a>
    <?php
        }else{
    ?>      
            <img src="<?=base_url('assets/images/profiles/'.session()->user_profile)?>" class="profile-imager" alt="profile">
            <div class="mt-3">
            <a href="http://localhost/register/profile" class="btn btn-primary w-25">update</a>
            <a href="http://localhost/register/deleteProfile" class="btn btn-primary w-25">delete</a>
            </div>
    <?php } ?>
    </div>
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script src="../../../public/assets/js/app.js"></script>
</body>
</html>