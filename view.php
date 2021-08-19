<!DOCTYPE html>
<html>
<head>
<title>View</title>
<style>
table {
  border-collapse: collapse;
  width: 40%;
height:50%;

}

th,td,tr {
 padding:10px;
  text-align: left;
  border-bottom: 2px solid black;
color:white;
font-size:150%;
}
h1
{
color:Chartreuse ;
font-size:250%;
font-weight:bold;
font-family:Comic Sans MS;
}
a {
color:Chartreuse ;
font-size:150%;
}
p{
color:white;
font-size:200%;
font-weight:bold;
font-family:Comic Sans MS;
}
</style>
</head>
<body style="background: url(img4.jpg) no-repeat center center fixed; -webkit-background-size: cover; ">
<br><br>
<center><h1>Account Details</h1></center>
<br>
<p>

<?php
$conn=mysqli_connect("localhost","root",'',"tsfbank");
$id = $_GET['id'];


$result = mysqli_query($conn,"SELECT account_no,name,mobile,email,city,balance FROM customers WHERE account_no = $id");


$numrows= mysqli_num_rows($result);

if($result = mysqli_query($conn, "SELECT account_no,name,mobile,email,city,balance FROM customers WHERE account_no = $id")){
if(mysqli_num_rows($result) > 0){
echo "<center>";
echo "<table>";

while($row = mysqli_fetch_array($result)){

echo "<tr align=center>";
echo "<td>" ."Account Number :         ". $row['account_no'] . "</td></tr>";
echo "<tr align=center><td>" ."Name :         ". $row['name'] . "</td></tr>";
echo "<tr><td>" ."Phone number :       ".$row['mobile'] . "</td></tr>";
echo "<tr><td>" ."E-Mail ID :         ". $row['email'] . "</td></tr>";
echo "<tr><td>" ."City :         ". $row['city'] . "</td></tr>";
echo "<tr><td>" ."Balance :            ".$row['balance'] . "</td></tr>";

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
echo ('<a href="transfer.php?id=' . $id . '">' . "TRANFER MONEY" . '</a>');
echo "</center>";


?></p></body>
</html>