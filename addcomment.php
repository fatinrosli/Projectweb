<?php
include_once('dbconnect.php');
// include_once('navbarmain.php');

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

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $comment = $_GET['comment'];
    
  
    try {
      $sql = "INSERT INTO feedback (id, comment, email)
      VALUES ('$id','$comment', '$email')";
      // use exec() because no results are returned
      $conn->exec($sql);
      echo "<script> alert('Insert Success')</script>";
      echo "<script> window.location.replace('feedbackpage.php?email=".$email."&name=".$name."') </script>;";
  
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
    <title>Feedback Trips</title>
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
    .container form h1 {
    color: rgb(8, 7, 7);
    margin-bottom: 24px;
    text-align: center;
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
    </style>
</head>
<body>
<div class="container">
<form action="addcomment.php" method="get"  onsubmit="return confirm('Are you sure?');">
        <h1 >Please Share Experiences</h1>
         <input type="hidden" name="name" name="name" value="<?php echo$name;?>"><br>
        <input type="hidden" name="email" name="email" value="<?php echo$email;?>"><br>
        <input type="hidden" name="id" name="id" value="" required><br>
        <label for="comment">Comments/Questions</label><br>
        <textarea  id="comment"  name="comment" value=" " placeholder="Please write your experinces...."></textarea>
        <br>
            <input type="submit" value="Submit"><br>
        <br>
</form>
       </div>
</body>
</html>