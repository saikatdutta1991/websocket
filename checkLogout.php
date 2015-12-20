<?php

if( isset($_SESSION['id']) )
{
	header('Location: client.php');
}