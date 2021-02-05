<?php
include_once('dbconnect.php');
//include('navbarmain.php');

$name = $_GET['name'];
$email = $_GET['email'];

echo "<div class='navbar'>";
echo "<ul>
      <li><a href='login.html'>Logout</a></li>
      <li><a href='profile.php?email=".$email."&name=".$name."' >Your Profile</a></li>
      <li><a href='feedbackpage.php?email=".$email."&name=".$name."'>Feedback Trips</a></li>
      <li><a class='active' href='addplan.php?email=".$email."&name=".$name."'>Add New Trips</a></li>
      <li><a href='mainpage.php?email=".$email."&name=".$name."'>Home</a></li>
      </ul>";
echo "</div>";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $location = $_GET['location'];
    $day = $_GET['day'];
    $date = $_GET['date'];
    $budget = $_GET['budget'];
    $memo = $_GET['memo'];
    
  
    try {
      $sql = "INSERT INTO trips (id, location, day, date, budget, memo, email)
      VALUES ('$id','$location', '$day', '$date', '$budget', '$memo', '$email')";
      // use exec() because no results are returned
      $conn->exec($sql);
      echo "<script> alert('Insert Success')</script>";
      echo "<script> window.location.replace('mainpage.php?email=".$email."&name=".$name."') </script>;";
  
    } catch(PDOException $e) {
      echo "<script> alert('Insert Error')</script>";
      echo "Error: " . $e->getMessage();
    }
}
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Planning</title>
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
  .container form{
    width: 100%;
    height: 50%;
    padding: 20px;
    background: white;
    border-radius: 4px;
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
  textarea {
    width: 100%;
    height: 40%;
    padding: 12px 20px;
    margin: auto auto;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    position: absolute;
    top: 50%;
    left: 50%;
    font-size: 20px;
    color: black !important;
    transform: translate(-50%,-50%);
    -ms-transform: translate(-50%,-50%);
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
    .container form h1 {
    color: rgb(8, 7, 7);
    margin-bottom: 24px;
    text-align: center;
  }
  .center {
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 50%;
    }
    
    .container {
      margin: 100px auto;
      width: 700px;
      max-width: 100%;
      padding: 10px;
  }
    </style>
   
</head>
<body>

    <div class="container">
    <form action="addplan.php" method="get"  onsubmit="return confirm('Are you sure?');">
    <h1>Add a new planning trips</h1>
            <input type="hidden" name="name" name="name" value="<?php echo$name;?>"><br>
            <input type="hidden" name="email" name="email" value="<?php echo$email;?>"><br>
            <input type="hidden" name="id" name="id" value="" required><br>
            <label for="location"><b>Location:</b></label><br>
            <input type="text" placeholder="Enter location" name="location" id="location" value="" required><br>
            <br>
            <label for="day"><b>How many day(s) you want to stay:</b></label><br>
            <input type="text" placeholder="Enter how manay days" name="day" id="day" value="" required><br>
            <br>
            <label for="date"><b>Date:</b></label><br>
            <input type="date" placeholder="Enter year-month-day" name="date" id="date" value="" required><br>
            <br>
            <label for="budget"><b>Budget(RM):</b></label><br>
            <input type="text" placeholder="Enter range budget" name="budget" id="budget" value="" required><br>
            <br>
            <label for="memo"><b>Memorandum Notes:</b></label><br>
            <input type="text" placeholder="Enter your notes" name="memo" id="memo" value="" required><br>
            <br>
            <input type="submit" value="Submit"><br>
            <br>
            <p align="center"><a href="mainpage.php?email=<?php echo $email. '&name='.$name?>">Previous page</a></p>
    </form>
    </div>
    
</body>
</html>