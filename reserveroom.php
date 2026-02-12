<?php
require "./conection.php";
// $sql= "create table reserveroom(
// name varchar(30) not null,
// phone varchar(15) not null,
// room_number varchar(10) not null,
// room_type varchar(20) not null
// amount int not null,
// ftp varchar(30) not null,
// payment varchar(20) not null,
// end_date varchar(30) not null,
// reserve_time timestamp default current_timestamp on update current_timestamp
// )";
// if(mysqli_query($connect,$sql)){
//     echo "table is created successfuly";
// }else {
//     echo"error creating table" .mysqli_error($connect);
// }
// mysqli_close($connect);
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $room_number=$_POST['dropdownroom'];
    $room_type=$_POST['roomtype'];
    $amount=$_POST['amount'];
    $ftp=$_POST['ftp'];
    $payment=$_POST['pay'];
    $end_date=$_POST['end'];
    $Insert="INSERT INTO reserveroom(name,phone,room_number,room_type,amount,ftp,payment,end_date)
            VALUES('$name','$phone','$room_number', '$room_type','$amount','$ftp','$payment','$end_date')";  

    if(mysqli_query($connect,$Insert)){  

       echo"<script> alert('room reserved succssfuly') </script>";
        require_once "reserveroom.php";
    }
    else{
        echo"Error".mysqli_error($connect);
        exit();

    }
    mysqli_close($connect);
}

// //display reserveroom

// if(isset($_POST['display'])){
//     $select= "SELECT * FROM reserveroom";
//     $result=mysqli_query($connect,$select);
//     if(mysqli_num_rows($result) > 0){
//         while($row = mysqli_fetch_array($result)){
//             echo "Name: " . $row['name'] . "<br>";
//             echo "Phone: " . $row['phone'] . "<br>";
//             echo "Room Number: " . $row['room_number'] . "<br>";
//             echo "Amount: " . $row['amount'] . "<br>";
//             echo "FTP: " . $row['ftp'] . "<br>";
//             echo "Payment Method: " . $row['payment'] . "<br><hr>";
//             echo "Room type: " . $row['room_type'] . "<br><hr>";
//             echo "end date: " . $row['end_date'] . "<br><hr>";
//         }
//     } else {
//         echo "No reservations found.";
//     }
//     mysqli_close($connect);
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reserveroom</title>
        <link rel="stylesheet" href="main.css">
</head>

<body style="background-color: rgba(196, 196, 229, 1);">
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
    <div id="bed">
         <form action="reserveroom.php" method="post">
           <fieldset style="width:300px; height:400px; background-color:rgba(31, 132, 233, 0.5);">
            <legend><h3>Reserve Your Room</h3></legend>
         <bold>
            <label for="name">name:</label>
            <input type="text" id="name" name="name"><br>
            <label for="phone">phone number:</label>
            <input type="tel" id="phone" name="phone" placeholder="+251" required /><br>
            <label for="room_number">Room_number:</label>
            <select name="dropdownroom">
                <option value="8">room1</option>
                <option value="1">Room1</option>
                <option value="2">Room2</option>
                <option value="3">Room3</option>
                <option value="4">Room4</option>
                <option value="5">Room5</option>
                <option value="6">Room6</option>
                 <option value="7">Room7</option>
            </select><br>
             <label for="room_type">Room_type:</label>
            <select name="roomtype">
                <option value="single">single</option>
                <option value="double">double</option>
                <option value="threephase">3phase</option>
            </select><br>
            <label for="I am">i am</label>
            <select name="dropdown">
                <option value="single">single</option>
                <option value="pair">pair</option>
            </select><br>
            <label for="amount"> total Amount (Birr):</label>
            <input type="number" id="amount" name="amount" required><br>
            <lable for="ftp">ftp:</label>
            <input type="text" id="ftp" name="ftp" required><br>
             <label for="payment">payment method:</label>
            <select name="pay" id="bill">
                <option value="cbe">cbe</option>
                <option value="telebirr">telebirr</option>
                <option value="abisinia">abisinia</option>
                <option value="awash">awash</option>
                <option value="abay">abay</option>
            </select><br> 
             <label for="enddate">$end_date:</label>
             <input type="date" id="date" name="end" required><br>
            <input type="submit" value="submit" name="submit"><br>
             <!-- <input type="submit" value="display" name="display">  -->
            </bold> 
        </fieldset>
        </form>
        <h2>room reserve</h2>
        <img src="pic1.jpg" alt="room1">
        <h2>room1</h2>
        <li>price:1000birr</li>
        <li>free fast wifi</li>
        <li>g+1</li>
        <img src="pic4.jpg" alt="room4">
        <h2>room2</h2>
        <li>price:700birr</li>
        <li>free fast wifi</li>
        <li>g+2</li>
        <img src="pic6.jpg" alt="Room5">
        <h2>room3</h2>
        <li>price:800birr</li>
        <li>free fast wifi</li>
        <li>g+2</li>
       
           
            <h3>our acount:</h3>
            <table border="1px" cellpadding="10px" cellspacing="0px" width="5%"; height="5%">
                <tr>
                    <th>bank name</th>
                    <th>account number</th>
                </tr>
                <tr>
                    <td>cbe</td>
                    <td>100053734629</td>
                </tr>
                <tr>
                    <td>telebirr</td>
                    <td>0912345678</td>
                </tr>
                <tr>
                    <td>abisinia</td>
                    <td>1234556</td>
                </tr>
                <tr>
                    <td>awash</td>
                    <td>13348957</td>
                </tr>
                <tr>
                    <td>abay</td>
                    <td>10297384</td>
                </tr>
            </table>
    </div>
    </div>
    <div id="footer">&copy;2025 alright reserved!</div>
</body>

</html>