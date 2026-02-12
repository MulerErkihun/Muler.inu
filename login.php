
<?php
require "./conection.php";
//table create
  /* $sql="create table users(
ID varchar(23) primary key,
FullName varchar(45) not null,
Sex varchar(7) not null,
Phone varchar(13) not null,
Address varchar(23) not null,
Password varchar(34) not null,
Email varchar(34) not null,
RegisterTime timestamp default current_timestamp on update current_timestamp)";
if(mysqli_query($connect,$sql)){
    echo "table is created successfuly";
}else {
    echo"error creating table" .mysqli_error($connect);

}
mysqli_close($connect);
    */

if (isset($_POST['login'])){
    $username = $_POST['username'];
    $Pass = $_POST['pass']; 
    $selectData = "SELECT * FROM users WHERE FullName ='$username' AND Password ='$Pass'";
    $result=mysqli_query($connect,$selectData);
    if(mysqli_num_rows($result) > 0){
       echo"<script> alert('login succssfuly') </script>";
  require_once "home.html";
  exit();
    }
    else {
        mysqli_close($connect);
        echo "<script>alert('Incorrect username or password')</script>";      
    }
}
    
if(isset($_POST['Register'])){
    $name=$_POST['Name'];
    $ID=$_POST['id'];
    $phone=$_POST['phone'];
    $Email=$_POST['Email'];
    $address=$_POST['address'];
    $password=$_POST['password'];

//     $mini=8;
//     $maxPass=15;

//     if(strlen($password)>$maxPass || strlen($password)<$mini){
        
//     echo "<script>alert('password is not strong')</script>";
//         echo"Error".mysqli_error($connect);
//         exit();
//       require_once "login.php";
//    }


 
    $Insert="INSERT INTO users(FullName, ID, phone, Email, Address, Password)
            VALUES('$name','$ID','$phone','$Email','$address','$password')";  

    if(mysqli_query($connect,$Insert)){  

       echo"<script> alert('registerd succssfuly') </script>";
          require_once "login.php";
           mysqli_close($connect);
    }
    else{
        echo"Error".mysqli_error($connect);
        exit();
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>guest page</title>
  <link rel="stylesheet" href="main.css">
   <style>
       .form-group {
    max-width: 320px;
    padding: 20px;
    background: #28a7e2ff;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(229, 129, 129, 0.1);
    font-family: Arial, sans-serif;
}

.form-group label {
    font-weight: bold;
    margin-bottom: 6px;
    display: block;
    border-radius: 8px;
}

.form-group input[type="password"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 8px;
    outline: none;
    transition: .3s;
}


.form-group button {
    padding: 15px 15px;
    border: none;
    border-radius: 20px;
    cursor: pointer;
    font-weight: bold;
    background-color:blue;
      color: #e9eaf4ff;
}

button[name="login"] {
    background: #7674eaff;
    color: #f6f5fdff;
   
}

button[name="login"]:hover {
    background: #9ab6d6ff;
       padding: 15px 15px;

}

.form-group button:hover {
  color:black;
  background: #e6ecf3ff;
}

table td button {
    margin-right: 10px;
} 
    </style>
</head>
<body style="background-color: rgba(133, 160, 153, 1);">
 <div style="margin-left: 17%;box-shadow:0 0 300;background-color:white;width:fit-content;">
    <a href="guest.html">guestHome</a>
  
    <form id="login" action="login.php" method="post" style="margin-top: 3px;">
                <div class="form-group"><br>
                    <label for="users">User Name</label><br>
                    <input type="text" id="usersnam" name="username" class="form-control" placeholder="Enter your User Name" required><br>
                </div><br>
                <div class="form-group">
                    <label for="password">Password</label><br>
                    <input type="password" id="password" name="pass" class="form-control" placeholder="Enter your password" required><br>
                    <button type="submit"  style="width: 40%;" name="login">Login</button>
                    
                      <button onclick="Register();"> Sign up</button> 
                </div>
                     
            </form>
            <div>
    

 
    <div class="modal" id="register" style="display: none;">
        <div class="modal-content">
            <div class="modal-header">
                <h2> Registration</h2>
                <button class="close-modal" id="closeRegisterModal"></button>
            </div>
            <form id="registerForm" action="login.php" method="post">
                <div class="form-row">
                    <div class="form-group">
                        <label for="firstName"> Name</label><br>
                        <input type="text" id="firstName" class="form-control" placeholder="Enter your  name" name="Name" required><br>
                    </div>
                    <div class="form-group">
                        <label for="lastName">ID</label><br>
                        <input type="text" id="id" class="form-control" placeholder="Enter your ID" name="id" required><br>
                    </div>
                    <div class="form-group">
                        <label for="lastName">Phone</label><br>
                        <input type="text"  class="form-control" placeholder="Enter your phone" name="phone" required><br>
                    </div>
                </div>

                <div class="form-group">
                    <label for="">Email</label><br>
                    <input type="email" id="Email" class="form-control" placeholder="Enter your email" name="Email" required>
                </div>

                <div class="form-group">
                    <label for="email"> Address</label><br>
                    <input type="text"  class="form-control" placeholder="Enter your  address" name="address" required><br>
                </div>

                
                
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="regPassword">Password</label><br>
                        <input type="password" id="regPassword" class="form-control" placeholder="Create a password" name="password" required>
                        <button type="submit"  style="width: 27%;" name="Register" >Register</button>
                    </div>
                    
                </div>
                
            </form>
        
      </div>
<script>

  function Register(){
let register=document.getElementById("register");
let login=document.getElementById("login");
   register.style.display="block";
  if(register.style.display=="block"){
   login.style.display="none";
  }
  else{

       login.style.display="block";
  }

  }


</script>
  
</body>
</html>

