<html>
<head>
 <title> Sorting students records </title>
</head>
<body>
<?php
function selectionSort($array) {
$length = count($array);
for ($j = 0; $j < $length-1; $j++) {
$iMin = $j;
for ($i = $j+1; $i < $length; $i++) {
if ($array[$i] < $array[$iMin]) {
$iMin = $i;
}
}
if ($iMin != $j) {
// swap
$temp = $array[$j];
$array[$j] = $array[$iMin];
$array[$iMin] = $temp;
}
}
return $array;
}

$con=@mysql_connect('127.0.0.1','root','');
mysql_select_db('test');
$sql="select * from student";
$result=mysql_query($sql) or die("No such user: " . mysql_error());
if (mysql_num_rows($result) == 0)
{
echo "No matching records!!!!";
}
$i=0;
while($row=mysql_fetch_row($result))
{
 $n[$i] = $row[0];
 $usn[$i] = $row[1];
 $add[$i] = $row[2]; 
 $email[$i] = $row[3];
 $i = $i+1;
 
}
$a = selectionSort($n);
echo "<table border>
 <th> Name </th>
 <th> USN </th>
 <th> address </th>
 <th> Email </th>";
for ($j = 0; $j < count($a); $j++)
{
 for ($k = 0; $k < count($a); $k++)

 {
 
 if($a[$j] == $n[$k])
 { 
 echo "<tr>
 <td>$n[$k]</td>
 <td>$usn[$k]</td>
 <td>$add[$k]</td>
 <td>$email[$k]</td>
 <tr>";
 }
 }
}
echo"</table>";
?>
</body></html>