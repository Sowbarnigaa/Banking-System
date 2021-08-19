<!DOCTYPE html>
<html>
<head>
<title>Transactions</title>
<style>
table {
  border-collapse: collapse;
  width: 80%;
height:70%;
color:white;
}

td {
  padding: 8px;
  text-align: left;
  border-bottom: 2px solid black;
font-size:150%;

}
th{
padding: 8px;
  text-align: left;
  border-bottom: 2px solid black;
color:Chartreuse;
font-size:150%;

}

a {
color:Chartreuse ;
font-size:150%;
}
h1
{
color:Chartreuse;
font-size:200%;
font-weight:bold;
font-family:Comic Sans MS;
}
</style>
</head>
<body style="background: url(img4.jpg) no-repeat center center fixed; -webkit-background-size: cover;   ">
<br><br>
<center><h1>Transactions</h1></center>
<br>
<?php

$conn=mysqli_connect("localhost","root",'',"tsfbank");
$sql1 = "SELECT * FROM transactions";
$result = mysqli_query($conn, $sql1);
$numrows= mysqli_num_rows($result);

if($result = mysqli_query($conn, $sql1)){
if(mysqli_num_rows($result) > 0){
echo "<center>";
echo "<table>";


echo "<tr>";
echo "<th>Date</th>";
echo "<th>Sender</th>";
echo "<th>Receiver</th>";
echo "<th>Amount</th>";
echo "</tr>";
while($row = mysqli_fetch_array($result)){

echo "<tr >";
echo "<td>" . $row['date'] . "</td>";
echo "<td>" . $row['sender'] . "</td>";
echo "<td>" . $row['receiver'] . "</td>";
echo "<td>" . $row['amount'] . "</td>";
echo "</tr>";
}
echo "</table>";
// Free result set
mysqli_free_result($result);
} else{
echo "No records matching your query were found.";
}
} else{
echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
echo "<br><br>";

echo "</center>";
?>
<center><a href="customers.php">View Customers</a></center>
</body>
</html>