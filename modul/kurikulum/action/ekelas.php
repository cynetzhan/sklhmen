<?php
if (isset($_POST['submit'])){
// get link
// $link=$_POST['link'];
// /get link
	// declare table
	$table="kelas";
	$link_from="kelas";
	// /declare table
	// declare directory
	// $dir="assets/latihan_listening/";		
	// /declare directory
	// data
	// $jenis="listening";
	$id_kelas=$_POST['id_kelas'];
	$id=$_POST['id'];

				 $process=mysql_query("UPDATE $table SET id='$id' WHERE id_kelas='$id_kelas'");					
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
