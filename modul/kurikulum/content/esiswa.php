<div class="panel panel-default">
  <div class="panel-heading">
    <a href="index.php">Beranda</a> &gt;
    <a href="index.php?content=siswa">Siswa</a> &gt;
    Ubah Data Siswa
     
  </div>
</div>

<?php
if (!isset($_POST['id_siswa'])) {
	echo"
		<script type='text/javascript'>
			window.location='index.php?content=user'; 
	    </script>
	";
}
$id=$_POST['id_siswa'];
$table="siswa";
$link="siswa";
$d=$crud->ReadAllClausa($table,'id_siswa',$id);
?>
<div class="header">
	<h3 class="blue">Ubah Data Pengguna</h3>
</div>
<form action="index.php?aksi=e<?php echo $link;?>" method="POST" ENCTYPE="multipart/form-data">
<table class="table table-striped  table-bordered table-hover">

	<input type="hidden" name="id_siswa" value="<?php echo $d['id_siswa'];?>" class="col-sm-8" >
	
	<tr>
		<td>
			NIP
		</td>
		<td>
			<input type="text" name="nisn" value="<?php echo $d['nisn'];?>" class="col-sm-8" readonly>
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
			Jenis Kelamin
		</td>
		<td>
			<select name="jenis_kelamin" class="col-sm-8">
				<option>Pilih Jenis Kelamin</option>
				
				
					<option value="Laki-laki" <?php if ($d['jenis_kelamin']=='Laki-laki') {echo "selected";} ?> >Laki-laki</option>
					<option value="Perempuan" <?php if ($d['jenis_kelamin']=='Perempuan') {echo "selected";} ?> >Perempuan</option>
				
				
			</select>
		</td>
	</tr>
	<tr>
		<td>
			Kelas dan Jurusan
		</td>
		<td>
			<select name="kelas" class="col-sm-8">
				<option>Pilih Kelas dan Jurusan</option>
				<?php
				$q= $crud->ReadAll('kelas');
				 

				while ($d2=mysql_fetch_assoc($q)) {
					$d3=$crud->ReadAllClausa('jurusan','id_jurusan',$d2['id_jurusan']);
				?>
					<option value="<?php echo $d['id_kelas'];?>" <?php if ($d['id_kelas']==$d2['id_kelas']) {echo "selected";} ?> ><?php echo $d2['keterangan'];?> - <?php echo $d3['keterangan'];?></option>
				
				<?php
					
				}
				?>
			</select>
		</td>
	</tr>

	<tr>
		<td>
			Angkatan
		</td>
		<td>
			<select name="angkatan" class="col-sm-8">
				<option>Pilih Angkatan</option>
				<?php
				$q5= $crud->ReadAll('angkatan');
				 

				while ($d5=mysql_fetch_assoc($q5)) {
				?>
				
					<option value="<?php echo $d5['id_angkatan'];?>" <?php if ($d['id_angkatan']==$d5['id_angkatan']) {echo "selected";} ?>><?php echo $d5['tahun'];?></option>
				
				<?php
				}
				?>
			</select>
		</td>
	</tr>

	<tr>
		<td>
			Tempat Lahir
		</td>
		<td>
			<input type="text" name="tempat_lahir" placeholder="Masukkan Tempat Lahir" class="col-sm-8" value="<?php echo $d['tempat_lahir'];?>" required>
		</td>
	</tr>
	<tr>
		<td>
			Tanggal Lahir
		</td>
		<td>
			<input type="date" name="tanggal_lahir" placeholder="Masukkan Tanggal Lahir" class="col-sm-8" value="<?php echo $d['tanggal_lahir'];?>" required>
		</td>
	</tr>
	<tr>
		<td>
			Alamat Siswa
		</td>
		<td>
			<textarea name="alamat_siswa" placeholder="Masukkan Alamat Siswa" class="col-sm-8" required><?php echo $d['alamat_siswa'];?></textarea> 
		</td>
	</tr>
	<tr>
		<td>
			Nama Wali
		</td>
		<td>
			<input type="text" name="wali" placeholder="Masukkan Nama Wali" class="col-sm-8" value="<?php echo $d['wali'];?>" required>
		</td>
	</tr>
	<tr>
		<td>
			Nomor Telepon Wali
		</td>
		<td>
			<input type="text" name="no_telp_wali" placeholder="Masukkan Nomor Telepon Wali" class="col-sm-8" value="<?php echo $d['no_telp_wali'];?>" required maxlength="13">
		</td>
	</tr>

	<tr>
		<td>
			Alamat Wali
		</td>
		<td>
			<textarea name="alamat_wali" placeholder="Masukkan Alamat Wali" class="col-sm-8" required><?php echo $d['alamat_wali'];?></textarea> 
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