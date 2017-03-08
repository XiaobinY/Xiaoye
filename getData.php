<?php 
	$rows = file("PiggieWeight/weight.dat");
	foreach($rows as $row) {
		list($y,$m,$d,$hh,$mm,$roubao,$huntun) = explode(",", $row);
		$m = $m - 1;
		print "[new Date($y,$m,$d,$hh,$mm), $roubao, $huntun],";
	}
?> 


