<?php
if (isset($_POST['nilai'])){
  $nilai = $crud->escapeData($_POST['nilai']);
  $id_pengajaran = $_POST['id_pengajaran'];
  $successUpdate = 0;
  foreach($nilai as $id=>$n_siswa){
    $n_siswa['id_pengajaran'] = $id_pengajaran;
    $n_siswa['n_pt'] = ($n_siswa['n_harian'] + $n_siswa['n_tugas'] + $n_siswa['n_uas'] + $n_siswa['n_uts']) / 4;
    $n_siswa['id_siswa'] = $id;
    if(isset($n_siswa['nilai_keterampilan'])){
      $n_siswa['n_kt'] = ($n_siswa['n_kt_kelompok'] + $n_siswa['n_kt_uts'] + $n_siswa['n_kt_uas']) / 3;
    }
    if(is_numeric($n_siswa['id_nilai'])){
      $id_nilai = $n_siswa['id_nilai'];
      unset($n_siswa['id_nilai']);
      print_r($n_siswa);
      $crud->set($n_siswa)->where("id_nilai = $id_nilai")->into('nilai_mapel');
      $result = $crud->update();
      if($result) $successUpdate++;
      echo mysql_error();
    } else {
      $result = $crud->into('nilai_mapel')->insert($n_siswa);
      if($result) $successUpdate++;
      echo mysql_error();
    }
  }

  if($successUpdate > 0){
    echo "<script type='text/javascript'>";
    echo "window.location='index.php?content=pengajar&success=1'";
    echo "</script>";
  }
  exit;
}
echo "<script type='text/javascript'>";
echo "window.location='index.php?content=pengajar&success=0'";
echo "</script>";