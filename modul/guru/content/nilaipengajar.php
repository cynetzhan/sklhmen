<?php
if (!isset($_POST['id_pengajaran'])) {
	echo "
		<script type='text/javascript'>
			window.location='index.php?content=mapel'; 
	    </script>
	";
}
?>
<style>
.nilai-siswa {
    list-style: none;
    display: flex;
}
.nilai-siswa>li {
    padding-right: 10px;
}
.nilai-siswa>li>span {
    display: block;
}
.nilai-siswa>li>input {
    height: 30px;
    font-size: 11px;
    width: 50px;
}
</style>
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
$siswa = $crud->queryGet("SELECT nmp.id_nilai, nmp.nilai_pengetahuan, nmp.nilai_keterampilan, nmp.n_harian, nmp.n_tugas, nmp.n_uts, nmp.n_uas, nmp.n_kt_kelompok, nmp.n_kt_uts, nmp.n_kt_uas, sw.nama, pj.kkm, pj.id_pengajaran, sw.id_siswa
 FROM siswa as sw left outer join nilai_mapel as nmp on sw.id_siswa = nmp.id_siswa
 left outer join pengajaran as pj on sw.id_kelas = pj.id_kelas
 where pj.id_pengajaran = $id_pengajaran");

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
            <button type="submit" class="btn btn-default pull-left" onclick="window.history.back()">
							<i class="ace-icon fa fa-arrow-left"></i>
							Kembali
						</button>
            <button type="submit" class="btn btn-info pull-right" onclick="document.getElementById('nilaisiswa').submit()">
							<i class="ace-icon fa fa-save"></i>
							SIMPAN
						</button>
				</div>
			</div>
		</div>

    <div class="clearfix"><br></div>
    <form action="index.php?aksi=enilai" id="nilaisiswa" method="POST">
      <input type="hidden" name="id_pengajaran" value="<?= $_POST['id_pengajaran'] ?>">
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
            <td><?= $ix+1 ?> <input type="hidden" name="nilai[<?= $row['id_siswa'] ?>][id_nilai]" value="<?= $row['id_nilai'] ?>"></td>
            <td><?= $row['nama'] ?></td>
            <td>
              <ul class="nilai-siswa">
                <li><span>Harian</span> <input name="nilai[<?= $row['id_siswa'] ?>][n_harian]" type="number" min="0" max="100" value="<?= $row['n_harian'] ?>"></li>
                <li><span>Tugas</span> <input name="nilai[<?= $row['id_siswa'] ?>][n_tugas]" type="number" min="0" max="100" value="<?= $row['n_tugas'] ?>"></li>
                <li><span>UTS</span> <input name="nilai[<?= $row['id_siswa'] ?>][n_uts]" type="number" min="0" max="100" value="<?= $row['n_uts'] ?>"></li>
                <li><span>UAS</span> <input name="nilai[<?= $row['id_siswa'] ?>][n_uas]" type="number" min="0" max="100" value="<?= $row['n_uas'] ?>"></li>
              </ul>
              <ul class="nilai-siswa">
                <li><span>Catatan</span> <textarea name="nilai[<?= $row['id_siswa'] ?>][nilai_pengetahuan]" cols="30" rows="2"><?= $row['nilai_pengetahuan'] ?></textarea></li>
              </ul>
            </td>
            <?php if($d2['jenis_mapel'] !== "Umum"){ ?>
            <td>
              <ul class="nilai-siswa">
                <li><span>Klmpk</span> <input name="nilai[<?= $row['id_siswa'] ?>][n_kt_kelompok]" type="number" min="0" max="100" value="<?= $row['n_kt_kelompok'] ?>"></li>
                <li><span>UTS</span> <input name="nilai[<?= $row['id_siswa'] ?>][n_kt_uts]" type="number" min="0" max="100" value="<?= $row['n_kt_uts'] ?>"></li>
                <li><span>UAS</span> <input name="nilai[<?= $row['id_siswa'] ?>][n_kt_uas]" type="number" min="0" max="100" value="<?= $row['n_kt_uas'] ?>"></li>
              </ul>
              <ul class="nilai-siswa">
                <li><span>Catatan</span> <textarea name="nilai[<?= $row['id_siswa'] ?>][nilai_keterampilan]" cols="30" rows="2"><?= $row['nilai_keterampilan'] ?></textarea></li>
              </ul>
            </td>
            <?php } ?>
          </tr>
        <?php } ?>
        </tbody>
      </table>
    </form>
	</div>
</div>
