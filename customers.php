
<!DOCTYPE html>
<html>
<head>
<title>Customers</title>
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
}
h1
{
color:white;
font-size:200%;
font-weight:bold;
font-family:Comic Sans MS;
}
</style>
</head>
<body style="background: url(img4.jpg) no-repeat center center fixed; -webkit-background-size: cover;   ">
<br><br>
<center><h1>Customer Details</h1></center>
<br><br><br>
<?php

$conn=mysqli_connect("localhost","root",'',"tsfbank");
$sql1 = "SELECT * FROM customers";
$result = mysqli_query($conn, $sql1);
$numrows= mysqli_num_rows($result);

if($result = mysqli_query($conn, $sql1)){
if(mysqli_num_rows($result) > 0){
echo "<center>";
echo "<table>";


echo "<tr>";
echo "<th>Account Number</th>";
echo "<th>Name</th>";
echo "<th>Phone number</th>";
echo "<th>E-Mail ID</th>";
echo "<th>City</th>";
echo "<th>Balance</th>";
echo "<th>View</th>";
echo "</tr>";
while($row = mysqli_fetch_array($result)){

echo "<tr >";
echo "<td>" . $row['account_no'] . "</td>";
echo "<td>" . $row['name'] . "</td>";
echo "<td>" . $row['mobile'] . "</td>";
echo "<td>" . $row['email'] . "</td>";
echo "<td>" . $row['city'] . "</td>";
echo "<td>" . $row['balance'] . "</td>";

$id=$row['account_no']; 
echo ('<td><a href="view.php?id=' . $id . '">' . "view" . '</a></td>');
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
echo "</center>";
?>
</body>
</html>