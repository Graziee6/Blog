<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css');?>">
    <title>Medium</title>
</head>
<body>
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
    <div class="nav-link">blogs / View</div>
    </nav>
    </div>
    </div>
    </div>
    <div class="container">
    <div class="row">
<!--  -->
    <div class="col-md-12 mt-4 text-right">
    <a href="<?php echo base_url("blogs/create");?>" class="btn btn-primary">Add</a>
    </div>
    </div>
    </div>
    <div class="container mt-4">
    <div class="row">
    <div class="col-md-12">
   <!-- <####> -->
   <?php 
if(!empty($session->getFlashdata('success'))){
    ?>
    <div class="alert alert-success">
    <?php echo $session->getFlashdata('success');?>
    </div>
<?php
}?>
<?php
if(!empty($session->getFlashdata('error'))){
    ?>
<div class="alert alert-danger">
<?php echo $session->getFlashdata('error');?>
</div>
<?php
}?>
</div>
    <div class="col-md-12">
    <div class="card">
    <div class="card-header bg-purple text-white">
    <div class="card-header-title">blogs</div>
    </div>
    <div class="card-body">
    <table class="table table-striped">
    <tr>

    <th>Title</th>
    <th>Description</th>
    <th>Content</th>
    <th width="150">ACTION</th>
    </tr>
    <?php
    if(!empty($blogs)){
        foreach($blogs as $blog){
    ?>
    <tr>

    <td><?php echo $blog['blogTitle']?></td>
    <td><?php echo $blog['blogDescription']?></td>
    <td><?php echo $blog['blogContent']?></td>

    
<td class="pb-2"><a href="<?php echo base_url('blogs/edit/'.$blog['blogId'])?>" class="btn btn-primary btn-sm">Edit</a> 
<a href="#" onClick="deleteConfirm(<?php echo $blog['blogId']?>);" class="btn btn-danger btn-sm">Delete</a></td> 
    
  
    </tr>
    <?php } }else {?>
    <tr>
    <td colspan="5">Record not found</td>
    </tr>
    <?php }?>
    </table>
    </div>
    </div>
    </div>
    </div>
    </div>
    
</body>
</html>
<script>
function deleteConfirm(id){
//alert(id);
    if(confirm("Are you sure you want to delete blog?")){
        window.location.href='<?php echo base_url('blogs/delete/')?>/'+id;
    }
}
</script>