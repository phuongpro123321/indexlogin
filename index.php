<<?php
$host = "ec2-18-206-20-102.compute-1.amazonaws.com";
$port = "5432";
$dbname = "dcdunsnprbc06j";
$user = "synxttjivonovb";
$password = "435e3c81b08bbf01bfbd5c1a498535976a24043baf1af6290f8b06137ef238b7"; 
$connection_string = "host={$host} port={$port} dbname={$dbname} user={$user} password={$password} ";
$dbconn = pg_connect($connection_string);
if(isset($_POST['submit'])&&!empty($_POST['submit'])){
    
    $hashpassword = md5($_POST['pwd']);
    $sql ="select * from public.account where username = '".pg_escape_string($_POST['username'])."' and Password ='".$hashpassword."'";
    $data = pg_query($dbconn,$sql); 
    $login_check = pg_num_rows($data);
    if($login_check > 0){ 
        
        echo "Login Successfully";    
    }else{
        
        echo "Invalid Details";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>PHP PostgreSQL Registration & Login Example </title>
  <meta name="keywords" content="PHP,PostgreSQL,Insert,Login">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
  <h2>Login Here </h2>
  <form method="post">
  
     
    <div class="form-group">
      <label for="username">Email:</label>
      <input type="username" class="form-control" id="username" placeholder="Enter username" name="username">
    </div>
    
     
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="Password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
    </div>
     
    <input type="submit" name="submit" class="btn btn-primary" value="Submit">
  </form>
</div>
</body>
</html>