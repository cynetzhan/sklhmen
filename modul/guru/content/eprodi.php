<div class="panel panel-default">
  <div class="panel-heading">
    <a href="index.php">Beranda</a> &gt;
    <a href="index.php?content=prodi">Program Studi</a> &gt;
    Ubah Data Program Studi
     
  </div>
</div>

<?php
if (!isset($_POST['id_jurusan'])) {
	echo"
		<script type='text/javascript'>
			window.location='index.php?content=mapel'; 
	    </script>
	";
}
$id_jurusan=$_POST['id_jurusan'];
$table="jurusan";
$table2="kelas";
$link="prodi";
$d=$crud->ReadAllClausa($table,'id_jurusan',$id_jurusan);
$d2=$crud->ReadAllClausa($table2,'id_jurusan',$d['id_jurusan']);
$dummy=$d['keterangan']." - ".$d2['keterangan'];
?>
<div class="header">
	<h3 class="blue">Ubah Data Kelas</h3>
</div>
<form action="index.php?aksi=e<?php echo $link;?>" method="POST" ENCTYPE="multipart/form-data">
<table class="table table-striped  table-bordered table-hover">

	<input type="hidden" name="id_jurusan" value="<?php echo $d['id_jurusan'];?>" class="col-sm-8" >
	<tr>
		<td>
			Nama Program Studi
		</td>
		<td>
			<input type="text" name="dummy" value="<?php echo $d['keterangan'];?>" class="col-sm-8" readonly>
		</td>
	</tr>
	<tr>
		<td>
			Ketua Program Studi
		</td>
		<td>
			<select name="id" class="col-sm-8">
				<option>Pilih Ketua Program Studi</option>]
					<?php
						$q3=$crud->ReadAll('user','nama');
						while ($d3=mysql_fetch_assoc($q3)) {
							if ($d3['kd_level']=='3') {
								?>
								<option value="<?php echo $d3['id'];?>" <?php if ($d['id']==$d3['id']) {echo "selected";} ?> > <?php echo $d3['nama'];?> </option>
								<?php
							}else{

							}
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