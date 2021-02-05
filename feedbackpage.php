<?php
include_once('dbconnect.php');
//include_once('navbarmain.php');

$name = $_GET['name'];
$email = $_GET['email'];

echo "<div class='navbar'>";
echo "<ul>
      <li><a href='login.html'>Logout</a></li>
      <li><a href='profile.php?email=".$email."&name=".$name."' >Your Profile</a></li>
      <li><a class='active'href='feedbackpage.php?email=".$email."&name=".$name."'>Feedback Trips</a></li>
      <li><a href='addplan.php?email=".$email."&name=".$name."'>Add New Trips</a></li>
      <li><a href='mainpage.php?email=".$email."&name=".$name."'>Home</a></li>
      </ul>";
echo "</div>";

if (isset($_GET['options'])) {
  $id = $_GET['id'];
  try {
    $sql = "DELETE FROM feedback WHERE id = '$id'";
    $conn->exec($sql);
    echo "<script> alert('Delete Success')</script>";
  } catch(PDOException $e) {
    echo "<script> alert('Delete Error')</script>";
  }
}

try {
       
    $sql = "SELECT * FROM feedback WHERE email = '$email'";    
    $stmt = $conn->prepare($sql );
    $stmt->execute();
    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $feedbacks = $stmt->fetchAll(); 

    echo "<div class='tablefeedback'>";
    echo "<p><h1 align='center'>Your Feedback Trips</h1></p>";
    echo "<table border='1'>
    <tr>
      <th>Your Comments</th>
      <th>Option(s)</th>
    </tr>";
    echo "</div>";
    
    foreach($feedbacks as $feedback) {
        echo "<tr>";
        echo "<td>".$feedback['comment']."</td>";
        echo "<td><a href='feedbackpage.php?email=".$email."&name=".$name."&id=".$feedback['id']."
        &options=del' onclick= 'return confirm(\"Delete. Are your sure?\");'><b>Delete<b></a><br>
        <a href='editcomment.php?email=".$email."&name=".$name."&id=".$feedback['id']."
        &comment=".$feedback['comment']."'><b>Edit<b></a></td>";
        echo "</tr>";
    } 
    echo "</table>";
    echo "<br>";
    echo "<p align='center'><a href='addcomment.php?email=".$email."&name=".$name."'>Feedback</a></p>";

} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}
$conn = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Feedback Page</title>
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
  .tablefeedback table {
    width: 100%;
    height: 30%;
    padding: 20px;
    background: white;
    border-radius: 4px;
  }
  .tablefeedback{
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