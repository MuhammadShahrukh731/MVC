<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Course System</a>
    </div>
    

<?php
if($this->session->userdata('authenticated')) {
?>
<ul class="nav navbar-nav">
      <li class="active"><?php echo anchor('Dashboard/home','Home',array('class' => 'btn-success'));?>></li>
</ul>
<ul class="nav navbar-nav">
      <li class="active"><?php echo anchor('Dashboard/About','About',array('class' => 'btn-success'));?>></li>
</ul>
<ul class="nav navbar-nav">
      <li class="active"><?php echo anchor('Dashboard/conatct','Contact',array('class' => 'btn-success'));?>></li>
</ul>

<ul class="nav navbar-nav">
      <li class="active"><?php echo anchor('Dashboard/post','Add post',array('class' => 'btn-success'));?>></li>
</ul>

<ul class="nav navbar-nav">
      <li class="active"><?php echo anchor('Dashboard/showpost','Show post',array('class' => 'btn-success'));?>></li>
</ul>


<ul class="nav navbar-nav">
      <li class="active"><?php echo anchor('Dashboard/course','Course',array('class' => 'btn-success'));?>></li>
</ul>

<ul class="nav navbar-nav">
      <li class="active"><?php echo anchor('Dashboard/profile','Profile',array('class' => 'btn-success'));?>></li>
</ul>

<ul class="nav navbar-nav">
      <li class="active"><?php echo anchor('Dashboard/logout','Logout',array('class' => 'btn-success'));?>>Logout</li>
</ul>

<ul class="nav navbar-nav">
      <li class="active"><?php echo anchor('Dashboard/getproduct','Userdata',array('class' => 'btn-success'));?>>Product</li>
</ul>

<?php

      }
?>
</li>

<li><?php
if($this->session->userdata('authenticate')) {
  
  echo anchor('Admins/logout','Logout');
  echo anchor('Admins_Dashboard/post','post');
  echo anchor('Admins_Dashboard/showpost','Showpost');
  echo anchor('Admins_Dashboard/addcourse','Add Course');
  echo anchor('Admins_Dashboard/enroluser','Enrol User');
  echo anchor('Admins_Dashboard/addproduct','Add product');




      }
?>
</li>



<!-- 	<li><button style="margin-top:8px; float:right;" type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Register</button></li>
	<li><button style="margin-right:8px; margin-top:-10px; float:right;" type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal2">Login</button></li> -->
	</ul>
  </div>
</nav>
  

</body>
</html>
