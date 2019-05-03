<html>
<head>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<link rel='stylesheet' type='text/css' href='//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
</head>
<body>
<?php
$username = "root";
$password = "";
$database = "credit";
$mysqli = new mysqli("localhost", $username, $password, $database);
$query = "SELECT * FROM users";
echo "<body style='background-color:#ddbbb5'>";
echo "<b><h1> <center>Select User you want to transfer credit to:</center> </b></h1> <br> <br>";

if ($result = $mysqli->query($query)) {
  echo "<table>";
              echo "<tr>";
  // echo '<b>'."ID"." "."NAME"." "."EMAIL"." "."CREDIT".'</b><br/>';
  echo "<th>ID</th>";
                echo "<th>NAME</th>";
            echo "</tr>";
    while ($row = $result->fetch_assoc()) {



        // echo '<b>'.$field1name."  ".$field2name.'</b>'."   ".$field3name." ". $field4name.'<br />';
        // echo $field3name.'<br />';
        // echo $field4name.'<br />';
        echo "<tr>";
               echo "<td>".$row['id'].  "</td>";
               echo "<td>" . "<a href=final.php?id=$row[id]>$row[name]</a>" . "</td>";

           echo "</tr>";
       }
       echo "</table>";

/*freeresultset*/
$result->free();
}
?>
