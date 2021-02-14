<?php
if (!isset($_SESSION['id'])) {
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
	    Profil 
	  </div>
	</div>
	<?php
	$id=$_SESSION['id'];
	$nip=$_SESSION['user'];
	$table1="user";	
	$link="profil";
	$d=$crud->ReadAllClausa($table1,'id',$id);

	?>

	<div class="row ">
		<div class="col-xs-12 col-sm-2">
			<span class="profile-picture">
				<img id="avatar" class="editable img-responsive  editable-empty"  src="../../file/user/<?php echo $d['foto'];?>"></img>
			</span>
			<span class="profile-picture">
	            <form action="index.php?content=efoto" method="POST" class="pull-center">
	              <input type="hidden" name="id" value="<?php echo $d['id'];?>">
	              <button type="submit" class="btn  btn-success" align="centre">
					<i class="ace-icon fa fa-pencil"></i>
					UBAH FOTO
				  </button>               
	            </form>
	        </span>
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
					<div class="profile-info-name"> Tempat Lahir </div>

					<div class="profile-info-value">
						<?php echo $d['tempat_lahir'] ?>
					</div>
				</div>
				<div class="profile-info-row">
					<div class="profile-info-name"> Tanggal Lahir </div>

					<div class="profile-info-value">
						<?php echo $d['tanggal_lahir'] ?>
					</div>
				</div>
				<div class="profile-info-row">
					<div class="profile-info-name"> Agama </div>

					<div class="profile-info-value">
						<?php echo $d['agama'] ?>
					</div>
				</div>
				<div class="profile-info-row">
					<div class="profile-info-name"> Jenis Kelamin </div>

					<div class="profile-info-value">
						<?php echo $d['jenis_kelamin'] ?>
					</div>
				</div>
				
				<div class="profile-info-row">
					<div class="profile-info-name"> Alamat </div>

					<div class="profile-info-value">
						<?php echo $d['alamat'] ?>
					</div>
				</div>
				<div class="profile-info-row">
					<div class="profile-info-name"> No. Telp </div>

					<div class="profile-info-value">
						<?php echo $d['no_telp'] ?>
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
							UBAH PROFIL
						  </button>               
		                </form>
		                <form  class="pull-left">
		                &nbsp; &nbsp;
		                </form>
		                <form action="index.php?content=esandi" method="POST" class="pull-left">
		                  <input type="hidden" name="id" value="<?php echo $d['id'];?>">
		                  <button type="submit" class="btn  btn-success" >
		                    <i class="ace-icon fa fa-key "></i>
		                    UBAH SANDI
		                  </button>                
		                </form>
					</div>
				</div>
			</div>
		</div>									
	</div>