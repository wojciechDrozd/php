<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Day of the week!</title>
</head>
<body>

<?php

$dayofweek = date("w");

switch($dayofweek){
	case 0:
		echo "<p><b>it's Sunday!<b><p>";
		break;
	case 1:
		echo "it's Monday!";
		break;
	case 2:
		echo "it's Tuesday!";
		break;
	case 3:
		echo "it's Wednesday!";
		break;
	case 4:
		echo "it's Thursday!";
		break;
	case 5:
		echo "it's Friday!";
	case 6:
		echo "it's Saturday!";
		break;
}

?>
</body>
</html>
