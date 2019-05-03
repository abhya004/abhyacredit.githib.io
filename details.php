<?php
session_start();
// Include the connection file.
include("f2.php");
$id = $_GET['id'];
// Select all the rows in the markers table
$query = 'SELECT * FROM users WHERE id = "'.$id.'" ';
// mysql_real_escape_string($id));
if ($result = $mysqli->query($query)) {
  // echo "<table>";
  //             echo "<tr>";
  // // echo '<b>'."ID"." "."NAME"." "."EMAIL"." "."CREDIT".'</b><br/>';
  // echo "<th>ID</th>";
  //               echo "<th>NAME</th>";
  //           echo "</tr>";
    while ($row = $result->fetch_assoc()) {



        // echo '<b>'.$field1name."  ".$field2name.'</b>'."   ".$field3name." ". $field4name.'<br />';
        // echo $field3name.'<br />';
        // echo $field4name.'<br />';
        // echo "<tr>";
              echo nl2br("<h3>User Details:</h3>");
               echo nl2br("<b><th>ID:</b></th><td> ".$row['id']."\n</td>");
               echo nl2br("<b><th>NAME:</b></th><td> " . $row['name'] . "\n</td>");
               echo nl2br("<b><th>EMAIL:</b></th><td> ".$row['email'].  "\n</td>");
               echo nl2br("<b><th>CURRENT_CREDIT:</b></th><td> ".$row['current_credit'].  "\n</td>");
              $_SESSION['id_from'] = $row['id'];
           // echo "</tr>";
       }
       // echo "</table>";

/*freeresultset*/
$result->free();
}
?>
<div class="text-center cont">
<button type="button" class="btn btn-success" onclick="location.href = 'transfer_to.php';">Transfer Credit</button>
</div>
