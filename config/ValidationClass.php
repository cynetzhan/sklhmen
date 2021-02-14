<?php
@session_start();

/**
* 
*/
class ValidationClass
{
	// table name and primary key that being use
	var $table;
	var $pk;

	// validate function 
	function validate_login($user,$pass,$table)
	{
		$salt=md5("blm".$pass."blm");
		// query
		$query=mysql_query("SELECT * FROM $table WHERE nip='$user' AND pass='$salt'");
		$data=mysql_fetch_assoc($query);
		// checking user exist or not
		$exist=mysql_num_rows($query);
		// level declaration
		$level=$data['kd_level'];		// user declaration
		if ($exist>0)
		{
			$_SESSION['id']=$data['id'];
			$_SESSION['user']=$data['nip'];
			$_SESSION['level']=$data['kd_level'];
			$_SESSION['nama']=$data['nama'];
			// choose link
			switch ($level) {
				case '7':
					echo "<script type='text/javascript'>window.location='modul/siswa/index.php'</script>";
					break;
				case '6':
					echo "<script type='text/javascript'>window.location='modul/kepsek/index.php'</script>";
					break;
				case '3':
					echo "<script type='text/javascript'>window.location='modul/guru/index.php'</script>";
					break;
				case '2':
					echo "<script type='text/javascript'>window.location='modul/kurikulum/index.php'</script>";
					break;
				case '1':
					echo "<script type='text/javascript'>window.location='modul/admin/index.php'</script>";
					break;

			}
				
		} else {
			echo "<script type='text/javascript'>alert('Login gagal !')</script>";
			echo "<script type='text/javascript'>window.location='index.php'</script>";		}
	}
}