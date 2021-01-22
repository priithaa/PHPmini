<?php 


function emptyInputSignup($name, $email, $username, $pwd, $rpwd)
{
	if(empty($name)||empty($email)||empty($username)||empty($pwd)||empty($rpwd))
		return true;
	return false;
}


function invalidUid( $username)
{
	if(!preg_match("/^[a-zA-Z0-9]*$/", $username))
		return true;
	return false;
}


function invalidEmail($email)
{
	if(!filter_var($email, FILTER_VALIDATE_EMAIL))
		return true;
	return false;
}


function pwdMatch($pwd, $rpwd)
{
	if($pwd!==$rpwd)
		return true;
	return false;
}


function uidExists($conn,$username,$email)
{
	$sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
	$stmt = mysqli_stmt_init($conn);

	if(!mysqli_stmt_prepare($stmt, $sql))
	{
		header("location: ../signup.php?error=stmtfaileduid");
		exit();
	}


	mysqli_stmt_bind_param($stmt, "ss",$username, $email);
	mysqli_stmt_execute($stmt);

	$resultData = mysqli_stmt_get_result($stmt);


	if($row = mysqli_fetch_assoc($resultData))
	{
		return $row;
	}

	mysqli_stmt_close($stmt);
	return false;
}



function createUser($conn, $name,$email,$username, $pwd)
{
	$sql = "INSERT INTO users (usersName,usersEmail,usersUid,usersPwd) VALUES (?,?,?,?);";

	$stmt = mysqli_stmt_init($conn);

	if(!mysqli_stmt_prepare($stmt, $sql))
	{
		header("location: ../signup.php?error=stmtfailedfinal");
		exit();
	}

	$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
	// protects the password

	mysqli_stmt_bind_param($stmt, "ssss",$name, $email,$username,$hashedPwd );
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	header("location: ../signup.php?error=none");
	exit();

}


function emptyInputLogin( $username, $pwd)
{

	if(empty($username)||empty($pwd))
		return true;
	return false;
}

function loginUser($conn, $username, $pwd)
{
	$uidExists = uidExists($conn,$username, $username);

	// two parameter of the same type coz we always check with either username and email also the script has an OR.
	 if($uidExists===false)
	 {
	 	header("location:../login.php?error=usernotfound");
	 	exit();
	 }

	$pwdHashed = $uidExists["usersPwd"];

	$checkPwd = password_verify($pwd, $pwdHashed);

	if($checkPwd ===false)
	{
	header("location:../login.php?error=usernotfound");
	 	exit();	
	}
	elseif($checkPwd ===true)
	{
		session_start();
		$_SESSION["usersid"] = $uidExists["usersID"];
		$_SESSION["usersuid"] = $uidExists["usersUid"];

		header("location: ../index.php");

		exit();
	}
}