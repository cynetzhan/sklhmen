<?php
if (!isset($_POST['id_mapel'])) {
	echo"
		<script type='text/javascript'>
			window.location='index.php?content=mapel'; 
	    </script>
	";
}
?>

	<div class="panel panel-default">
	  <div class="panel-heading">
	    <a href="index.php">Beranda</a> &gt;
	    <a href="index.php?content=mapel">Mata Pelajaran</a> &gt;
	    Lihat Data Mata Pelajaran 
	  </div>
	</div>

	<?php

	$id_mapel=$_POST['id_mapel'];
	$table="mata_pelajaran";
	$link="mapel";
	$d=$crud->ReadAllClausa($table,'id_mapel',$id_mapel);
	

	?>

	<div class="row ">
		
		<div class="col-xs-12 col-sm-12">
			<div class="profile-user-info profile-user-info-striped">
				<div class="profile-info-row">
					<div class="profile-info-name"> Nama Mata Pelajaran </div>

					<div class="profile-info-value">
						<?php echo $d['nama_mapel']; ?>
					</div>
				</div>

				<div class="profile-info-row">
					<div class="profile-info-name"> Kurikulum </div>

					<div class="profile-info-value">
						<?php echo $d['kurikulum']; ?>
					</div>
				</div>

				<div class="profile-info-row">
					<div class="profile-info-name"> Jenis Mata Pelajaran </div>

					<div class="profile-info-value">
						<?php
						if ($d['jenis_mapel']=='Umum') {
							echo $d['jenis_mapel'];
						}else{
						$d2=$crud->ReadAllClausa('jurusan','id_jurusan',$d['jenis_mapel']);
						
						echo $d2['keterangan']; 
						}
						?>
					</div>
				</div>

				
				
				
			</div>

			<div class="profile-user-info profile-user-info-striped">
				<div class="profile-info-row">
					<div class="profile-info-value">	                
		                <form action="index.php?content=e<?php echo $link;?>" method="POST" class="pull-left">
		                  <input type="hidden" name="id_mapel" value="<?php echo $d['id_mapel'];?>">
		                  <button type="submit" class="btn  btn-success">
							<i class="ace-icon fa fa-pencil"></i>
							UBAH
						  </button>               
		                </form>
		                <form  class="pull-left">
		                &nbsp; &nbsp;
		                </form>
		                <form action="index.php?content=<?php echo $link; ?>&aksi=hapus" method="POST" class="pull-left">
		                  <input type="hidden" name="id_mapel" value="<?php echo $d['id_mapel'];?>">
		                  <button type="submit" class="btn  btn-danger" onClick="return confirm('Hapus Data <?php echo $d['nama_mapel']; ?>')">
		                    <i class="ace-icon fa fa-trash "></i>
		                    HAPUS
		                  </button>                
		                </form>
					</div>
				</div>
			</div>
		</div>									
	</div>