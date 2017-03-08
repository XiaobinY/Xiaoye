<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php
$string = "apple orange banana strawberry";
$fruitArray = explode(" ", $string);
print "<p>".$fruitArray[rand(0,3)]."</p>";
?>

</body>
</html>