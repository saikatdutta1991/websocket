<?php
session_start();

require_once 'checkLogout.php';

require_once 'DBConnection.php';

if( isset($_POST['_action']) )
{
	$action = $_POST['_action'];
	
	switch($action)
	{
		case 'register' :
					$name = $_POST['name'];
					$email = $_POST['email'];
					$password = $_POST['password'];
					$confirm_password = $_POST['confirm_password'];

					if($name != '' && $email != '' & $password != '' & $confirm_password != '')
					{
						if($password == $confirm_password)
						{
							register($name, $email, $password);
						}
						
					}
					break;

		case 'login':					
					$email = $_POST['email'];
					$password = $_POST['password'];

					if($email != '' & $password != '')
					{
						$data = array();
						if(doLogin($email, $password, $data))
						{
							$_SESSION['id'] = $data['id'];
							$_SESSION['name'] = $data['name'];

							header('Location: client.php');
						}
						else
						{
							echo 'Login Failed';
						}
						
					}
					break;

	}
}

?>

<h1>Registration Form</h1>
<form action = "index.php" method = "POST">

	<input type = "hidden" name = "_action" value = "register" 

	<label>Enter name</label>
	<input type = "text" name = "name"><br>

	<label>Email</label>
	<input type = "email" name = "email"><br>

	<label>Password</label>
	<input type = "password" name = "password"><br>

	<label>Confirm Password</label>
	<input type = "password" name = "confirm_password"><br>

	<input type = "submit" value = "submit"/>
</form>



<h1>Login Form</h1>
<form action = "index.php" method = "POST">

	<input type = "hidden" name = "_action" value = "login" 

	<label>Email</label>
	<input type = "email" name = "email"><br>

	<label>Password</label>
	<input type = "password" name = "password"><br>

	<input type = "submit" value = "submit"/>
</form>


<?php $conn->close(); ?>