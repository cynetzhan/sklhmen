<?php
if (isset($_POST['submit'])){

	$table="user";
	$link_from="user";
	// /declare table
	// data
	// $jenis="listening";
	$nip=$_POST['nip'];
	$nama=$_POST['nama'];
	$pass_asli=$_POST['pass'];
	$pass=md5("blm".$_POST['pass']."blm");
	$level=$_POST['level'];

			date_default_timezone_set('Asia/Jakarta');
			$hari=date('d');
			$bulan=date('m');
			$thn=date('Y');
	$tgl_daftar=$thn."-".$bulan."-".$hari;

			if(is_uploaded_file($_FILES['foto']['tmp_name'])){
				$dir="../../file/user/";
				$nama_foto=$nip.$_FILES['foto']['name'];
				//$process1=$crud->add7($table,$nip,$nama,$pass,$pass_asli,$level,$tgl_daftar,$nama_foto);						
				$process=mysql_query("INSERT INTO user(id,nip,nama,pass,pass_asli,kd_level,foto,tgl_daftar) VALUES (null,'$nip','$nama','$pass','$pass_asli','$level','$nama_foto','$tgl_daftar') ");
				move_uploaded_file($_FILES['foto']['tmp_name'],$dir.$nama_foto);
			}else{

				$nama_foto="default.png";
				//$process1=$crud->add7($table1,$nip,$nama,$pass,$pass_asli,$level,$tgl_daftar,$nama_foto);						
				$process=mysql_query("INSERT INTO user(id,nip,nama,pass,pass_asli,kd_level,foto,tgl_daftar) VALUES (null,'$nip','$nama','$pass','$pass_asli','$level','$nama_foto','$tgl_daftar') ");
			}
		// /process
// back link
if ($process){
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