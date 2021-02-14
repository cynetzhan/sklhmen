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
	$nama=$_POST['nama'];
	$tempat_lahir=$_POST['tempat_lahir'];
	$tanggal_lahir=$_POST['tanggal_lahir'];
	$agama=$_POST['agama'];
	$jenis_kelamin=$_POST['jenis_kelamin'];
	$alamat=$_POST['alamat'];
	$no_telp=$_POST['no_telp'];

	$process=mysql_query("UPDATE $table SET 
		nama='$nama', 
		tempat_lahir='$tempat_lahir', 
		tanggal_lahir='$tanggal_lahir',
		agama='$agama',
		jenis_kelamin='$jenis_kelamin',
		alamat='$alamat',
		no_telp='$no_telp'
		WHERE id='$id'");					
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
