<div class="panel panel-default">
  <div class="panel-heading">
    <a href="index.php">Beranda</a> &gt;
    <a href="index.php?content=pengajar">Pengajar</a> &gt;
    Ubah Data Pengajar
     
  </div>
</div>

<?php
if (!isset($_POST['id_pengajaran'])) {
	echo"
		<script type='text/javascript'>
			window.location='index.php?content=pengajar'; 
	    </script>
	";
}
$id_pengajaran=$_POST['id_pengajaran'];
$table="pengajaran";
$link="pengajar";
$d=$crud->ReadAllClausa($table,'id_pengajaran',$id_pengajaran);
?>
<div class="header">
	<h3 class="blue">Ubah Data Pengajar</h3>
</div>
<form action="index.php?aksi=e<?php echo $link;?>" method="POST" ENCTYPE="multipart/form-data">
<table class="table table-striped  table-bordered table-hover">

	<input type="hidden" name="id_pengajaran" value="<?php echo $d['id_pengajaran'];?>" class="col-sm-8" >
	
	<tr>
		<td>
			Nama Mata Pelajaran
		</td>
		<td>
			<?php 
				$d2=$crud->ReadAllClausa('mata_pelajaran','id_mapel',$d['id_mapel']);
 				
			?>
			<input type="text" name="nama_mapel" value="<?php echo $d2['nama_mapel'];?>" class="col-sm-8" readonly>
		</td>
	</tr>
	<tr>
		<td>
			Jenis Mata Pelajaran
		</td>
		<td>
			<?php
				if ($d2['jenis_mapel']=="Umum") {
					$jenis_mapel="Umum";
	            }else{
	                $d3=$crud->ReadAllClausa('jurusan','id_jurusan',$d2['jenis_mapel']);
	                $jenis_mapel="Jurusan ".$d3['keterangan'];
	            }
			?>
			<input type="text" name="jenis_mapel" value="<?php echo $jenis_mapel;?>" class="col-sm-8" readonly>
		</td>
	</tr>

	<tr>
		<td>
			Kelas
		</td>
		<td>
			<select name="id_kelas" class="col-sm-8">
					<?php
					$q4=$crud->ReadAllOrder('kelas','keterangan');
					while ($d4=mysql_fetch_assoc($q4)) {
						$d5=$crud->ReadAllClausa('jurusan','id_jurusan',$d4['id_jurusan']);
					?>
						<?php if ($d['id_kelas']==$d4['id_kelas']) { ?>
							<option value="<?php echo $d4['id_kelas'];?>" selected >
								<?php echo $d4['keterangan']." - ".$d5['keterangan'];?> 
							</option>
				
					<?php
						}
					
					}
					?>
				
				
			</select>
		</td>
	</tr>

	<tr>
		<td>
			Guru Pengajar
		</td>
		<td>
			<select name="id" class="col-sm-8">
					<?php
					$q6=$crud->ReadAllClausaOrder('user','kd_level','3','nama');
					while ($d6=mysql_fetch_assoc($q6)) {
					?>
						<?php if ($d['id']==$d6['id']) {?>
						<option value="<?php echo $d6['id'];?>" selected >
							<?php echo $d6['nama'];?> 
						</option>
				
					<?php
						}
					}
					?>
				
				
			</select>
		</td>
	</tr>

	<tr>
		<td>
			KKM
		</td>
		<td>
			<input type="number" name="kkm" value="<?php echo $d['kkm'];?>" class="col-sm-8" required>
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