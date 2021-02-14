<?php
if (!isset($_POST['id_jurusan'])) {
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
	    <a href="index.php?content=prodi">Program Studi</a> &gt;
	    Lihat Data Program Studi
	  </div>
	</div>

	<?php

	$id_jurusan=$_POST['id_jurusan'];
	$table="jurusan";
	$link="prodi";
	$d=$crud->ReadAllClausa($table,'id_jurusan',$id_jurusan);

	

	?>

	<div class="row ">
		
		<div class="col-xs-12 col-sm-12">
			<div class="profile-user-info profile-user-info-striped">
				<div class="profile-info-row">
					<div class="profile-info-name"> Nama Program Studi </div>

					<div class="profile-info-value">
						<?php 
              			echo "Program Studi ".$d['keterangan'];?>
					</div>
				</div>

				<div class="profile-info-row">
					<div class="profile-info-name"> Ketua Program Studi </div>

					<div class="profile-info-value">
						<?php
						if ($d['id']=='0') {
			                echo "Ketua Program Studi Belum Dipilih";
			            }else{
			                $d3=$crud->ReadAllClausa('user','id',$d['id']);
			                echo $d3['nama'];
			            }
						?>
					</div>
				</div>

				
				<div class="profile-info-row">
					<div class="profile-info-name"> Data Kelas </div>

					<div class="profile-info-value">
						<?php
						$table2="kelas";
						$q5=$crud->ReadAllClausaOrder($table2,'id_jurusan',$id_jurusan,'keterangan');
						$no=0;
						$check=mysql_num_rows($q5);

						if ($check==0) {
							echo "Data Kelas pada Program Studi Ini Belum Ada";
						}else{

							while ($d5=mysql_fetch_array($q5)) {
								$no+=1;
								
								echo $no.".  ".$d5['keterangan']." - ".$d['keterangan']."</br>";
							}
						}
						
						?>
					</div>
				</div>

				
				
				
			</div>

			<div class="profile-user-info profile-user-info-striped">
				<div class="profile-info-row">
					<div class="profile-info-value">	                
		                <form action="index.php?content=e<?php echo $link;?>" method="POST" class="pull-left">
		                  <input type="hidden" name="id_jurusan" value="<?php echo $d['id_jurusan'];?>">
		                  <button type="submit" class="btn  btn-success">
							<i class="ace-icon fa fa-pencil"></i>
							UBAH
						  </button>               
		                </form>
		                
					</div>
				</div>
			</div>
		</div>									
	</div>