<?php
include_once("dbconnect.php");

$name = $_GET['name'];
$email = $_GET['email'];
$location = $_GET['location'];
$id = $_GET['id'];
$day = $_GET['day'];
$date = $_GET['date'];
$budget= $_GET['budget'];
$memo = $_GET['memo'];

echo "<div class='navbar'>";
echo "<ul>
      <li><a href='login.html'>Logout</a></li>
      <li><a href='profile.php?email=".$email."&name=".$name."' >Your Profile</a></li>
      <li><a href='feedbackpage.php?email=".$email."&name=".$name."'>Feedback Trips</a></li>
      <li><a href='addplan.php?email=".$email."&name=".$name."'>Add New Trips</a></li>
      <li><a class='active' href='mainpage.php?email=".$email."&name=".$name."'>Home</a></li>
      </ul>";
echo "</div>";

if (isset($_GET['options'])) {
    try {
        $sqlupdate = "UPDATE trips SET  location = '$location', day= '$day',  date= '$date', budget = '$budget', memo = '$memo' WHERE email = '$email' AND id = '$id'";
        $conn->exec($sqlupdate);
        echo "<script> alert('Update Success')</script>";
        echo "<script> window.location.replace('mainpage.php?email=".$email."&name=".$name."') </script>;";
      } 
      catch(PDOException $e) {
        echo "<script> alert('Update Error')</script>";
      }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="styles.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Your Planning Trips</title>
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
    width: 50%;
    height: 50%;
    padding: 20px;
    background: white;
    border-radius: 4px;
    margin-right: auto;
    margin-left: auto;
  }

    .container form h1 {
    color: rgb(8, 7, 7);
    margin-bottom: 24px;
    text-align: center;
  }
  input[type=text],input[type=date],select{
    width: 100%;
    height: 40px;
    padding: 12px 20px;
    margin: auto auto;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    
  }
  input[type=submit] {
    width: 100%;
    height: 40px;
    background-color: #4c8caf;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    text-align:center;
    font: bold;
  }
    </style>
</head>
<body>

    <div class="container">
    <form action="updateplan.php" method="get" onsubmit="return confirm('Update?');">
    <h1 >Update Planning:</h1>
        <input type="hidden" id="email" name="email" value="<?php echo $email;?>"><br>
        <input type="hidden" id="id" name="id" value="<?php echo $id;?>"><br>
        <input type="hidden" id="options" name="options" value="update"><br>
        <label for="location">Location:</label><br>
        <input type="text" id="location" name="location" value="<?php echo $location;?>" required><br><br>
        <label for="day">Day(s):</label><br>
        <input type="text" id="day" name="day" value="<?php echo $day;?>" required><br><br>
        <label for="date">Date:</label><br>
        <input type="date" id="date" name="date" value="<?php echo $date;?>" required><br><br>
        <label for="budget">Budget:</label><br>
        <input type="text" id="budget" name="budget" value="<?php echo $budget;?>" required><br><br>
        <label for="memo">Memo:</label><br>
        <input type="text" id="memo" name="memo" value="<?php echo $memo;?>" required><br><br>
        <input type="submit" value="Update"><br>
    <br>
    <p align="center"><a href="mainpage.php?email=<?php echo $email. '&name='.$name?>">Cancel</a></p>
    </form>
  </div>
</body>

</html>