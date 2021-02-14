<?php
if (isset($_POST['submit'])){
// get link
// $link=$_POST['link'];
// /get link
	// declare table
	$table="siswa";
	$link_from="siswa";
	// /declare table
	// declare directory
	// $dir="assets/latihan_listening/";		
	// /declare directory
	// data
	// $jenis="listening";
	 $id_siswa=$_POST['id_siswa'];
	 $nisn=$_POST['nisn'];
	 $nama=$_POST['nama'];
	 $jenis_kelamin=$_POST['jenis_kelamin'];
	 $kelas=$_POST['kelas'];
	 $angkatan=$_POST['angkatan'];
	 $tempat_lahir=$_POST['tempat_lahir'];
	 $tanggal_lahir=$_POST['tanggal_lahir'];
	 $alamat_siswa=$_POST['alamat_siswa'];
	 $wali=$_POST['wali'];
	 $alamat_wali=$_POST['alamat_wali'];
	 $no_telp_wali=$_POST['no_telp_wali'];


				 $process=mysql_query("UPDATE $table SET  
				 	nama='$nama', 
				 	jenis_kelamin='$jenis_kelamin', 
				 	id_kelas='$kelas', 
				 	id_angkatan='$angkatan', 
				 	tempat_lahir='$tempat_lahir', 
				 	tanggal_lahir='$tanggal_lahir', 
				 	alamat_siswa='$alamat_siswa',
				 	wali='$wali', 
				 	alamat_wali='$alamat_wali', 
				 	no_telp_wali='$no_telp_wali' 
				 	WHERE id_siswa='$id_siswa'");
				$process2=mysql_query("UPDATE user SET  
				 	nama='$nama', 
				 	jenis_kelamin='$jenis_kelamin',
				 	tempat_lahir='$tempat_lahir', 
				 	tanggal_lahir='$tanggal_lahir', 
				 	alamat='$alamat_siswa',
				 	no_telp='$no_telp_wali' 
				 	WHERE nip='$nisn'");					
if ($process&&$process2){
// $main->back_link($link);
		echo "<script type='text/javascript'>";
		echo "window.location='index.php?content=$link_from&success=1'";
		echo "</script>";
} else {
// $main->back_link($link);
		echo "<script type='text/javascript'>";
		echo "window.location='index.php?content=$link_from&success=1'";
		echo "</script>";	
}
//  /back link
} else {
	$main->home_link();		
}


?>
