<?php
function OpenCon()
 {
 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $db = "credit";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);

 return $conn;
 }

function CloseCon($conn)
 {
 $conn -> close();
 }
 $conn = OpenCon();
echo "Connected Successfully";
$query = "SELECT * FROM `users`";
        $result = mysqli_query($link, $query);
        while ($row = mysqli_fetch_assoc($result)){
          echo $row['name'];
        }
CloseCon($conn);

?>
