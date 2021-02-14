<?php
if (!isset($_POST['id_pengajaran'])) {
	echo "
		<script type='text/javascript'>
			window.location='index.php?content=mapel'; 
	    </script>
	";
}
?>

<div class="panel panel-default">
	<div class="panel-heading">
		<a href="index.php">Beranda</a> &gt;
		<a href="index.php?content=pengajar">Pengajar</a> &gt;
		Lihat Data Pengajar
	</div>
</div>

<?php

$id_pengajaran = $_POST['id_pengajaran'];
$table = "pengajaran";
$link = "pengajar";
$d = $crud->ReadAllClausa($table, 'id_pengajaran', $id_pengajaran);

$siswa = $crud->queryGet("SELECT nmp.id_nilai, nmp.penilaian, nmp.nilai_pengetahuan, nmp.nilai_keterampilan, sw.nama, pj.kkm, pj.id_pengajaran, nmp.n_kt, nmp.n_pt
 FROM siswa as sw left outer join nilai_mapel as nmp on sw.id_siswa = nmp.id_siswa
 left outer join pengajaran as pj on sw.id_kelas = pj.id_kelas
 where pj.id_pengajaran = $id_pengajaran");
 echo mysql_error();

?>

<div class="row ">

	<div class="col-xs-12 col-sm-12">
		<div class="profile-user-info profile-user-info-striped">
			<div class="profile-info-row">
				<div class="profile-info-name"> Nama Mata Pelajaran </div>

				<div class="profile-info-value">
					<?php
					$d2 = $crud->ReadAllClausa('mata_pelajaran', 'id_mapel', $d['id_mapel']);
					echo $d2['nama_mapel'];
					?>
				</div>
			</div>


			<div class="profile-info-row">
				<div class="profile-info-name"> Jenis Mata Pelajaran </div>

				<div class="profile-info-value">
					<?php
					if ($d2['jenis_mapel'] == "Umum") {
						echo "Umum";
					} else {
						$d3 = $crud->ReadAllClausa('jurusan', 'id_jurusan', $d2['jenis_mapel']);
						echo "Jurusan " . $d3['keterangan'];
					}
					?>
				</div>
			</div>

			<div class="profile-info-row">
				<div class="profile-info-name"> Kelas </div>

				<div class="profile-info-value">
					<?php
					$d4 = $crud->ReadAllClausa('kelas', 'id_kelas', $d['id_kelas']);
					$d5 = $crud->ReadAllClausa('jurusan', 'id_jurusan', $d4['id_jurusan']);
					echo $d4['keterangan'] . " - " . $d5['keterangan'];
					?>
				</div>
			</div>

			<div class="profile-info-row">
				<div class="profile-info-name"> Guru Pengajar </div>

				<div class="profile-info-value">
					<?php
					$d6 = $crud->ReadAllClausa('user', 'id', $d['id']);
					echo $d6['nama'];
					?>
				</div>
			</div>

			<div class="profile-info-row">
				<div class="profile-info-name"> KKM </div>

				<div class="profile-info-value">
					<?php
					echo $d['kkm'];
					?>
				</div>
			</div>






		</div>

		<div class="profile-user-info profile-user-info-striped">
			<div class="profile-info-row">
				<div class="profile-info-value">
					<form action="index.php?content=e<?php echo $link; ?>" method="POST" class="pull-left">
						<input type="hidden" name="id_pengajaran" value="<?php echo $d['id_pengajaran']; ?>">
						<button type="submit" class="btn  btn-success">
							<i class="ace-icon fa fa-pencil"></i>
							UBAH
						</button>
					</form>
					<form action="index.php?content=nilai<?php echo $link; ?>" method="POST" class="pull-right">
					  <input type="hidden" name="id_pengajaran" value="<?php echo $d['id_pengajaran']; ?>">
						<button type="submit" class="btn  btn-info">
							<i class="ace-icon fa fa-pencil"></i>
							UBAH NILAI
						</button>
					</form>
					<!-- 
		               <form action="index.php?content=<?php echo $link; ?>&aksi=hapus" method="POST" class="pull-left">
		                  <input type="hidden" name="id_pengajaran" value="<?php echo $d['id_pengajaran']; ?>">
		                  <button type="submit" class="btn  btn-danger" onClick="return confirm('Hapus Data <?php echo $d2['nama_mapel']; ?>')">
		                    <i class="ace-icon fa fa-trash "></i>
		                    HAPUS
		                  </button>                
		                </form>
		              -->
				</div>
			</div>
		</div>

		<div class="clearfix"><br></div>
		<table id="dynamic-table" class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th>No.</th>
					<th>Nama Siswa</th>
					<th>Nilai Pengetahuan</th>
					<?php if($d2['jenis_mapel'] !== "Umum"){ ?> <th>Nilai Keterampilan</th> <?php } ?>
				</tr>
			</thead>
			<tbody>
			<?php foreach($siswa as $ix=>$row){ ?>
			  <tr>
				  <td><?= $ix+1 ?></td>
					<td><?= $row['nama'] ?></td>
					<td><?= $row['n_pt'] ?: "-" ?></td>
					<?php if($d2['jenis_mapel'] !== "Umum"){ ?> <td><?= $row['n_kt'] ?: "-" ?></td> <?php } ?>
				</tr>
			<?php } ?>
			</tbody>
		</table>
	</div>
</div>
