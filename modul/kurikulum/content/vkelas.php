<?php
if (!isset($_POST['id_kelas'])) {
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
		<a href="index.php?content=kelas">Kelas</a> &gt;
		Lihat Data Kelas
	</div>
</div>

<?php

$id_kelas = $_POST['id_kelas'];
$table = "kelas";
$link = "kelas";
$d = $crud->ReadAllClausa($table, 'id_kelas', $id_kelas);


?>

<div class="row ">

	<div class="col-xs-12 col-sm-12">
		<div class="profile-user-info profile-user-info-striped">
			<div class="profile-info-row">
				<div class="profile-info-name"> Nama Kelas </div>

				<div class="profile-info-value">
					<?php
					$d2 = $crud->ReadAllClausa('jurusan', 'id_jurusan', $d['id_jurusan']);
					echo $d['keterangan'] . " - " . $d2['keterangan']; ?>
				</div>
			</div>

			<div class="profile-info-row">
				<div class="profile-info-name"> Tahun Ajaran </div>

				<div class="profile-info-value">
					<?php
					$d4 = $crud->ReadAllClausa('tahun_ajar', 'id_tahun_ajar', $d['id_tahun_ajar']);
					echo $d4['keterangan'];
					?>
				</div>
			</div>

			<div class="profile-info-row">
				<div class="profile-info-name"> Wali Kelas </div>

				<div class="profile-info-value">
					<?php
					if ($d['id'] == '0') {
						echo "Wali Kelas Belum Dipilih";
					} else {
						$d3 = $crud->ReadAllClausa('user', 'id', $d['id']);
						echo $d3['nama'];
					}
					?>
				</div>
			</div>
			<div class="profile-info-row">
				<div class="profile-info-name"> Data Siswa </div>

				<div class="profile-info-value">
					<?php
					$table2 = "siswa";
					$q5 = $crud->ReadAllClausaOrder($table2, 'id_kelas', $id_kelas, 'nama');
					$no = 0;
					$check = mysql_num_rows($q5);

					if ($check == 0) {
						echo "Data Siswa Kelas Ini Belum Ada";
					} else {

						while ($d5 = mysql_fetch_array($q5)) {
							$no += 1;

							echo $no . ".  " . $d5['nama'] . "</br>";
						}
					}

					?>
				</div>
			</div>




		</div>

		<div class="profile-user-info profile-user-info-striped">
			<div class="profile-info-row">
				<div class="profile-info-value">
					<form action="index.php?content=e<?php echo $link; ?>" method="POST" class="pull-left">
						<input type="hidden" name="id_kelas" value="<?php echo $d['id_kelas']; ?>">
						<button type="submit" class="btn  btn-success">
							<i class="ace-icon fa fa-pencil"></i>
							UBAH
						</button>
					</form>
					<form class="pull-left">
						&nbsp; &nbsp;
					</form>
					<form action="index.php?content=<?php echo $link; ?>&aksi=hapus" method="POST" class="pull-left">
						<input type="hidden" name="id_kelas" value="<?php echo $d['id_kelas']; ?>">
						<button type="submit" class="btn  btn-danger" onClick="return confirm('Hapus Data <?php echo $d['keterangan'] . " - " . $d2['keterangan']; ?>')">
							<i class="ace-icon fa fa-trash "></i>
							HAPUS
						</button>
					</form>
				</div>
			</div>
		</div>

		<?php
		$pelajaran = $crud->queryGet("SELECT * FROM `pengajaran` as pj join mata_pelajaran as mp on pj.id_mapel = mp.id_mapel where pj.id_kelas = $id_kelas");
		?>

		<div class="clearfix"><br></div>
		<table id="dynamic-table" class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th>No.</th>
					<th>Pelajaran</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($pelajaran as $ix => $row) { ?>
					<tr>
						<td><?= $ix + 1 ?></td>
						<td><?= $row['nama_mapel'] ?></td>
						<td>
							<form action="index.php?content=vnilai" method="POST" class="pull-left">
								<input type="hidden" name="id_pengajaran" value="<?= $row['id_pengajaran'] ?>">
								<button type="submit" class="btn btn-sm btn-info">
									Lihat Nilai
									<i class="ace-icon fa fa-arrow-right "></i>
								</button>
							</form>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
		<form action="print.php" method="POST" class="pull-left">
			<input type="hidden" name="id_kelas" value="<?= $id_kelas ?>">
    	<button class="form-control btn-sm btn">Cetak Rapor</button>
		</form>
	</div>
</div>