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

<link rel="shortcut icon" href="./assets/aimages/logo-mb.png" type="image/png"> 
<!-- GOOGLE FONT -->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
<!-- BOXICONS -->
<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
<!-- APP CSS -->
<link rel="stylesheet" href="./assets/acss/grid.css">
<link rel="stylesheet" href="./assets/acss/app.css">

</head>

<body>

    <!-- SIDEBAR -->
    <div class="sidebar">
        <div class="sidebar-logo">
            <img src="./assets/aimages/logo-lg.png" alt="Comapny logo">
            <div class="sidebar-close" id="sidebar-close">
                <i class='bx bx-left-arrow-alt'></i>
            </div>
        </div>
        <div class="sidebar-user">
            <div class="sidebar-user-info">
                <img src="./assets/aimages/user-image.jpg" alt="User picture" class="profile-image">
                <div class="sidebar-user-name">
                    Bruce
                </div>
            </div>
            <button class="btn btn-outline">
                <i class='bx bx-log-out bx-flip-horizontal'></i>
            </button>
        </div>
        <!-- SIDEBAR MENU -->
        <ul class="sidebar-menu">
            <li>
                <a href="#" class="active">
                    <i class='bx bx-home'></i>
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
                <a href="#" class="sidebar-menu-dropdown">
                    <i class='bx bx-user-circle'></i>
                    <span>account</span>
                    <div class="dropdown-icon"></div>
                </a>
                <ul class="sidebar-menu sidebar-menu-dropdown-content">
                    <li>
                        <a href="#">
                            edit profile
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            account settings
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            billing
                        </a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-submenu">
                <a href="#" class="sidebar-menu-dropdown">
                    <i class='bx bx-category'></i>
                    <span>project</span>
                    <div class="dropdown-icon"></div>
                </a>
                <ul class="sidebar-menu sidebar-menu-dropdown-content">
                    <li>
                        <a href="#">
                            list
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            add project
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
            <li>
                <a href="#">
                    <i class='bx bx-calendar'></i>
                    <span>calendar</span>
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
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->

    <!-- MAIN CONTENT -->
    <div class="main">
        <div class="main-header">
            <div class="mobile-toggle" id="mobile-toggle">
                <i class='bx bx-menu-alt-right'></i>
            </div>
            <div class="main-title">
                dashboard
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

            <div class="row">
                <div class="col-4 col-md-6 col-sm-12">
                    
                    <div class="box f-height">
                        <div class="box-header">
                            Top blogs
                        </div>
                        <div class="box-body">
                            <ul class="product-list">
                                <li class="product-list-item">
                                    <div class="item-info">
                                        <img src="./assets/aimages/thumb-7.jpg" alt="product image">
                                        <div class="item-name">
                                            <div class="product-name">Jacket</div>
                                            <div class="text-second">Cloths</div>
                                        </div>
                                    </div>
                                    <div class="item-sale-info">
                                        <div class="text-second">Trends</div>
                                        <div class="product-sales">5,930</div>
                                    </div>
                                </li>
                                <li class="product-list-item">
                                    <div class="item-info">
                                        <img src="./assets/aimages/sneaker.jpg" alt="product image">
                                        <div class="item-name">
                                            <div class="product-name">sneaker</div>
                                            <div class="text-second">Cloths</div>
                                        </div>
                                    </div>
                                    <div class="item-sale-info">
                                        <div class="text-second">Trends</div>
                                        <div class="product-sales">5,630</div>
                                    </div>
                                </li>
                                <li class="product-list-item">
                                    <div class="item-info">
                                        <img src="./assets/aimages/headphone.jpg" alt="product image">
                                        <div class="item-name">
                                            <div class="product-name">headphone</div>
                                            <div class="text-second">Devices</div>
                                        </div>
                                    </div>
                                    <div class="item-sale-info">
                                        <div class="text-second">Trends</div>
                                        <div class="product-sales">2,130</div>
                                    </div>
                                </li>
                                <li class="product-list-item">
                                    <div class="item-info">
                                        <img src="./assets/aimages/backpack.jpg" alt="product image">
                                        <div class="item-name">
                                            <div class="product-name">Backpack</div>
                                            <div class="text-second">Bags</div>
                                        </div>
                                    </div>
                                    <div class="item-sale-info">
                                        <div class="text-second">Trends</div>
                                        <div class="product-sales">7,430</div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                   
                </div>
                    

                <div class="col-8 col-md-12 col-sm-12">
                   
                    <div class="box f-height">
                        <div class="box-header">
                            Comments
                        </div>
                        <div class="box-body">
                            <div id="customer-chart"></div>
                        </div>
                    </div>
                
                </div>
                <div class="col-12">
                    
                    <div class="box">
                        <div class="box-header">
                            Recent Blogs
                        </div>
                        <div class="box-body overflow-scroll">
                            <table>
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Blog Title</th>
                                        <th>Description</th>
                                        <th>Content</th>
                                        <th width="150">ACTION</th>
                                    </tr>
                                </thead>
                                   <?php
    if(!empty($blogs)){
        foreach($blogs as $blog){
    ?>
    <tbody>
    <tr>
<td><?php echo $blog['blogId']?></td>
    <td><?php echo $blog['blogTitle']?></td>
    <td><?php echo $blog['blogDescription']?></td>
    <td class="show-read-more"> <?=$blog['blogContent']?> 
</td>

    
<td class="pb-2"><a href="<?php echo base_url('blogs/edit/'.$blog['blogId'])?>" class="btn btn-primary btn-sm">Edit</a> 
<a href="#" onClick="deleteConfirm(<?php echo $blog['blogId']?>);" class="btn btn-danger btn-sm">Delete</a></td> 
    </tr>
    <?php } }else {?>
    <tr>
    <td colspan="5">Record not found</td>
    </tr>
    </tbody>
    <?php }?>
                            </table>
                        </div>
                    </div>
          
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
        <script src="./assets/ajs/app.js"></script>
</body>

</html>