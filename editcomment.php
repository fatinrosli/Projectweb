<?php
include_once('dbconnect.php');
//include_once('navbarmain.php');

$name = $_GET['name'];
$email = $_GET['email'];
$id = $_GET['id'];
$comment = $_GET['comment'];

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
    try {
        $sqlupdate = "UPDATE feedback SET  comment = '$comment' WHERE email = '$email' AND id = '$id'";
        $conn->exec($sqlupdate);
        echo "<script> alert('Update Success')</script>";
        echo "<script> window.location.replace('feedbackpage.php?email=".$email."&name=".$name."') </script>;";
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
    .container form {
    width: 100%;
    height: 100%;
    padding: 20px;
    background: white;
    border-radius: 4px;
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
    .container form h1 {
    color: rgb(8, 7, 7);
    margin-bottom: 24px;
    text-align: center;
 
  }
  textarea {
    width: 80%;
    height: 50%;
    padding: 12px 20px;
    margin: auto auto;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    /* position: absolute; */
    top: 50%;
    left: 50%;
    font-size: 20px;
    color: black !important;
    /* transform: translate(-50%,-50%);
    -ms-transform: translate(-50%,-50%); */
  }
  input[type=submit] {
    width: 80%;
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
    
    .container {
      margin: 100px auto;
      width: 60%;
      max-width: auto;
      padding: 10px;
      height: 40%;
  }
  .label{
    text-align: left;
  }
    </style>
</head>
<body>

    <div class="container">
    <form action="editcomment.php" method="get" onsubmit="return confirm('Update?');" align="center">
    <h1 >Update Planning:</h1>
        <input type="hidden" name="name" name="name" value="<?php echo$name;?>"><br>
        <input type="hidden" id="email" name="email" value="<?php echo $email;?>"><br>
        <input type="hidden" id="id" name="id" value="<?php echo $id;?>"><br>
        <input type="hidden" id="options" name="options" value="update"><br>
        <label for="comment">Comments/Questions</label><br>
        <textarea  cols="50" rows="6" id="comment"  name="comment"><?php echo $comment;?></textarea><br>
        <input type="submit" value="Update"><br>
    <p align="center"><a href="feedbackpage.php?email=<?php echo $email. '&name='.$name?>">Back</a></p>
    </form>
  </div>
</body>

</html>