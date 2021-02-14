<div class="panel panel-default">
  <div class="panel-heading">
    <a href="index.php">Beranda</a> &gt;
    <a href="index.php?content=kelas">Kelaas</a> &gt;
    Tambah Kelas Baru
     
  </div>
</div>

<form action="index.php?aksi=ikelas" method="POST" ENCTYPE="multipart/form-data">
<table class="table table-striped  table-bordered table-hover">
	<tr>
		<td>
			Kelas
		</td>
		<td>
			<select name="keterangan" class="col-sm-8">
				<option>Pilih Kelas</option>
				<option value="X">10 / X</option>
				<option value="XI">11 / XI</option>
				<option value="XII">12 / XII</option>
			</select>
		</td>
	</tr>
	<tr>
		<td>
			Jurusan
		</td>
		<td>
			<select name="id_jurusan" class="col-sm-8">
				<option>Pilih Jurusan</option>]
					<?php
						$q=$crud->ReadAllOrder('jurusan','keterangan');
						while ($d=mysql_fetch_assoc($q)) {
					?>
						<option value="<?php echo $d['id_jurusan'];?>">Jurusan <?php echo $d['keterangan'];?> </option>
				
					<?php
					
						}
					?>
				
				
			</select>
		</td>
	</tr>
	<tr>
		<td>
			Wali Kelas
		</td>
		<td>
			<select name="id" class="col-sm-8">
				<option>Pilih Wali Kelas</option>]
					<?php
						$q2=$crud->ReadAll('user','nama');
						while ($d2=mysql_fetch_assoc($q2)) {
							if ($d2['kd_level']=='3') {
								?>
								<option value="<?php echo $d2['id'];?>"> <?php echo $d2['nama'];?> </option>
								<?php
							}else{

							}
						}
					?>
				
				
			</select>
		</td>
	</tr>
	<tr>
		<td>
			Tahun Ajaran
		</td>
		<td>
			<select name="id_tahun_ajar" class="col-sm-8">
				<option>Pilih Tahun Ajaran</option>]
					<?php
						$q3=$crud->ReadAllOrderDesc('tahun_ajar','keterangan');
						while ($d3=mysql_fetch_assoc($q3)) {
					?>
						<option value="<?php echo $d3['id_tahun_ajar'];?>">Tahun <?php echo $d3['keterangan'];?> </option>
				
					<?php
					
						}
					?>
				
				
			</select>
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