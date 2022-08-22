<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Mini Project</title>
  </head>
  <body>
    <div class="container-fluid">
<div class="table-responsive">
    <header class="modal-header">
      <h1>Contacts Info Table</h1>
    </header>

    <table class="table table-hover table-bordered">
      <tr>
        <th>Name: </th>
        <th>Email: </th>
        <th>Phone: </th>
        <th>Action: </th>
      </tr>
    <?php
$con = new MYSQLi('localhost','root','','ContactsDB');
if($con->connect_error) die($con->connect_error);
else {
  // code...
  // echo "Ping to MySql succes";
  $SQL = "Select * from users";
  $res = $con -> query($SQL);
  // print_r($res);
  // print '<pre>';
  while ($rows = $res -> fetch_assoc()) {
    // code...
    // print_r($rows);

    // echo "Name: ".$rows['name'];
    // echo "Phone: ".$rows['Phone'];
    // echo "Email: ".$rows['email'];
   $delete =   $rows['User_id'];
   $edit   =   $rows['User_id'];
    ?>
    <tr>
      <td><?php echo $rows['name'];?></td>
      <td><?php echo $rows['Phone']; ?></td>
      <td><?php echo $rows['email']; ?></td>
      <td>
         <a href="delete.php?id= <?php echo $delete; ?>" onclick="return confirm('Do you want to delete this record');" class="btn btn-sm btn-outline-danger">Delete</a>
         |
         <a href="edit.php?id= <?php echo $edit; ?>"  class="btn btn-sm btn-outline-success">Edit</a>
      </td>
    </tr>
    <?php
  }
}
$con->close();
session_destroy();
     ?>


</table>
<?php
if (isset($_SESSION['message'])) {
// code...
echo $_SESSION['message'];
}
 ?>
   </div>
</div>
  </body>
</html>
