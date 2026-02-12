<?php
require "./conection.php";

/* FETCH ROOMS */
$result = mysqli_query($connect, "SELECT * FROM reserveroom");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Check Room</title>

<style>
body{
    font-family: Arial, sans-serif;
    background:#f4f6f8;
}

#header{
    background:#2c3e50;
    padding:15px;
}

#header img{
    height:50px;
    vertical-align:middle;
}

#header a{
    color:white;
    margin-left:15px;
    text-decoration:none;
}

h1{
    text-align:center;
    margin-top:20px;
}

table{
    width:90%;
    margin:20px auto;
    border-collapse:collapse;
    background:white;
    box-shadow:0 4px 10px rgba(0,0,0,0.1);
}

th{
    background:#3498db;
    color:white;
    padding:12px;
}

td{
    padding:10px;
    border-bottom:1px solid #ddd;
    text-align:center;
}

tr:hover{
    background:#f1f1f1;
}

.no-data{
    text-align:center;
    font-weight:bold;
    padding:15px;
}
</style>
</head>
<body>
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

<h1>Reserved Rooms</h1>

<table>
<tr>
    <th>Room Type</th>
    <th>Room Number</th>
    <th>End Date</th>
</tr>

<?php
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
?>
<tr>
    <td><?= $row['room_type'] ?></td>
    <td><?= $row['room_number'] ?></td>
    <td><?= $row['end_date'] ?></td>
</tr>
<?php
    }
} else {
    echo "<tr><td colspan='3' class='no-data'>No rooms reserved</td></tr>";
}

mysqli_close($connect);
?>

</table>

</body>
</html>
