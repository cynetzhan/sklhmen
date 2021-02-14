<div class="panel panel-default">
  <div class="panel-heading">
    <a href="index.php">Beranda</a> &gt;
    <a href="index.php?content=mapel">Mata Pelajaran</a> &gt;
    Ubah Data Mata Pelajaran
     
  </div>
</div>

<?php
if (!isset($_POST['id_mapel'])) {
	echo"
		<script type='text/javascript'>
			window.location='index.php?content=mapel'; 
	    </script>
	";
}
$id_mapel=$_POST['id_mapel'];
$table="mata_pelajaran";
$link="mapel";
$d=$crud->ReadAllClausa($table,'id_mapel',$id_mapel);
?>
<div class="header">
	<h3 class="blue">Ubah Data Mata Pelajaran</h3>
</div>
<form action="index.php?aksi=e<?php echo $link;?>" method="POST" ENCTYPE="multipart/form-data">
<table class="table table-striped  table-bordered table-hover">

	<input type="hidden" name="id_mapel" value="<?php echo $d['id_mapel'];?>" class="col-sm-8" >
	
	<tr>
		<td>
			Nama Mata Pelajaran
		</td>
		<td>
			<input type="text" name="nama_mapel" value="<?php echo $d['nama_mapel'];?>" class="col-sm-8">
		</td>
	</tr>
	<tr>
		<td>
			Jenis Mata Pelajaran
		</td>
		<td>
			<select name="jenis_mapel" class="col-sm-8">
				<option>Pilih Jenis Mata Pelajaran</option>
				
				
					<option value="Umum" <?php if ($d['jenis_mapel']=='Umum') {echo "selected";} ?> >Umum</option>
					<?php
					$q2=$crud->ReadAllOrder('jurusan','keterangan');
					while ($d2=mysql_fetch_assoc($q2)) {
				?>
					<option value="<?php echo $d2['id_jurusan'];?>" <?php if ($d['jenis_mapel']==$d2['id_jurusan']) {echo "selected";} ?> >Jurusan <?php echo $d2['keterangan'];?> </option>
				
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
			<input type="text" name="kurikulum" placeholder="Masukkan Tahun Kurikulum" class="col-sm-8" value="<?php echo $d['kurikulum'];?>" required>
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