<?php
session_start();
//include('navbarmain.php'); 
include_once("dbconnect.php");

$name = $_GET['name'];
$email = $_GET['email'];

// echo "<head><link rel='stylesheet' href='styles.css'></head>";
echo "<div class='navbar'>";
echo "<ul>
      <li><a href='login.html'>Logout</a></li>
      <li><a href='profile.php?email=".$email."&name=".$name."' >Your Profile</a></li>
      <li><a href='feedbackpage.php?email=".$email."&name=".$name."'>Feedback Trips</a></li>
      <li><a href='addplan.php?email=".$email."&name=".$name."'>Add New Trips</a></li>
      <li><a class='active' href='mainpage.php?email=".$email."&name=".$name."'>Home</a></li>
      </ul>";
echo "</div>";

  if (isset($_SESSION["email"])){
    if (isset($_GET['options'])) {
      $id = $_GET['id'];
      try {
        $sql = "DELETE FROM trips WHERE id = '$id'";
        $conn->exec($sql);
        echo "<script> alert('Delete Success')</script>";
      } catch(PDOException $e) {
        echo "<script> alert('Delete Error')</script>";
      }
    }

    try {
       
        $sql = "SELECT * FROM trips WHERE email = '$email'";    
        $stmt = $conn->prepare($sql );
        $stmt->execute();
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $trips = $stmt->fetchAll(); 

        echo "<div class='tableplan'>";
        echo "<p><h1 align='center'>Your Current Planning Trips</h1></p><br>";
        echo "<table border='1' align='center'>
        <tr>
          <th>Location</th>
          <th>Day(s)</th>
          <th>Date</th>
          <th>Budget</th>
          <th>Memo</th>
          <th>Option(s)</th>
        </tr>";
        echo "</div>";
        
        foreach($trips as $trips) {
            echo "<tr>";
            echo "<td>".$trips['location']."</td>";
            echo "<td>".$trips['day']."</td>";
            echo "<td>".$trips['date']."</td>";
            echo "<td>".$trips['budget']."</td>";
            echo "<td>".$trips['memo']."</td>";
            echo "<td><a href='mainpage.php?email=".$email."&name=".$name."&id=".$trips['id']."
            &options=del' onclick= 'return confirm(\"Delete. Are your sure?\");'><b>Delete<b></a><br>
            <a href='updateplan.php?email=".$email."&name=".$name."&id=".$trips['id']."
            &location=".$trips['location']."&day=".$trips['day']."&date=".$trips['date']."&budget=".$trips['budget']."&memo=".$trips['memo']."'><b>Update<b></a></td>";
            echo "</tr>";
        } 
        echo "</table>";

    } catch(PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }
    
      }else{
        echo "<script> alert('Session Expired!!!')</script>";
        echo "<script> window.location.replace('login.html') </script>;";
      }
  $conn = null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Main page</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
    *{
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }
    body {
      background: -webkit-linear-gradient(bottom, #CCFF99, #CCFFCC);
      min-height: 200vh;
    }
    button{
    width: 20%;
    height: 40px;
    background-color: #2F4F4F;
    color: white !important;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    
    }
    ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
      overflow: hidden;
      background-color: #333;
      position: fixed;
      top: 0;
      width: 100%;
    }
    li {
      float: right;
    }
    li a {
      display: block;
      color: white;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
    }
    li a:hover:not(.active) {
      background-color: #111;
    }
    .active {
      background-color: #5daa99;
    }
  table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    /* width: 30%; */
    /* height: 30px; */
    margin-left: auto;
    margin-right: auto;
    }

    td, th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
      text-align : center;
    }

    tr:nth-child(even) {
      background-color: #dddddd;
    }
.navbar{
    margin-bottom: 0;
    background-color: #2d2d30;
    border: 0;
    letter-spacing: 4px;
    opacity: 0.9;
}
  h1{
    margin-top:30px;
  }  
  .container form, .tableplan table, .tableprofile table {
    width: 100%;
    height: 30%;
    padding: 20px;
    background: white;
    border-radius: 4px;
  }
  .tableplan{
      margin: 100px auto;
      width: 90%;
      max-width: 100%;
      height: 30%;
      padding: 20px;
      background: white;
      border-radius: 4px;
      box-shadow: 0 8px 16px rgba(0, 0, 0, .3);
    }
    .container form h1 {
    color: rgb(8, 7, 7);
    margin-bottom: 24px;
    text-align: center;
  }
    </style>
<body>
</body>
</html>
