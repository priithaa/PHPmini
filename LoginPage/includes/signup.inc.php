<?php 


if(isset($_POST["submit"]))
{
	$name = $_POST["Name"];
	$email = $_POST["Email"];
	$username = $_POST["Username"];
	$pwd = $_POST["pwd"];
	$rpwd = $_POST["rpwd"];

	// error handling

	require_once 'dbh.inc.php';
	require_once 'functions.inc.php';


	if(emptyInputSignup($name, $email, $username, $pwd, $rpwd)!==false)
	{
		header("location: ../signup.php?error=emptyinput");
		exit();

	}

	if(invalidUid( $username)!==false)
	{
		header("location: ../signup.php?error=invalidUid");
		exit();

	}

	if(invalidEmail($email)!==false)
	{
		header("location: ../signup.php?error=invalidEmail");
		exit();

	}

	if(pwdMatch($pwd, $rpwd)!==false)
	{
		header("location: ../signup.php?error=pwderror");
		exit();

	}

	if(uidExists($conn,$username,$email)!==false)
	{
		header("location: ../signup.php?error=usernametaken");
		exit();

	}

	createUser($conn, $name,$email,$username, $pwd);


}

else
{
	header("location: ../signup.php");
	exit();
}