<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
 
  <!-- Trigger the modal with a button -->
 
  <!-- Modal -->
 
    <div class="modal-dialog-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
       
        <div class="modal-body">
<!DOCTYPE html>
<html lang="en">
<head>
 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Users Post </h2>
  
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Name</th>
        <th>Title</th>
        <th>Contact</th>
        <th>Message</th>
        <th>Issue</th>
      </tr>
    </thead>


    <tbody>
         <?php 
foreach($data=$data->result() as $row){
?>
      <tr>
        <td><?php echo $row->first_name; ?></td>
        <td><?php echo $row->title; ?></td>
        <td><?php echo $row->contact; ?></td>
        <td><?php echo $row->message; ?></td>
        <td><?php echo $row->issue; ?>  </td>


      </tr>
      
    
<?php }?>
    </tbody>
  </table>
      </div>
    
  


</body>
</html>
