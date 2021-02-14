<div class="panel panel-default">
  <div class="panel-heading">
    <a href="index.php">Beranda</a> &gt;
    <a href="index.php?content=user">Pengguna</a> &gt;
    Tambah Pengguna Baru
     
  </div>
</div>

<form action="index.php?aksi=iuser" method="POST" ENCTYPE="multipart/form-data">
<table class="table table-striped  table-bordered table-hover">
	<tr>
		<td>
			NIP
		</td>
		<td>
			<input type="text" name="nip" placeholder="Masukkan Nomor Induk Pegawai" class="col-sm-8" required maxlength="25">
		</td>
	</tr>
	<tr>
		<td>
			Nama
		</td>
		<td>
			<input type="text" name="nama" placeholder="Masukkan Nama Pegawai" class="col-sm-8" required>
		</td>
	</tr>
	<tr>
		<td>
			Password
		</td>
		<td>
			<input type="password" name="pass" placeholder="Masukkan Password/Kata Sandi" class="col-sm-8" required>
		</td>
	</tr>
	<tr>
		<td>
			Level Pengguna
		</td>
		<td>
			<select name="level" class="col-sm-8">
				<option>Pilih Level Pengguna</option>
				<?php
				$q= $crud->ReadAll('level');
				 

				while ($d=mysql_fetch_assoc($q)) {
				?>
				
					<option value="<?php echo $d['kd_level'];?>"><?php echo $d['keterangan'];?></option>
				
				<?php
				}
				?>
			</select>
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