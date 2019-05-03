<html>
<head>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<link rel='stylesheet' type='text/css' href='//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
</head>
<body>
<?php
echo "<body style='background-color:#DAF7A6 '>";
session_start();
$reg = $_SESSION['id_from'];
$id = $_GET['id'];
?>
<h4 class="text-center">Transferring From ID:<?php echo "$reg" ?></h4>
<h4 class="text-center">Transferring To ID:<?php echo "$id" ?></h4>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "credit";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
    if(isset($_POST['value'])){
$sql = "INSERT INTO transfers (trans_to, trans_from) VALUES ($reg,$id)";
$d1 = "SELECT * FROM users WHERE id=".$reg;
$d2 = "SELECT * FROM users WHERE id=".$id;
$result1 = mysqli_query($conn, $d1);
$result2 = mysqli_query($conn, $d2);
if(mysqli_num_rows($result1) > 0 ){

$row1 = mysqli_fetch_assoc($result1);
$row2 = mysqli_fetch_assoc($result2);
$subs =  $row1['current_credit'] - $_POST['value'];
if($subs>0){
$add = $row2['current_credit'] + $_POST['value'];
$up1 = "UPDATE users SET current_credit =$subs WHERE id =$reg";
$up2 = "UPDATE users SET current_credit =$add WHERE id =$id";
mysqli_query($conn, $up1);
mysqli_query($conn, $up2);
$message = "Transfer Successful.";
  echo "<script type='text/javascript'>alert('$message');window.location.href='f2.php';</script>";
}
else{
$message = "Cannot transfer Credit.Try Again.";
  echo "<script type='text/javascript'>alert('$message');window.location.href='f2.php';</script>";
}
}
}
$conn->close();
 ?>
 <form method="post" action="" class="text-center">
   <h3>Type the amount you want to transfer:</h3>
<input type="number" name="value" required>
<input type="submit" class="btn btn-default btn-dark" value="Transfer!">
</form>
