<?php
// Classes
include 'config/Classes.php';
$validation=new ValidationClass();

	if (!isset($_POST['login']))
	{
		echo "<script type='text/javascript'0.window.location='index.php'</script>";
	} 
	else 
	{
		# get Variables
		$getUser=$_POST['nip'];
		$getPass=$_POST['pass'];
			# do validation/checking function for login user
			$validation->validate_login($getUser,$getPass,'user');
	}

?>