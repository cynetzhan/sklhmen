<?php
if (isset($_POST['submit'])){
// get link
// $link=$_POST['link'];
// /get link
	// declare table
	$table="user";
	$link_from="profil";
	// /declare table
	// declare directory
	// $dir="assets/latihan_listening/";		
	// /declare directory
	// data
	// $jenis="listening";
	$id=$_POST['id'];
	$pass=$_POST['pass'];
	$pass_code=md5("blm".$_POST['pass']."blm");

				 $process=mysql_query("UPDATE $table SET pass='$pass_code',pass_asli='$pass' WHERE id='$id'");					
if ($process){
// $main->back_link($link);
		echo "<script type='text/javascript'>";
		echo "window.location='index.php?content=$link_from&success=1'";
		echo "</script>";
} else {
// $main->back_link($link);
		echo "<script type='text/javascript'>";
		echo "window.location='index.php?content=$link_from&success=0'";
		echo "</script>";			
}
//  /back link
} else {
	$main->home_link();		
}


?>
