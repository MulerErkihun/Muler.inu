<?php
require "./conection.php";
// table create
//    $sql="create table comment(
//   sendername varchar(20) not null,
//   comments varchar(1000) not null)";
// if(mysqli_query($connect,$sql)){
//     echo "table is created successfuly";
// }else {
//     echo"error creating table" .mysqli_error($connect);

// }
// mysqli_close($connect);

if(isset($_POST['send'])){
    $sender=$_POST['name'];
    $comments=$_POST['comment'];
    $Insert="INSERT INTO comment(sendername,comments)
            VALUES('$sender','$comments')";  

    if(mysqli_query($connect,$Insert)){  

       echo"<script> alert('comments are send succssfuly') </script>";
       require_once "sendcomment.php";
      
    }
    else{
        echo"Error".mysqli_error($connect);
        exit();
    }
} 
?>
<html>
<head>
  <title>Report</title>
  <link rel="stylesheet" href="main.css">
</head>
<body style="background-color: rgba(70, 182, 158, 1);">
  <div id="header">
    <img src="../project img\logo.jpg" alt="karned hotel">
    <a href="home.html">Home</a>
    <a href="about.html">About us</a>
    <a href="contact.html">contactus</a>
    <a href="checkavialiability.php">checkavialiability</a>
    <a href="reserveroom.php">reserveroom</a>
    <a href="orderfood.php">Orderfood</a>
    <a href="sendcomment.php">sendcomment</a>
    <!-- <a href="editcomment.php">editcomment</a> -->
     <a href="guest.html">logout</a>
  </div>
  </div>
  <div class="log">
    <h1>comments</h1>
    <form action="sendcomment.php" method="post">
    <label><h1>sendername:</h1></label>
    <input type="text" name="name" >

    <label><h1>comments:</h1></label>
    <textarea name="comment" required placeholder="write your comment here"></textarea>

    <button style="color: blue;background-color: rgba(174, 222, 85, 1);" 
            type="submit" name="send">Send</button>
</form>
  </div>
  <div id="footer" style="margintop: 150px;">
    &copy;2025 alright reserved!
    <a href="facebook:https://www.facebook.com/share/p/1A2rekVTX5/"> <img src="../project img\Facebook.jpg"
        alt="FB"></a>
    <a href="https://www.telegram.org"><img src="../project img\telegram.jpg" alt="TG"></a>
    <a href="https://www.Instagram.com"> <img src="../project img\Instagram.jpg" alt="IG">

  </div>
</body>

</html>