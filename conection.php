<?php 

$hostname="localhost";
$username="root";
$password="";
$dbName="admin";
$connect=mysqli_connect($hostname,$username,$password,$dbName);
if ($connect==false){
  echo"<script> alert('not connect to db') </script>";
}

// if(isset($_POST['submit'])){
//   $username=$_POST['name'];
//   $password=$_POST['password'];
//   // $id=$_POST['id'];
// $insert="INSERT INTO users(username,password) VALUES('$username','$password')";
//  mysqli_query($connect,$insert);



// }

?>
