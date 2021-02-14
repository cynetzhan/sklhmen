<?php
if (!isset($_POST['id_siswa'])) {
	echo"
		<script type='text/javascript'>
			window.location='index.php?content=siswa'; 
	    </script>
	";
}
?>

	<div class="panel panel-default">
	  <div class="panel-heading">
	    <a href="index.php">Beranda</a> &gt;
	    <a href="index.php?content=siswa">Siswa</a> &gt;
	    Lihat Data Siswa 
	  </div>
	</div>
	<?php
	$id=$_POST['id_siswa'];
	$table="siswa";
	$link="siswa";
	$d=$crud->ReadAllClausa($table,'id_siswa',$id);
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
					<div class="profile-info-name"> NISN </div>

					<div class="profile-info-value">
						<?php echo $d['nisn']; ?>
					</div>
				</div>

				<div class="profile-info-row">
					<div class="profile-info-name"> Nama </div>

					<div class="profile-info-value">
						<?php echo $d['nama']; ?>
					</div>
				</div>

				<div class="profile-info-row">
					<div class="profile-info-name"> Angkatan </div>

					<div class="profile-info-value">
						<?php
					$d2=$crud->ReadAllClausa('angkatan','id_angkatan',$d['id_angkatan']);
						?>
						<?php echo $d2['tahun']; ?>
					</div>
				</div>

				<div class="profile-info-row">
					<div class="profile-info-name"> Kelas </div>

					<div class="profile-info-value">
						<?php
					$d3=$crud->ReadAllClausa('kelas','id_kelas',$d['id_kelas']);
						?>
						<?php echo $d3['keterangan']; ?>
					</div>
				</div>

				<div class="profile-info-row">
					<div class="profile-info-name"> Jurusan </div>

					<div class="profile-info-value">
						<?php
					$d4=$crud->ReadAllClausa('jurusan','id_jurusan',$d3['id_jurusan']);
						?>
						<?php echo $d4['keterangan']; ?>
					</div>
				</div>

				<div class="profile-info-row">
					<div class="profile-info-name"> Tempat Lahir </div>

					<div class="profile-info-value">
						<?php echo $d['tempat_lahir']; ?>
					</div>
				</div>

				<div class="profile-info-row">
					<div class="profile-info-name">Tanggal Lahir </div>

					<div class="profile-info-value">
						<?php echo $d['tanggal_lahir']; ?>
					</div>
				</div>

				<div class="profile-info-row">
					<div class="profile-info-name">Jenis Kelamin </div>

					<div class="profile-info-value">
						<?php echo $d['jenis_kelamin']; ?>
					</div>
				</div>

				<div class="profile-info-row">
					<div class="profile-info-name">Alamat Siswa </div>

					<div class="profile-info-value">
						<?php echo $d['alamat_siswa']; ?>
					</div>
				</div>

				<div class="profile-info-row">
					<div class="profile-info-name">Nama Wali </div>

					<div class="profile-info-value">
						<?php echo $d['wali']; ?>
					</div>
				</div>

				<div class="profile-info-row">
					<div class="profile-info-name">Alamat Wali </div>

					<div class="profile-info-value">
						<?php echo $d['alamat_wali']; ?>
					</div>
				</div>

				<div class="profile-info-row">
					<div class="profile-info-name">Nomor Telepon Wali </div>

					<div class="profile-info-value">
						<?php echo $d['no_telp_wali']; ?>
					</div>
				</div>
				
				
			</div>

			<div class="profile-user-info profile-user-info-striped">
				<div class="profile-info-row">
					<div class="profile-info-value">	                
		                <form action="index.php?content=e<?php echo $link;?>" method="POST" class="pull-left">
		                  <input type="hidden" name="id_siswa" value="<?php echo $d['id_siswa'];?>">
		                  <button type="submit" class="btn  btn-success">
							<i class="ace-icon fa fa-pencil"></i>
							UBAH
						  </button>               
		                </form>
		                <form  class="pull-left">
		                &nbsp; &nbsp;
		                </form>
		                <form action="index.php?content=<?php echo $link; ?>&aksi=hapus" method="POST" class="pull-left">
		                  <input type="hidden" name="id-siswa" value="<?php echo $d['id_siswa'];?>">
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