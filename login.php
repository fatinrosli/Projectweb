<?php
session_start();
include_once("dbconnect.php");

$email = $_POST['email']; 
$password = sha1($_POST['password']);

try {
    $sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
    $stmt = $conn->prepare($sql );
    $stmt->execute();
  
    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $count = $stmt->rowCount();
    $users = $stmt->fetchAll();  

    if ($count > 0){
        foreach($users as $user) {
            $email = $user['email'];
            $name = $user['name'];
        } 

        $_SESSION["name"] = $name;
        $_SESSION["email"] = $email;
        $_SESSION["password"] = $password;

        echo "<script> alert('Login Success')</script>";
        echo "<script> window.location.replace('mainpage.php?email=".$email."&name=".$name."') </script>;";
    }else{
        echo "<script> alert('Login Failed')</script>";
        echo "<script> window.location.replace('login.html') </script>;";
    }

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
?>
<!-- 
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign In</title>
  <link rel='stylesheet'  href='style.css'>
</head>

<body>
  <div class="container">
    <form  action="login.php" method="POST">
      <h1>Login Page </h1>
  
        <label for="email"><b>Email</b></label><br>
        <input type="text" placeholder="Enter email" id="email" name="email" value="" required><br><br>
        <br>
        <label for="password"><b>Password</b></label><br>
        <input type="password" placeholder="Enter password" id="password" name="password" value="" required><br><br>

      <input type="submit" value="Submit"><br>
      <br>
      <p align="center">Not a member?<a href="register.html"> Register now</a></p>

    </form>
</body> -->

</html>