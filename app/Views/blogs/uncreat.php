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
    <div class="nav-link">Blogs / Create</div>
    </nav>
    </div>
    </div>
    </div>
    <div class="container">
    <div class="row">
    <div class="col-md-12 mt-4 text-right">
    <a href="#" class="btn btn-primary">Add</a>
    </div>
    </div>
    </div>
    <div class="container mt-4">
    <div class="row">
    <div class="col-md-12">
    <div class="card">
    <div class="card-header bg-purple text-white">
    <div class="card-header-title">Create Blogs</div>
    </div>
    <div class="card-body">
<div class="form-group">
<form name="createForm" id="createForm"  method="post">
<label for="">Name</label>
<input type="text" placeholder="Name" name="blogTitle" id="name" class="form-control <?php echo (isset($validation) && $validation->hasError('name'))?'is-invalid':''?> value="<?php echo set_value('name')?>">
<?php 
if(isset($validation) && $validation->hasError('blogTitle')){
    echo '<p class="invalid-feedback">'.$validation->getError('blogTitle').'</p>';
}
?>
</div>
<div class="form-group">
<label for="">Description</label>
<input type="text" placeholder="description" name="blogDescription" id="description" class="form-control"  <?php echo (isset($validation) && $validation->hasError('description'))?'is-invalid':''?> value="<?php echo set_value('blogDescription')?>">
<?php 
if(isset($validation) && $validation->hasError('blogDescription')){
    echo '<p class="invalid-feedback">'.$validation->getError('blogDescription').'</p>';
}
?>
</div>
<div class="form-group">
<label for="">Content</label>
<input type="text" placeholder="Content" name="blogContent" id="content" class="form-control" value="<?php echo set_value('blogContent')?>">
</div>
<button type="submit" class="btn btn-primary">Submit</button>
</form>
       </div>
    </div>
    </div>
    </div>
    </div>
    
</body>
</html>