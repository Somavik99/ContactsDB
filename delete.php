<?php
session_start();
$userID = $_GET['id'];
$con = new MYSQLi('localhost', 'root', '', 'ContactsDB');
if($con->connect_error) die($con->connect_error);
else {
  // code...
  $SQL = "delete from users where User_id=$userID";
  $con->query($SQL);
  $rows = $con->affected_rows;
   if ($rows==1) {
     // code...
     $_SESSION['message'] = "<div class='alert alert-success' style='margin:10px; border: 1px solid lightgreen;width:230px;height:70px; box-shadow:13px 13px 13px 13px gray'>Deleted successfully !</div>";
   }else {
     // code...
     $_SESSION['message'] = "<div class='alert alert-danger'>Something Went Wrong !</div>";
   }
}

$con->close();
header('location:index.php');
 ?>
