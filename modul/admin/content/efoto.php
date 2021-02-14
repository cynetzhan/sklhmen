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
	    <a href="index.php?content=profil">Profil</a> &gt;
	    Ubah Foto
	  </div>
	</div>
	<?php
	$id=$_SESSION['id'];
	$nip=$_SESSION['user'];
	$table1="user";	
	$link="foto";
	$d=$crud->ReadAllClausa($table1,'id',$id);

	?>

	<div class="row ">
		<div class="col-xs-12 col-sm-2">
			<span class="profile-picture">
				<img id="avatar" class="editable img-responsive  editable-empty"  src="../../file/user/<?php echo $d['foto'];?>"></img>
			</span>
			
		</div>
		<div class="col-xs-12 col-sm-10">
            <form action="index.php?aksi=e<?php echo $link;?>" method="POST"  ENCTYPE="multipart/form-data">
				<div class="profile-user-info profile-user-info-striped">
					<div class="profile-info-row">
						<div class="profile-info-name"> Foto  </div>

						<div class="profile-info-value">
							<input type="file" name="foto">
							<input type="hidden" name="nip" value="<?php echo $nip; ?>">
						</div>
					</div>

				</div>

				<div class="profile-user-info profile-user-info-striped">
					<div class="profile-info-row">
						<div class="profile-info-value">	                
			                  <button type="submit" class="btn  btn-success">
								<i class="ace-icon fa fa-pencil"></i>
								SIMPAN
							  </button>  
							  <button type="reset" class="btn btn-danger"> 
							  	<i class="ace-icon fa fa-warning"></i>
							  	ULANGI
							  </button>           
						</div>
					</div>
				</div>
            </form>
		</div>									
	</div>