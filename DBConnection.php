<?php
$servername = "localhost";
$username = "root";
$password = "root";
$db = 'chat';

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
} 


function register($name, $email, $password)
{

	$sql = 'INSERT INTO user (name, username, password) VALUES ("'. $name .'", "'. $email .'", "'. $password .'")';

	if ($GLOBALS['conn']->query($sql) === TRUE) 
	{
    	echo "New record created successfully";
	} 
	else 
	{
    	die("Error: " . $sql . "<br>" . $GLOBALS['conn']->error);
	}

}

function doLogin($email, $password, &$data)
{

	$sql = 'SELECT * FROM user WHERE username = "'. trim($email) .'"';

	$result = $GLOBALS['conn']->query($sql);

	if ($result->num_rows > 0) 
	{
    	// output data of each row
    	while($row = $result->fetch_assoc()) 
    	{
        	if($row['password'] === $password)
        	{
        		$data['id'] = $row['id'];
        		$data['name'] = $row['name'];
        		$data['email'] = $row['username'];
        		
        		return true;
        	}
    	}
	} 
	else 
	{
    	return false;
	}
}


function getAll()
{
    $sql = 'SELECT * FROM user';

    $result = $GLOBALS['conn']->query($sql);

    if ($result->num_rows > 0) 
    {
        return $result;
    } 
    else 
    {
        return false;
    }   
}