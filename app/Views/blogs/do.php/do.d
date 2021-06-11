create table blogs(
    blogId int(11) primary key auto_increment,
    blogTitle varchar(50),
    blogDescription varchar(50),
    blogContent varchar(45),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
create table blogs(
  id int(11) primary key auto_increment,
    blogTitle varchar(50),
    blogDescription varchar(50),
    blogContent varchar(45),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

insert into blogs(blogTitle,blogDescription,blogContent) values('br','brre','vevr');
















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





table 
insert  into users(username,email,profilepic,password) values('bruno','bruno@gmail.com','e','124bru');
insert into blogs(blogTitle,blogDescription,blogContent) values('bruce','testingMul','This is blog designed to test primary key and foreing key') where writerId in(select userId from users);



value

value="<?php echo set_value('blogTitle')?>
value="<?php echo set_value('blogDescription')?>">
<?php 
if(isset($validati
">
</div>
<button type="subm