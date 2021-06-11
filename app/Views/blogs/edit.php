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
    <div class="container pb-2 pt-2">
    <div class="text-white h4">Welcome to Medium</div>
    </div>
    </div>
    <div class="bg-white shadow-sm">
    <div class="container">
    <div class="row">
    <nav class="nav nav-underline">
    <div class="nav-link">Blogs / Edit</div>
    </nav>
    </div>
    </div>
    </div>
    <div class="container">
    <div class="row">
    <div class="col-md-12 mt-4 text-right">
    <a href="<?php echo base_url('/blogs')?>" class="btn btn-primary">Back</a>
    </div>
    </div>
    </div>
    <div class="container mt-4">
    <div class="row">
    <div class="col-md-12">
    <div class="card">
    <div class="card-header bg-purple text-white">
    <div class="card-header-title">Edit Blogs</div>
    </div>
    <div class="card-body">
<div class="form-group">
<form name="createForm" id="createForm" action="<?php echo base_url('blogs/edit/'.$blog['blogId'])?>" method="post">
<label for="">blog Title</label>
<input type="text" placeholder="blogTitle" name="blogTitle" id="name" class="form-control" <?php echo (isset($validation) && $validation->hasError('name'))?'is-invalid':''?> value="<?php echo set_value('name',$blog['blogTitle'])?>">
<?php 
if(isset($validation) && $validation->hasError('blogTitle')){
    echo '<p class="invalid-feedback">'.$validation->getError('blogTitle').'</p>';
}
?>
</div>
<div class="form-group">
<label for="">Blog description</label>
<input type="text" placeholder="Blog description" name="blogDescription" id="author" class="form-control"  <?php echo (isset($validation) && $validation->hasError('author'))?'is-invalid':'';?> value="<?php echo set_value('description',$blog['blogDescription'])?>">
<?php 
if(isset($validation) && $validation->hasError('blogDescription')){
    echo '<p class="invalid-feedback">'.$validation->getError('blogDescription').'</p>';
}
?>
</div>
<div class="form-group">
<label for="">Blog content</label>
<input type="text" placeholder="Blog content" name="blogContent" id="isb_no" class="form-control" value="<?php echo set_value('isb_no',$blog['blogContent'])?>">
</div>
<button type="submit" class="btn btn-primary">Update</button>
</form>
       </div>
    </div>
    </div>
    </div>
    </div>
    
</body>
</html>
