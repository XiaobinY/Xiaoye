<!DOCTYPE html>
<html>
<head>
<style>
table {
	border: 1px solid black;
	border-collapse: collapse;
}

td {
	padding: 5px;
}
</style>
</head>
<body>

<?php
print "<table border = '1'>";
for($x = 1; $x <= 6; $x ++) {
	print "<tr>";
	for($y = 1; $y <= 5; $y ++) {
		$total = $x * $y;
		print "<td>".$x." * ".$y." = ".$total."</td>";
	}
	print "</tr>";
}
print "</table>";
?>

</body>
</html>
