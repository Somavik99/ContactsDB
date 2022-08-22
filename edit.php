<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Mini Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
  <body>
    <?php
     $userID = $_GET['id'];
     $con = new MYSQLi('localhost', 'root', '', 'ContactsDB');
     if($con->connect_error) die($con->connect_error);
     else{
       $SQL = "select * from users where User_id = $userID";
       $res = $con->query($SQL);
       $user = [];
       if ($rows = $res->fetch_assoc()) {
         // code...
         $user = [
           'name'=> $rows['name'],
           'Phone'=> $rows['Phone'],
           'email'=> $rows['email'],
           'rPass'=> $rows['Pass1']
         ];

       }
     }
$con->close();
     ?>
<div class="container">
  <div class="card">
    <div class="card-header">
      <h1>Details Of</h1>
    </div>
    <div class="card-body">
      <form action="update.php" method="post">
      <div class="form-group">
<label>Name</label>
<input type="text" name="n" value="<?php echo $user['name'];?>" required class="form-control" onchange="typeName()">
<section class="text-danger" id="errorName">
</section>
      </div>
      <div class="form-group">
        <label>Email</label>
        <input type="text" name="e" value="<?php echo $user['email'];?>" required class="form-control" onchange="typeEmail()">
        <section class="text-danger" id="errorEmail">
        </section>
      </div>
      <div class="form-group">
        <label>Phone</label>
        <input type="number" name="pH" value="<?php echo $user['Phone'];?>" required class="form-control" onchange="typePhone()">
        <section class="text-danger" id="errorPhone">
        </section>
      </div>
      <div class="form-group">
        <label>Old Password</label>
        <input type="text" name="oP" value="<?php echo $user['rPass'];?>" required class="form-control" onchange="typePass()">
        <section class="text-danger" id="errorPass">
        </section>
      </div>
      <div class="form-group">
        <label>New Password</label>
        <input type="text" name="nP"  required class="form-control" onchange="typePass0()" >
        <section class="text-danger" id="errorPass0">
        </section>
      </div>
      <div class="form-group">
        <label>Confirm New Password</label>
        <input type="text" name="cNp"  required class="form-control" onchange="typeName()">
        <section class="text-danger" id="errorName">
        </section>
      </div>
      <div class="form-group">
       <!-- <input type="hidden" name="userId" value="<?php echo $user['id'];?>"> -->
       <button class="btn btn-sm btn-outline-primary">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>
  </body>
</html>
