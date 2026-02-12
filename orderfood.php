<?php
require "./conection.php";
// $table="CREATE TABLE foodorders (
//     id INT AUTO_INCREMENT PRIMARY KEY,
//     food_items TEXT,
//     guder INT,
//     woyn INT,
//     bedele INT,
//     jambo INT,
//     dashen INT,
//     total_amount INT,
//     payment_method VARCHAR(50),
//     order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP)";
// if(mysqli_query($connect,$table)){
// echo"table created successfully";


// }


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Food items
    if (!empty($_POST['food'])) {
        $food_items = implode(", ", $_POST['food']);
    } else {
        $food_items = "";
    }

    // Drinks
    $guder  = $_POST['guder'] ?? 0;
    $woyn   = $_POST['woyn'] ?? 0;
    $bedele = $_POST['bedele'] ?? 0;
    $jambo  = $_POST['jambo'] ?? 0;
    $dashen = $_POST['dashen'] ?? 0;

    // Total
    $total_amount = $_POST['total_amount'];

    // Payment method
    $payment_method = $_POST['payment_method'];

    // Insert
    $query = "INSERT INTO foodorders 
        (food_items, guder, woyn, bedele, jambo, dashen, total_amount, payment_method)
        VALUES 
        ('$food_items', '$guder', '$woyn', '$bedele', '$jambo', '$dashen', '$total_amount', '$payment_method')";

    if (mysqli_query($connect, $query)) {
        echo "<h2>Order Saved Successfully!</h2>";
        echo "<h3>Total Paid: $total_amount Birr</h3>";
        echo "<a href='orderfood.php'>Make Another Order</a>";
    } else {
        echo "Error: " . mysqli_error($connect);
    }
}

mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Food Order System</title>
<link rel="stylesheet" href="main.css">
</head>
<body id="header2">
  <div class="logo-container">
 <img src="../project img/logo.jpg" alt="Karned Hotel and Spa Logo">
  </div>
  <div class="nav-links">  
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

<h1>Food Order & Payment</h1>

<form id="orderForm" method="POST" action="orderfood.php">

    <h2>Food Menu</h2>

    <label><input type="checkbox" class="food" name="food[]" value="ቀይ ወጥ" data-price="200"> 1.ቀይ ወጥ (200 birr)</label><br>
    <label><input type="checkbox" class="food" name="food[]" value="ጥብስ" data-price="250">   2.ጥብስ (250 birr)</label><br>
    <label><input type="checkbox" class="food" name="food[]" value="ክትፎ" data-price="280">   3.ክትፎ (280 birr)</label><br>
    <label><input type="checkbox" class="food" name="food[]" value="ዶሮ ወጥ" data-price="400"> 4.ዶሮ ወጥ (400 birr)</label><br>
    <label><input type="checkbox" class="food" name="food[]" value="ዱለት" data-price="220">    5. ዱለት (220 birr)</label><br>
    <label><input type="checkbox" class="food" name="food[]" value="ጎረድ ጎረድ" data-price="290"> 6. ጎረድ ጎረድ (290 birr)</label><br>
    <label><input type="checkbox" class="food" name="food[]" value="Pizza" data-price="390">   7. Pizza (390 birr)</label><br>

    <h2>Drinks</h2>

    <label>Guder (50 birr each): <input type="number" name="guder" id="guder" min="0" value="0"></label><br>
    <label>Woyn (60 birr each): <input type="number" name="woyn" id="woyn" min="0" value="0"></label><br>
    <label>Bedele (55 birr each): <input type="number" name="bedele" id="bedele" min="0" value="0"></label><br>
    <label>Jambo (45 birr each): <input type="number" name="jambo" id="jambo" min="0" value="0"></label><br>
    <label>Dashen (65 birr each): <input type="number" name="dashen" id="dashen" min="0" value="0"></label><br>

    <h2>Payment Method</h2>
    <select id="payment_method" name="payment_method">
        <option value="CBE">CBE</option>
        <option value="Telebirr">Telebirr</option>
        <option value="Abyssinia">Abyssinia Bank</option>
        <option value="Awash">Awash Bank</option>
        <option value="Abay">Abay Bank</option>
    </select>

    <!-- Hidden input for total amount -->
    <input type="hidden" id="total_amount" name="total_amount">

    <br><br>
    <button type="button" id="submitOrder">Submit Order</button>

</form>

<script>
// FOOD PRICES
const foodPrices = {
    "ቀይ ወጥ": 200,
    "ጥብስ": 250,
    "ክትፎ": 280,
    "ዶሮ ወጥ": 400,
    "ዱለት": 220,
    "ጎረድ ጎረድ": 290,
    "Pizza": 390
};

// DRINK PRICES
const drinkPrices = {
    guder: 50,
    woyn: 60,
    bedele: 55,
    jambo: 45,
    dashen: 65
};

// HANDLE SUBMIT
document.getElementById("submitOrder").onclick = function () {

    let total = 0;

    // FOOD TOTAL
    document.querySelectorAll(".food:checked").forEach(item => {
        total += foodPrices[item.value];
    });

    // DRINK TOTAL
    total += (document.getElementById("guder").value * drinkPrices.guder);
    total += (document.getElementById("woyn").value * drinkPrices.woyn);
    total += (document.getElementById("bedele").value * drinkPrices.bedele);
    total += (document.getElementById("jambo").value * drinkPrices.jambo);
    total += (document.getElementById("dashen").value * drinkPrices.dashen);

    // SAVE TOTAL TO HIDDEN INPUT
    document.getElementById("total_amount").value = total;

    // SUBMIT FORM TO PHP
    document.getElementById("orderForm").submit();
};
</script>

</body>
</html>
