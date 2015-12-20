<?php
session_start();

if( isset($_POST['_action']) )
{
	$action = $_POST['_action'];
	
	switch($action)
	{
		case 'set' :
					$_SESSION['name'] = $_POST['name'];
					break;
	}
}

?>

<form action = "index.php" method = "POST">
	<input type = "hidden" name = "_action" value = "set" 
	<label>Enter name</label>
	<input type = "text" name = "name">
	<input type = "submit" value = "submit"/>
</form>
<a href = "client.php" >Next</a>