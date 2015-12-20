<?php 
session_start();

if(isset($_SESSION['id']))
{
	// unset($_SESSION['id']);
	// unset($_SESSION['name']);
	session_unset();
	header('Location: index.php');
}

