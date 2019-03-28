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

<div class="container">

  <!-- Trigger the modal with a button -->
<!--   <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>
 -->
  <!-- Modal -->
 <!--  <div class="modal fade" id="myModal" role="dialog"> -->
     
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Course Here</h4>
        </div>
        <div class="modal-body">
         <?php echo validation_errors("<div class='alert alert-danger'>","</div>");?>
          <form method="post">

<div class="form-group">
      <label for="Name">Course ID:</label>
      <input type="text " class="form-control" id="cid" placeholder="Enter Course ID" name="cid">
    </div>

<div class="form-group">
      <label for="Name">Course Name:</label>
      <input type="text " class="form-control" id="cname" placeholder="Enter Course Name" name="cname">
    </div>

<div class="form-group">
      <label for="Name">Credit Hour:</label>
      <input type="text " class="form-control" id="ch" placeholder="Enter Credit hour" name="ch">
    </div>


    <button type="submit" name="course"class="btn btn-success">Add Course</button>
  </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>

</body>
</html>
