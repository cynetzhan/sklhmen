<?php
if (isset($_POST['submit'])){

	$table="pengajaran";
	$link_from="pengajar";
	// /declare table
	// data
	// $jenis="listening";
	$id_kelas=$_POST['id_kelas'];
	$id_mapel=$_POST['id_mapel'];
	$id=$_POST['id'];
	$kkm=$_POST['kkm'];

				$process1=mysql_query("
					INSERT INTO $table(id_pengajaran,id_mapel,id,id_kelas,kkm) 
					VALUES (null,'$id_mapel','$id','$id_kelas','$kkm') 
					");
		// /process
// back link
if ($process1){
// $main->back_link($link);
		echo mysql_error();

		echo "<script type='text/javascript'>";
		echo "window.location='index.php?content=$link_from&success=1'";
		echo "</script>";		

}else {
// $main->back_link($link);
	
		echo "<script type='text/javascript'>";
		echo "window.location='index.php?content=$link_from&success=0'";
		echo "</script>";			
	
//		echo mysql_error();
}
//  /back link
} else {
	$main->home_link();		
}
?>