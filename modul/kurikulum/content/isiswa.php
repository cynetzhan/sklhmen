<div class="panel panel-default">
  <div class="panel-heading">
    <a href="index.php">Beranda</a> &gt;
    <a href="index.php?content=siswa">Siswa</a> &gt;
    Tambah Siswa Baru
     
  </div>
</div>

<form action="index.php?aksi=isiswa" method="POST" ENCTYPE="multipart/form-data">
<table class="table table-striped  table-bordered table-hover">
	<tr>
		<td>
			NISN
		</td>
		<td>
			<input type="text" name="nisn" placeholder="Masukkan Nomor Induk Siswa" class="col-sm-8" required maxlength="25">
		</td>
	</tr>
	<tr>
		<td>
			Nama Siswa
		</td>
		<td>
			<input type="text" name="nama" placeholder="Masukkan Nama Siswa" class="col-sm-8" required>
		</td>
	</tr>
	<tr>
		<td>
			Jenis Kelamin
		</td>
		<td>
			<select name="jenis_kelamin" class="col-sm-8">
				<option>Pilih Jenis Kelamin</option>
				
				
					<option value="Laki-laki">Laki-laki</option>
					<option value="Perempuan">Perempuan</option>
				
				
			</select>
		</td>
	</tr>
	<tr>
		<td>
			Tempat Lahir
		</td>
		<td>
			<input type="text" name="tempat_lahir" placeholder="Masukkan Tempat Lahir" class="col-sm-8" required>
		</td>
	</tr>
	<tr>
		<td>
			Tanggal Lahir
		</td>
		<td>
			<input type="date" name="tanggal_lahir" placeholder="Masukkan Tanggal Lahir" class="col-sm-8" required>
		</td>
	</tr>
	<tr>
		<td>
			Pilih Kelas dan Jurusan
		</td>
		<td>
			<select name="kelas" class="col-sm-8">
				<option>Pilih Kelas dan Jurusan</option>
					<?php
						$q=$crud->ReadAllOrder('jurusan','keterangan');
						while ($d=mysql_fetch_assoc($q)) {
							$q2=$crud->ReadAllOrder('kelas','keterangan');
							while ($d2=mysql_fetch_assoc($q2)) {
								if ($d['id_jurusan']==$d2['id_jurusan']) {
								?>
								<option value="<?php echo $d2['id_kelas'];?>">
								<?php echo $d2['keterangan']." - ".$d['keterangan']; ?>
								</option>
								<?php
								}
							}

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
				$q= $crud->ReadAll('angkatan');
				 

				while ($d=mysql_fetch_assoc($q)) {
				?>
				
					<option value="<?php echo $d['id_angkatan'];?>"><?php echo $d['tahun'];?></option>
				
				<?php
				}
				?>
			</select>
		</td>
	</tr>

	<tr>
		<td>
			Alamat Siswa
		</td>
		<td>
			<textarea name="alamat_siswa" placeholder="Masukkan Alamat Siswa" class="col-sm-8" required></textarea> 
		</td>
	</tr>

	<tr>
		<td>
			Nama Wali
		</td>
		<td>
			<input type="text" name="wali" placeholder="Masukkan Nama Wali Siswa" class="col-sm-8" required>
		</td>
	</tr>
	<tr>
		<td>
			Nomor Telepon Wali
		</td>
		<td>
			<input type="text" name="no_telp_wali" placeholder="Masukkan Nomor Telepon Wali" class="col-sm-8" required maxlength="13">
		</td>
	</tr>
	<tr>
		<td>
			Alamat Wali
		</td>
		<td>
			<textarea name="alamat_wali" placeholder="Masukkan Alamat Wali" class="col-sm-8" required></textarea> 
		</td>
	</tr>
	
	<tr>
		<td>
			Foto
		</td>
		<td>
			<input type="file" name="foto">
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