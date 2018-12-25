<?php
echo "Form Not submitted";

echo "<pre>";
print_r($_POST);
echo "</pre>";

if($_POST)
{

echo "Form submitted";
}

?>

<html>

	<form method="POST">
	<input type=text placeholder="Enter Name">
	<input type="submit" value="Go">
	</form>

</html>