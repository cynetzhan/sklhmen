<?php //error_reporting(0); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta charset="utf-8" />
  <title>
  </title>
  <meta name="description" content="overview &amp; stats" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

  <!-- bootstrap & fontawesome -->
  <link rel="stylesheet" href="assets/css/dropzone.min.css" />
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="assets/font-awesome/4.2.0/css/font-awesome.min.css" />

  <!-- page specific plugin styles -->

  <!-- text fonts -->
  <link rel="stylesheet" href="assets/fonts/fonts.googleapis.com.css" />

  <!-- ace styles -->
  <link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

  <!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->

  <!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

  <!-- inline styles related to this page -->

  <!-- ace settings handler -->
  <script src="assets/js/ace-extra.min.js"></script>

  <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

  <!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
</head>
<style>
  .value-cell {
    width: 25%;
    margin-right: 10%;
    border-bottom-style: dotted;
    border-bottom-width: 1px;
  }
  .desc-cell{
    padding-left: 10px;
  }
  .nilai>th { text-align: center}
  @media print{
    .no-print { display: none }
  }
</style>
<?php
session_start();
function predikat($nilai){
  $pred = "";
  if($nilai > 90) $pred = "A";
  else if($nilai > 80) $pred = "B";
  else if($nilai > 70) $pred = "C";
  else if($nilai > 60) $pred = "D";
  else if($nilai < 60) $pred = "E";

  return $pred;
}
if (!isset($_POST['id_kelas'])) {
	echo "
		<script type='text/javascript'>
			window.location='index.php?content=mapel'; 
	    </script>
	";
}

if (isset($_SESSION['id']) && isset($_SESSION['user'])) {
  if ($_SESSION['level'] == "2") {
    include "../../config/Classes.php";

    $id_kelas = $_POST['id_kelas'];
    $siswa_list = $crud->queryGet("SELECT * FROM siswa where id_kelas = $id_kelas");
    $id_siswa = isset($_POST['id_siswa']) ? $_POST['id_siswa'] : $siswa_list[0]['id_siswa'];
?>
<div class="container-fluid no-print">
  <div class="row">
    <div class="col-sm-12">
      <form action="print.php" method="POST">
        <input type="hidden" name="id_kelas" value="<?= $id_kelas ?>">
        <div class="form-group">
          <label for="nama">Nama Siswa</label>
          <select name="id_siswa" id="nama" class="form-control">
            <?php foreach($siswa_list as $sw){ ?>
              <option value="<?= $sw['id_siswa'] ?>" <?= ($sw['id_siswa'] == $id_siswa) ? "selected" : "" ?>><?= $sw['nama'] ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-sm btn-success">Pilih</button>
          <button type="button" class="btn btn-sm btn-info" onclick="window.print()">Cetak</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php
  $nilai_list = $crud->queryGet("SELECT nmp.id_nilai, nmp.penilaian, nmp.nilai_pengetahuan, nmp.nilai_keterampilan, sw.nama, pj.kkm, pj.id_pengajaran, nmp.n_kt, nmp.n_pt, mp.nama_mapel
  FROM siswa as sw left outer join nilai_mapel as nmp on sw.id_siswa = nmp.id_siswa
  left outer join pengajaran as pj on sw.id_kelas = pj.id_kelas
  join mata_pelajaran as mp on pj.id_mapel = mp.id_mapel
  where nmp.id_siswa = $id_siswa and pj.id_kelas = $id_kelas");
  $siswa_detail = $crud->queryGet("SELECT * from siswa where id_siswa = $id_siswa")[0];
  $kelas_detail = $crud->queryGet("SELECT kl.keterangan as kls_name, jr.keterangan as jrs_name, th.keterangan as th_name from kelas as kl join tahun_ajar th on kl.id_tahun_ajar = th.id_tahun_ajar join jurusan as jr on kl.id_jurusan = jr.id_jurusan where kl.id_kelas = $id_kelas")[0];
?>
<div class="container-fluid" style="background-color: #fff;padding: 20px">
  <div class="row">
    <div class="col-sm-12">
      <table style="width: 100%">
        <tr>
          <td class="desc-cell">Nama Sekolah</td>
          <td class="value-cell">SMK Negeri 7 Pekanbaru</td>
          <td class="desc-cell">Kelas</td>
          <td class="value-cell"><?= $kelas_detail['kls_name']." ".$kelas_detail['jrs_name'] ?></td>
        </tr>
        <tr>
          <td class="desc-cell">Alamat</td>
          <td class="value-cell">Jl. Yos Sudarso</td>
          <td class="desc-cell">Semester</td>
          <td class="value-cell">IV (Genap)</td>
        </tr>
        <tr>
          <td class="desc-cell">Nama</td>
          <td class="value-cell"><?= $siswa_detail['nama'] ?></td>
          <td class="desc-cell">Tahun Pelajaran</td>
          <td class="value-cell"><?= $kelas_detail['th_name'] ?></td>
        </tr>
        <tr>
          <td class="desc-cell">Nomor Induk (NISN)</td>
          <td class="value-cell"><?= $siswa_detail['nisn'] ?></td>
        </tr>
      </table>

      <div class="text-center">
        <h4>CAPAIAN HASIL BELAJAR</h4>
      </div>

      <br><span class="section-title">A. Sikap</span>
      <table class="table table-bordered table-striped">
        <tr>
          <th>Deskripsi</th>
        </tr>
        <tr>
          <td>Selalu berpikir ------------- ------------------- ------------------- ---------------- --- --- --- -------- ----- --- ----- - --- - --- - ---------- - -- - ------ - ----  ---------</td>
        </tr>
      </table>

      <br><span class="section-title">B. Pengetahuan dan Keterampilan</span>
      <table style="width: 100%; text-align: center" class="table table-bordered nilai">
        <thead>
          <tr>
            <th rowspan="2">Mata Pelajaran</th>
            <th colspan="4">Pengetahuan</th>
            <th colspan="4">Keterampilan</th>
          </tr>
          <tr>
            <th>KKM</th>
            <th>Angka</th>
            <th>Pred</th>
            <th>Deskripsi</th>
            <th>KKM</th>
            <th>Angka</th>
            <th>Pred</th>
            <th>Deskripsi</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($nilai_list as $ix=>$nilai){ ?>
          <tr>
            <td><?= $nilai['nama_mapel'] ?></td>
            <td><?= $nilai['kkm'] ?></td>
            <td><?= $nilai['n_pt'] ?></td>
            <td><?= predikat($nilai['n_pt']) ?></td>
            <td><?= $nilai['nilai_pengetahuan'] ?></td>
            <td><?= $nilai['kkm'] ?></td>
            <td><?= $nilai['n_kt'] ?></td>
            <td><?= predikat($nilai['n_kt']) ?></td>
            <td><?= $nilai['nilai_keterampilan'] ?></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php
  } else {
    echo "<script type='text/javascript'>window.location='../../index.php'</script>";
  }
} else {
  echo "<script type='text/javascript'>window.location='../../index.php'</script>";
}
?>