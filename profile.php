  
<?php
include_once("dbconnect.php");
//include("navbarmain.php");


$name = $_GET['name'];
$email = $_GET['email'];

echo "<div class='navbar'>";
echo "<ul>
      <li><a href='login.html'>Logout</a></li>
      <li><a class='active' href='profile.php?email=".$email."&name=".$name."' >Your Profile</a></li>
      <li><a href='feedbackpage.php?email=".$email."&name=".$name."'>Feedback Trips</a></li>
      <li><a href='addplan.php?email=".$email."&name=".$name."'>Add New Trips</a></li>
      <li><a href='mainpage.php?email=".$email."&name=".$name."'>Home</a></li>
      </ul>";
echo "</div>";

try{

$sql = "SELECT * FROM user WHERE email = '$email'";
$stmt = $conn->prepare($sql );
$stmt->execute();
$user = $stmt->fetchAll(); 
echo "<head></head><link rel='stylesheet' href='styles.css'></head>";

echo "<div class='tableprofile'>";
echo "<p><h1 align='center'>Your Profile</h1></p>";
echo "<table border='1' >";


 foreach($user as $user) {
    echo "<tr><td><b>Name<b></td><td>".$user['name']."</td></tr>";
    echo "<tr><td><b>Email<b></td><td>".$user['email']."</td></tr>";
    echo "<tr><td><b>Contact Number<b></td><td>".$user['contact']."</td></tr>";
    // echo "<tr><td>Registration Date</td><td>".date_format(date_create($user['timereg']),"d/m/Y H:i a")."</td></tr>"; 
 }
 echo "</table><br>";
//  echo "<p align=\"center\"><a href='updateprofile.php?email=".$email."&name=".$name."&contact=".$user['contact']."'>Update</a></td>";
 echo "<p align=\"center\"><a href=\"mainpage.php?email=$email&name=$name\">Back</a></p>";
 echo "</div>";

}  catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
  }
    
$conn = null;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-1.0">
        <title>Your Profile</title>
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
  .tableprofile table {
    width: 100%;
    height: 30%;
    padding: 20px;
    background: white;
    border-radius: 4px;
  }
  .tableprofile{
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
    </head>
    <body>
    </body>
</html>