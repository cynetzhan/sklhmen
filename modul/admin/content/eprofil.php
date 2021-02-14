<div class="panel panel-default">
  <div class="panel-heading">
    <a href="index.php">Beranda</a> &gt;
    <a href="index.php?content=profil">Profil</a> &gt;
    Ubah Profil
     
  </div>
</div>

<?php
if (!isset($_POST['id'])) {
	echo"
		<script type='text/javascript'>
			window.location='index.php'; 
	    </script>
	";
}
$id=$_POST['id'];
$table="user";
$link="profil";
$d=$crud->ReadAllClausa($table,'id',$id);
?>
<div class="header">
	<h3 class="blue">Ubah profil</h3>
</div>
<form action="index.php?aksi=e<?php echo $link;?>" method="POST" ENCTYPE="multipart/form-data">
<table class="table table-striped  table-bordered table-hover">

	<input type="hidden" name="id" value="<?php echo $d['id'];?>" class="col-sm-8" >
	
	<tr>
		<td>
			NIP
		</td>
		<td>
			<input type="text" name="nip" value="<?php echo $d['nip'];?>" class="col-sm-8" readonly>
		</td>
	</tr>
	<tr>
		<td>
			Nama
		</td>
		<td>
			<input type="text" name="nama" value="<?php echo $d['nama'];?>" class="col-sm-8">
		</td>
	</tr>
	<tr>
		<td>
			Tempat Lahir
		</td>
		<td>
			<input type="text" name="tempat_lahir" value="<?php echo $d['tempat_lahir'];?>" class="col-sm-8">
		</td>
	</tr>
	<tr>
		<td>
			Tanggal Lahir
		</td>
		<td>
			<input type="date" name="tanggal_lahir" value="<?php echo $d['tanggal_lahir'];?>" class="col-sm-8">
		</td>
	</tr>
	<tr>
		<td>
			Agama
		</td>
		<td>
			<select name="agama"class="col-sm-8">
				<OPTION value="Islam" <?php if ($d['agama']=="Islam") { echo "selected"; } ?> >Islam</OPTION>
				<OPTION value="Kristen Katolik" <?php if ($d['agama']=="Kristen Katolik") { echo "selected"; } ?> >Kristen Katolik</OPTION>
				<OPTION value="Kristen Protestan" <?php if ($d['agama']=="Kristen Protestan") { echo "selected"; } ?> >Kristen Protestan</OPTION>
				<OPTION value="Hindu" <?php if ($d['agama']=="Hindu") { echo "selected"; } ?> >Hindu</OPTION>
				<OPTION value="Budha" <?php if ($d['agama']=="Budha") { echo "selected"; } ?> >Budha</OPTION>
			</select>
		</td>
	</tr>
	<tr>
		<td>
			Jenis Kelamin
		</td>
		<td>
			<select name="jenis_kelamin"class="col-sm-8">
				<OPTION value="Laki-laki" <?php if ($d['jenis_kelamin']=="Laki-laki") { echo "selected"; } ?> >Laki-laki</OPTION>
				<OPTION value="Perempuan" <?php if ($d['jenis_kelamin']=="Perempuan") { echo "selected"; } ?> >Perempuan</OPTION>
				
			</select>
		</td>
	</tr>
	

	<tr>
		<td>
			Alamat
		</td>
		<td>
			<TEXTAREA name="alamat"  class="col-sm-8"><?php echo $d['alamat']; ?></TEXTAREA>
	</tr>
	<tr>
		<td>
			Nomor Telepon
		</td>
		<td>
			<input type="text" name="no_telp" value="<?php echo $d['no_telp'];?>" class="col-sm-8" maxlength="12">
		</td>
	</tr>

	<tr>
		<td colspan="2">
			<button type="submit" name="submit" class="btn btn-info" onClick="return confirm('Simpan Data Berikut ?')"><i class="ace-icon fa fa-save align-top bigger-125"></i> SIMPAN</button>
			<button type="Reset" class="btn btn-danger"><i class="ace-icon fa fa-repeat align-top bigger-125"></i> ULANGI</button>
		</td>	
	</tr>
</table>
</form>