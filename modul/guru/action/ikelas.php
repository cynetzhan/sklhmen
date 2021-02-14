<?php
if (isset($_POST['submit'])){

	$table="kelas";
	$link_from="kelas";
	// /declare table
	// data
	// $jenis="listening";
	$keterangan=$_POST['keterangan'];
	$id_jurusan=$_POST['id_jurusan'];
	$id=$_POST['id'];
	$id_tahun_ajar=$_POST['id_tahun_ajar'];



		$check=$crud->ReadAllClausa3($table,'keterangan',$keterangan,'id_jurusan',$id_jurusan,'id_tahun_ajar',$id_tahun_ajar);
		$jumlah=mysql_num_rows($check);

		$jumlahbaru= $jumlah+1;

		$keteranganbaru=$keterangan." ".$jumlahbaru;




				$process1=mysql_query("
					INSERT INTO $table(id_kelas,id_jurusan,id_tahun_ajar,id,keterangan) 
					VALUES (null,'$id_jurusan','$id_tahun_ajar','$id','$keteranganbaru') 
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