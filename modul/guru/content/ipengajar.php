<div class="panel panel-default">
  <div class="panel-heading">
    <a href="index.php">Beranda</a> &gt;
    <a href="index.php?content=pengajar">Pengajar Mata Pelajaran</a> &gt;
    Tambah Pengajar Mata Pelajaran Baru
     
  </div>
</div>

<form action="index.php?aksi=ipengajar" method="POST" ENCTYPE="multipart/form-data">
<table class="table table-striped  table-bordered table-hover">
	<tr>
		<td>
			Pilih Kelas dan Jurusan
		</td>
		<td>
			<select name="id_kelas" class="col-sm-8">
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
			Pilih Mata Pelajaran
		</td>
		<td>
			<select name="id_mapel" class="col-sm-8">
				<option>Pilih Mata Pelajaran</option>
					<?php
					$q3=$crud->ReadAllOrder('mata_pelajaran','nama_mapel');
					while ($d3=mysql_fetch_assoc($q3)) {
				?>
					<option value="<?php echo $d3['id_mapel'];?>"><?php echo $d3['nama_mapel'];?> </option>
				
				<?php
					
				}?>
				
				
			</select>
		</td>
	</tr>
	<tr>
		<td>
			Pilih Guru Pengajar
		</td>
		<td>
			<select name="id" class="col-sm-8">
				<option>Pilih Guru Pengajar</option>
				<?php
					$q3=$crud->ReadAllOrder('user','nama');
					while ($d3=mysql_fetch_assoc($q3)) {
						if ($d3['kd_level']=='3') {
				?>
							<option value="<?php echo $d3['id'];?>"><?php echo $d3['nama'];?> </option>
				<?php
						}					
				?>
				<?php
					}
				?>
				
				
			</select>
		</td>
	</tr>
	<tr>
		<td>
			Nilai KKM
		</td>
		<td>
			<input type="number" name="kkm" placeholder="Masukkan Nilai KKM" class="col-sm-8" maxlength="5" required>
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