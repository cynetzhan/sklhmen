

<?php

if (isset($_POST['nip'])){

	$table1="user";
	$link_from="profil";
	// /declare table
	// data
	// $jenis="listening";
	$nip=$_POST['nip'];

			if(is_uploaded_file($_FILES['foto']['tmp_name'])){
				$dir="../../file/user/";
				$nama_foto=$nip.$_FILES['foto']['name'];
				$process1=mysql_query("UPDATE $table1 set foto='$nama_foto' where nip='$nip'");				
				move_uploaded_file($_FILES['foto']['tmp_name'],$dir.$nama_foto);
			}else{
				
				echo "<script type='text/javascript'>";
				echo "window.alert('Foto tidak boleh kosong!'')";
				echo "</script>";
			}
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
}
//  /back link
} else {
	$main->home_link();		
}
?>