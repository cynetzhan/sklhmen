<?php
if (isset($_POST['submit'])){
// get link
// $link=$_POST['link'];
// /get link
	// declare table
	$table="pengajaran";
	$link_from="pengajar";
	// /declare table
	// declare directory
	// $dir="assets/latihan_listening/";		
	// /declare directory
	// data
	// $jenis="listening";
	$id_pengajaran=$_POST['id_pengajaran']; 
	$id=$_POST['id'];
	$id_kelas=$_POST['id_kelas'];
	$kkm=$_POST['kkm'];

				 $process=mysql_query("UPDATE $table SET id_kelas='$id_kelas',id='$id',kkm='$kkm' WHERE id_pengajaran='$id_pengajaran'");					
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
