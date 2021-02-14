<?php
if (isset($_POST['submit'])){

	$table="siswa";
	$link_from="siswa";
	// /declare table
	// data
	// $jenis="listening";
	$nisn=$_POST['nisn'];
	$nama=$_POST['nama'];
	$pass_asli=$_POST['nisn'];
	$pass=md5("blm".$_POST['nisn']."blm");
	$id_kelas=$_POST['kelas'];
	$id_angkatan=$_POST['angkatan'];
	$tempat_lahir=$_POST['tempat_lahir'];
	$tanggal_lahir=$_POST['tanggal_lahir'];
	$wali=$_POST['wali'];
	$alamat_wali=$_POST['alamat_wali'];
	$alamat_siswa=$_POST['alamat_siswa'];
	$no_telp_wali=$_POST['no_telp_wali'];
	$jenis_kelamin=$_POST['jenis_kelamin'];

			date_default_timezone_set('Asia/Jakarta');
			$hari=date('d');
			$bulan=date('m');
			$thn=date('Y');
	$tgl_daftar=$thn."-".$bulan."-".$hari;

			if(is_uploaded_file($_FILES['foto']['tmp_name'])){
				$dir="../../file/user/";
				$nama_foto=$nisn.$_FILES['foto']['name'];
				//$process1=$crud->add7($table,$nip,$nama,$pass,$pass_asli,$level,$tgl_daftar,$nama_foto);						
				$process1=mysql_query("INSERT INTO user(id,nip,nama,pass,pass_asli,kd_level,foto,tgl_daftar,tempat_lahir,tanggal_lahir,alamat,no_telp,jenis_kelamin) VALUES (null,'$nisn','$nama','$pass','$pass_asli','7','$nama_foto','$tgl_daftar','$tempat_lahir','$tanggal_lahir','$alamat_siswa','$no_telp_wali','$jenis_kelamin') ");
				$process2=mysql_query("INSERT INTO siswa(id_siswa,nisn,nama,id_angkatan,id_kelas,foto,tempat_lahir,tanggal_lahir,wali,alamat_siswa,alamat_wali,no_telp_wali,jenis_kelamin) VALUES (null,'$nisn','$nama','$id_angkatan','$id_kelas','$nama_foto','$tempat_lahir','$tanggal_lahir','$wali','$alamat_siswa','$alamat_wali','$no_telp_wali','$jenis_kelamin') ");
				move_uploaded_file($_FILES['foto']['tmp_name'],$dir.$nama_foto);
			}else{

				$nama_foto="default.png";
				$process1=mysql_query("INSERT INTO user(id,nip,nama,pass,pass_asli,kd_level,foto,tgl_daftar,tempat_lahir,tanggal_lahir,alamat,no_telp,jenis_kelamin) VALUES (null,'$nisn','$nama','$pass','$pass_asli','7','$nama_foto','$tgl_daftar','$tempat_lahir','$tanggal_lahir','$alamat_siswa','$no_telp_wali','$jenis_kelamin') ");
				$process2=mysql_query("INSERT INTO siswa(id_siswa,nisn,nama,id_angkatan,id_kelas,foto,tempat_lahir,tanggal_lahir,wali,alamat_siswa,alamat_wali,no_telp_wali,jenis_kelamin) VALUES (null,'$nisn','$nama','$id_angkatan','$id_kelas','$nama_foto','$tempat_lahir','$tanggal_lahir','$wali','$alamat_siswa','$alamat_wali','$no_telp_wali','$jenis_kelamin') ");
			}
		// /process
// back link
if ($process1&&$process2){
// $main->back_link($link);

		echo "<script type='text/javascript'>";
		echo "window.location='index.php?content=$link_from&success=1'";
		echo "</script>";		
}else {
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