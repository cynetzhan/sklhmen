<?php
if (isset($_POST['submit'])){

	$table="mata_pelajaran";
	$link_from="mapel";
	// /declare table
	// data
	// $jenis="listening";
	$nama_mapel=$_POST['nama_mapel'];
	$jenis_mapel=$_POST['jenis_mapel'];
	$kurikulum=$_POST['kurikulum'];

				$process1=mysql_query("
					INSERT INTO $table(id_mapel,nama_mapel,jenis_mapel,kurikulum) 
					VALUES (null,'$nama_mapel','$jenis_mapel','$kurikulum') 
					");
		// /process
// back link
if ($process1){
// $main->back_link($link);

		echo "<script type='text/javascript'>";
		echo "window.location='index.php?content=$link_from&success=1'";
		echo "</script>";		
}else {
// $main->back_link($link);
	
		echo "<script type='text/javascript'>";
		echo "window.location='index.php?content=$link_from&success=0'";
		echo "</script>";			
	
	//	echo mysql_error();
}
//  /back link
} else {
	$main->home_link();		
}
?>