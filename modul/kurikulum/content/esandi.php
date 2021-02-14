<div class="panel panel-default">
  <div class="panel-heading">
    <a href="index.php">Beranda</a> &gt;
    <a href="index.php?content=profil">Profil</a> &gt;
    Ubah Data Sandi
     
  </div>
</div>

<?php
if (!isset($_SESSION['id'])) {
	echo"
		<script type='text/javascript'>
			window.location='index.php?content=user'; 
	    </script>
	";
}
$id=$_SESSION['id'];
$table="user";
$link="sandi";
$d=$crud->ReadAllClausa($table,'id',$id);
?>
<div class="header">
	<h3 class="blue">Ubah Data Sandi</h3>
</div>
<form action="index.php?aksi=e<?php echo $link;?>" method="POST" ENCTYPE="multipart/form-data">
<table class="table table-striped  table-bordered table-hover">

	<input type="hidden" name="id" value="<?php echo $id;?>" class="col-sm-8" >
	
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
			Password
		</td>
		<td>
			<input type="password" name="pass" value="<?php echo $d['pass_asli'];?>" class="col-sm-8">
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