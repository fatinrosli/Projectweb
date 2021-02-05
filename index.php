<?php
 include_once('dbconnect.php');
 //include('navbarguest.php'); 
//  $name = $_GET['name'];
//  $email = $_GET['email'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Visit To Malaysia</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> 
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
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
    .tablefeedback table {
    width: 70%;
    height: 100%;
    padding: 20px;
    background: white;
    border-radius: 4px;
  } 
  table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 50%;
    margin-left: auto;
    margin-right: auto;
    background-color: white;

    }

    td, th {
      border: 1px solid #dddddd;
      padding: 8px;
      text-align : center;
    }
    tr:nth-child(even) {
      background-color: #dddddd;
    }
    #overlay {
  align: center;
  position: absolute;
  display: none;
  background-color:white;
  margin: 50px auto;
  width: 30%;
  max-width: 100%;
  height: 30%;
  padding: 20px;
  top: 50%;
  left: 100px;
  right: 100px;
  bottom: 100px;
  z-index: 2;
  cursor: pointer;
}
.navbar{
    margin-bottom: 0;
    background-color: #2d2d30;
    border: 0;
    letter-spacing: 4px;
    opacity: 0.9;
}
.aboutus{
    margin-left: auto;
    margin-right: auto;
    width: 70%;
    height: 100%;
    padding: 20px;
    text-align: center;
}
.footer { 
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    background-color:  #2f2f2f; /* Black Gray */
    color: white;
    text-align: center;

  }
  h1{
    margin-top:10%;
  }
    </style>
</head>
<body>
 <!-- Nav Bar -->
 <div class="navbar">
 <ul>
    <li><a href="login.html">Login</a></li>
    <li><a href="#">About Us</a>
    <li><a class="active" href="index.php">Home</a></li>
  </ul>
  </div>
<div class="aboutus">
  <h1 align="center">About Us!!!</h1><br>
  <p>This website aims to keep all the planning related to vacation related. This diaries planning trips aims to provide an alternative to people who like
   to travel to store all the information related to planning and can even share experiences with many people</p>
</div>

<?php
try {
       
  $sql = "SELECT * FROM feedback ";    
  $stmt = $conn->prepare($sql );
  $stmt->execute();
  // set the resulting array to associative
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $feedbacks = $stmt->fetchAll(); 

  // Container (feedbacks Section)
  echo "<div class='tablefeedback'>";
  echo "<p><h1 align='center'>Your Feedback Trips</h1></p>";
  echo "<table border='1'>
  <tr>
    <th>Your Comments</th>
  </tr>";
  echo "</div>";
  
  foreach($feedbacks as $feedback) {
      echo "<tr>";
      echo "<td>".$feedback['comment']."</td>";
  } 
  echo "</table>";

} catch(PDOException $e) {
echo $sql . "<br>" . $e->getMessage();
}
$conn = null;
?>

<div id="overlay" onclick="off()">
  <div id="text">
   <p align="center">If you have account. Please login first</p>
   <p align="center"><a href="login.html">Login</a></p>
  </div>
</div>

<div style="padding:20px" align="center">
  <p><b>If you are interested in creating your own bucket list trips.</b></p>
  <p><b> You can click on</b></P>
  <button onclick="on()">Add Planning Trips</button>

  <script>
function on() {
  document.getElementById("overlay").style.display = "block";
}

function off() {
  document.getElementById("overlay").style.display = "none";
}
</script>
</div>

<!-- Footer -->
<footer class="footer"><br>
  <p>© 2021 Visit to Malaysia All Rights Reserved</p><br>
  <p> Made By Fatin Nursyazwani</p><br>
</footer>
</body>
</html>