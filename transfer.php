<!DOCTYPE html>
<html>
<?php

$con=mysqli_connect("localhost","root",'',"tsfbank");
 $id = $_GET['id'];


?>



<!DOCTYPE html>
<html>
<head>
  <title>Transfer Money</title>
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
<br><p>
<form method="POST"><center>
<font size="+3" face = "Comic sans MS">Reciever Name:  </font>
  <select name="account_noo">
    <option disabled selected >-- Select Name--</option>
    <?php

      
        $records = mysqli_query($con, "SELECT name From customers where account_no!=$id");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option name='"."account_noo"."' value='". $data['name'] ."' >" .$data['name'] ."</option>";  // displaying data in option menu
        }	
    ?>  
  </select>
<br><br><br>
 <label for="amount"><span><font size="+3" face = "Comic sans MS">  Amount(in Rs.):</font></span></label>
<input type="text" name="amount" required oninput="validate()" />
 <br><br><br><br>
<input type="submit" name="submit" value="PAY NOW" style="height: 40px; width: 150px; font-size: 20px; color: white; background-color: #4CAF50">        
</form></center></p>
<?php


$con = mysqli_connect("localhost","root","","tsfbank");
$con1 = mysqli_connect("localhost","root","","tsfbank");
$resultm = mysqli_query($con, "SELECT * FROM customers WHERE account_no = '$id'");
$rowm = mysqli_fetch_array($resultm,MYSQLI_ASSOC);
$my_balance = $rowm['balance'];
$sname=$rowm['name'];
if($_SERVER["REQUEST_METHOD"] == "POST") {
  $account_noo = $_POST["account_noo"];

  $amount = $_POST['amount'];
  $resulto = mysqli_query($con, "SELECT * FROM customers WHERE name = '$account_noo'");
    $rowo = mysqli_fetch_array($resulto,MYSQLI_ASSOC);
    $other_balance = $rowo['balance'];
    $my_balance = $my_balance - $amount;
    $other_balance = $other_balance + $amount;
    $date = date("Y-m-d");
    $remarko = $id;
    $c = mysqli_multi_query($con, "update customers set balance = '$my_balance' where account_no = '$id'; update customers set balance = '$other_balance' where name = '$account_noo';");
    $s = mysqli_multi_query($con1, "INSERT INTO transactions VALUES('$date', '$sname','$account_noo','$amount');");
    if($c && $s) {header("refresh:0;url=success.html"); } else {echo "no";}
    }
 

?>

</body>
</html>