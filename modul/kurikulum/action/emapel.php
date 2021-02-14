<?php
if (isset($_POST['submit'])){
// get link
// $link=$_POST['link'];
// /get link
	// declare table
	$table="mata_pelajaran";
	$link_from="mapel";
	// /declare table
	// declare directory
	// $dir="assets/latihan_listening/";		
	// /declare directory
	// data
	// $jenis="listening";
	$id_mapel=$_POST['id_mapel'];
	$nama_mapel=$_POST['nama_mapel'];
	$jenis_mapel=$_POST['jenis_mapel'];
	$kurikulum=$_POST['kurikulum'];

				 $process=mysql_query("UPDATE $table SET nama_mapel='$nama_mapel',jenis_mapel='$jenis_mapel',kurikulum='$kurikulum' WHERE id_mapel='$id_mapel'");					
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
