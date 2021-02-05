<?php
include_once("dbconnect.php");

//get data first
$name = $_POST['name'];
$email = $_POST['email']; 
$contact = $_POST['contact'];
$password = sha1($_POST['password']);

        try {
            $sql = "INSERT INTO user(name, email, contact, password)
            VALUES ('$name', '$email','$contact', '$password');";
            // use exec() because no results are returned
            $conn->exec($sql);
            echo "<script> alert('Registration Success')</script>";
            echo "<script> window.location.replace('login.html') </script>;";
        } catch(PDOException $e) {
            echo "<script> alert('Registration Error')</script>";
            echo "<script> window.location.replace('register.html') </script>;";
            
        }
        $conn = null;
?>
