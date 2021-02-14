<div class="panel panel-default">
  <div class="panel-heading">
    <a href="index.php">Beranda</a> &gt;
    <a href="index.php?content=mapel">Mata Pelajaran</a> &gt;
    Tambah Mata Pelajaran Baru
     
  </div>
</div>

<form action="index.php?aksi=imapel" method="POST" ENCTYPE="multipart/form-data">
<table class="table table-striped  table-bordered table-hover">
	<tr>
		<td>
			Nama Mata Pelajaran
		</td>
		<td>
			<input type="text" name="nama_mapel" placeholder="Masukkan Nama Mata Pelajaran" class="col-sm-8" required maxlength="25">
		</td>
	</tr>
	<tr>
		<td>
			Jenis Mata Pelajaran
		</td>
		<td>
			<select name="jenis_mapel" class="col-sm-8">
				<option>Pilih Jenis Mata Pelajaran</option>
				
				
					<option value="Umum">Umum</option>
					<?php
					$q=$crud->ReadAllOrder('jurusan','keterangan');
					while ($d=mysql_fetch_assoc($q)) {
				?>
					<option value="<?php echo $d['id_jurusan'];?>">Jurusan <?php echo $d['keterangan'];?> </option>
				
				<?php
					
				}?>
				
				
			</select>
		</td>
	</tr>
	<tr>
		<td>
			Kurikulum
		</td>
		<td>
			<input type="number" name="kurikulum" placeholder="Masukkan Tahun Kurikulum" class="col-sm-8" maxlength="5" required>
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