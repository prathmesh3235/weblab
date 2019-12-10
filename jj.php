<html>
<body>
<style>
table, td, th
{
border: 1px solid black;
width: 33%;
text-align: center;
border-collapse:collapse;
background-color:lightblue;
}
table { margin: auto; }
</style>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prog10";
$a=[];
$conn = mysqli_connect($servername, $username, $password, $dbname);
$sql = "SELECT * FROM student";
$result = $conn->query($sql);
echo "<br>";
echo "<center> BEFORE SORTING </center>";
echo "<table border='2'>";
echo "<tr>";
echo "<th>USN</th><th>NAME</th><th>Address</th></tr>";
if ($result->num_rows> 0)
{
while($row = $result->fetch_assoc()){
echo "<tr>";
echo "<td>". $row["USN"]."</td>";
echo "<td>". $row["NAME"]."</td>";
echo "<td>". $row["ADDRESS"]."</td></tr>";
array_push($a,$row["USN"]);
}
}
else
echo "Table is Empty";
echo "</table>";
sort($a);
$c=[];
$d=[];
$result = $conn->query($sql);
if ($result->num_rows> 0)// output data of each row
{
while($row = $result->fetch_assoc()) {
for($i=0;$i<count($a);$i++) {
if($row["USN"]== $a[$i]) {
$c[$i]=$row["NAME"];
$d[$i]=$row["ADDRESS"];
}
}
}
}
echo "<br>";
echo "<center> AFTER SORTING <center>";
echo "<table border='2'>";
echo "<tr>";
echo "<th>USN</th><th>NAME</th><th>Address</th></tr>";
for($i=0;$i<count($a);$i++) {
echo "<tr>";
echo "<td>". $a[$i]."</td>";
echo "<td>". $c[$i]."</td>";
echo "<td>". $d[$i]."</td></tr>";
}
echo "</table>";