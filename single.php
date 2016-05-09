<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<body>
<?php
require ("db_info.php"); // database connection is here

//////Displaying Data/////////////
$id=$_GET['id']; // Collecting data from query string
if(!is_numeric($id)){ // Checking data it is a number or not
echo "Data Error"; 
exit;
}

$count=$database->prepare("select * from markers where id=:id ");
$count->bindParam(":id",$id,PDO::PARAM_INT,3); 

if($count->execute()){
echo " Success ";
$row = $count->fetch(PDO::FETCH_OBJ);
} 

echo "<table>";
echo "
<tr bgcolor='#f1f1f1'><td><b>Name</b></td><td>$row->name</td></tr>
<tr><td><b>Class</b></td><td>$row->class</td></tr>
<tr bgcolor='#f1f1f1'><td><b>Mark</b></td><td>$row->mark</td></tr>
<tr><td><b>Address</b></td><td>$row->address</td></tr>
<tr bgcolor='#f1f1f1'><td><b>Image</b></td><td>$row->img</td></tr>
";
echo "</table>";

//////////////////// 
?>
</body>
</html></body>
</html>