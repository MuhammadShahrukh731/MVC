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
          <h4 class="modal-title">Post Here</h4>
        </div>
        <div class="modal-body">
         <?php echo validation_errors("<div class='alert alert-danger'>","</div>");?>
          <form method="post">
<!-- <?php echo $result; ?> -->
    <div class="form-group">
      <label for="title">Title:</label>
      <input type="name" class="form-control" id="title" placeholder="Enter Name" name="title">
    </div>

    <div class="form-group">
      <label for="email">Contact</label>
      <input type="number" class="form-control" id="contact" placeholder="Enter email" name="contact">
    </div>
    <div class="form-group">
      <label for="Message">Message:</label>
      <textarea class="form-control" name="message"></textarea>
    </div>
    
    <div class="form-group">
      <label for="Message">Issue:</label>
      <textarea class="form-control" name="issue"></textarea>
    </div>
    
    <button type="submit" name="post"class="btn btn-success">Post</button>
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
