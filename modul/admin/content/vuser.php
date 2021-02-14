<?php
if (!isset($_POST['id'])) {
	echo"
		<script type='text/javascript'>
			window.location='index.php?content=user'; 
	    </script>
	";
}
?>

	<div class="panel panel-default">
	  <div class="panel-heading">
	    <a href="index.php">Beranda</a> &gt;
	    <a href="index.php?content=user">Pengguna</a> &gt;
	    Lihat Data Pengguna 
	  </div>
	</div>
	<?php
	$id=$_POST['id'];
	$table="user";
	$link="user";
	$d=$crud->ReadAllClausa($table,'id',$id);
	?>

	<div class="row ">
		<div class="col-xs-12 col-sm-2">
			<span class="profile-picture">
				<img id="avatar" class="editable img-responsive  editable-empty"  src="../../file/user/<?php echo $d['foto'];?>"></img>
			</span>
			<!--<span class="profile-picture">
	            <form action="index.php?content=efoto" method="POST" class="pull-center">
	              <input type="hidden" name="id" value="<?php echo $d['id'];?>">
	              <button type="submit" class="btn  btn-success" align="centre">
					<i class="ace-icon fa fa-pencil"></i>
					UBAH GAMBAR
				  </button>               
	            </form>
	        </span> -->
		</div>
		<div class="col-xs-12 col-sm-10">
			<div class="profile-user-info profile-user-info-striped">
				<div class="profile-info-row">
					<div class="profile-info-name"> NIP </div>

					<div class="profile-info-value">
						<?php echo $d['nip']; ?>
					</div>
				</div>

				<div class="profile-info-row">
					<div class="profile-info-name"> Nama </div>

					<div class="profile-info-value">
						<?php echo $d['nama'] ?>
					</div>
				</div>

				<div class="profile-info-row">
					<div class="profile-info-name"> Password </div>

					<div class="profile-info-value">
						<?php echo $d['pass_asli'] ?>
					</div>
				</div>

				<div class="profile-info-row">
					<div class="profile-info-name"> Level </div>

					<div class="profile-info-value">
						<?php
					$q2=$crud->ReadAllClausa('level','kd_level',$d['kd_level']);
						?>
						<?php echo $q2['keterangan']; ?> 
					</div>
				</div>
				
				
			</div>

			<div class="profile-user-info profile-user-info-striped">
				<div class="profile-info-row">
					<div class="profile-info-value">	                
		                <form action="index.php?content=e<?php echo $link;?>" method="POST" class="pull-left">
		                  <input type="hidden" name="id" value="<?php echo $d['id'];?>">
		                  <button type="submit" class="btn  btn-success">
							<i class="ace-icon fa fa-pencil"></i>
							UBAH
						  </button>               
		                </form>
		                <form  class="pull-left">
		                &nbsp; &nbsp;
		                </form>
		                <form action="index.php?content=<?php echo $link; ?>&aksi=hapus" method="POST" class="pull-left">
		                  <input type="hidden" name="id" value="<?php echo $d['id'];?>">
		                  <button type="submit" class="btn  btn-danger" onClick="return confirm('Hapus Data <?php echo $d['nama']; ?>')">
		                    <i class="ace-icon fa fa-trash "></i>
		                    HAPUS
		                  </button>                
		                </form>
					</div>
				</div>
			</div>
		</div>									
	</div>