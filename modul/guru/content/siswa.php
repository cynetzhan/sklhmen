<div class="panel panel-default">
  <div class="panel-heading">
    <a href="index.php">Beranda</a> &gt;
    Siswa 
  </div>
</div>
<?php
$table1="siswa";
$table2="user";

$link="siswa";

  // delete data
  if (isset($_GET['aksi'])){
    if ($_GET['aksi']=="hapus"){
  // delete file 
        $nisn=$_POST['nisn'];
        $foto=$_POST['foto'];
        $data=$crud->ReadAllClausa($table2,'nip',$nisn);
        $data2=$crud->ReadAllClausa($table1,'nis',$nisn);
        if ($foto=="default.png") {
          $delete_process1=$crud->delete1($table2,'nip',$nisn);
          $delete_process2=$crud->delete1($table1,'nisn',$nisn);
          }else{

          $unlink=unlink("../../file/user/$foto");
          $delete_process1=$crud->delete1($table2,'nip',$nisn);
          $delete_process2=$crud->delete1($table1,'nisn',$nisn);
          } 
        if ($delete_process1 && $delete_process2){
          echo "<script type='text/javascript'>";
          echo "window.location='index.php?content=$link'";
          echo "</script>";
        }
  // delete file
    }
  }

?>

<div class="row">
  <div class="col-xs-12">
    
    <!-- div.table-responsive -->
      <div class="clearfix">
        <div class="pull-right tableTools-container"></div>
          <a href="index.php?content=i<?php echo $link; ?>">
            <button data-rel="tooltip" class="pull-right btn btn-white btn-primary btn-bold fa fa-pencil-square-o black bigger-150" title="" data-placement="top" data-original-title="Tambah Data Tabel">
            </button>
          </a>
      </div>
    <!-- div.dataTables_borderWrap -->
    <div>
      
      <div class="table-header">
      Data Siswa SMK N 7 Pekanbaru
      </div>

      <table id="dynamic-table" class="table table-striped table-bordered table-hover">
 
        <thead>
          <tr>
            <th>No.</th>
            <th>Foto</th>
            <th>NISN</th>
            <th>Nama</th>
            <th>Angkatan</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            <th>Aksi</th>
          </tr>
        </thead>


        <tbody>
          <?php
            $q=$crud->ReadAllOrderDesc('siswa','id_siswa');
            $no=0;
            while ($d=mysql_fetch_assoc($q)) {                
                $no+=1;
                $d2=$crud->ReadAllClausa('kelas','id_kelas',$d['id_kelas']);
                $d3=$crud->ReadAllClausa('angkatan','id_angkatan',$d['id_angkatan']);
                $d4=$crud->ReadAllClausa('jurusan','id_jurusan',$d['id_angkatan']);


          ?>
          <tr>
            

            <td align="center">
              <?php echo $no;?>
            </td>
            <?php $foto=$d['foto']; ?>
            <td><img height="80px" src="../../file/user/<?php echo $foto; ?>"></td>
            

            <td><?php echo $d['nisn'];?></td>
            
            <td><?php echo $d['nama'];?></td>

            <td ><?php echo $d3['tahun'];?></td>
            <td ><?php echo $d2['keterangan'];?></td>
            <td ><?php echo $d4['keterangan'];?></td>

            <td>
              
              
              <div class="hidden-sm hidden-xs action-buttons">

                <form action="index.php?content=v<?php echo $link;?>" method="POST" class="pull-left">
                  <input type="hidden" name="id_siswa" value="<?php echo $d['id_siswa'];?>">                 
                  <button type="submit" class="btn-info tooltip-info" data-rel="tooltip" title="Lihat Data">
                    <i class="ace-icon fa fa-search-plus bigger-130"></i>
                  </button>
                </form>
                <form  class="pull-left">
                  &nbsp;
                </form>

                <form action="index.php?content=e<?php echo $link;?>" method="POST" class="pull-left">
                  <input type="hidden" name="id_siswa" value="<?php echo $d['id_siswa'];?>">
                  <button type="submit" class="btn-success tooltip-info" data-rel="tooltip" title="Ubah Data">
                    <i class="ace-icon fa fa-pencil bigger-130"></i>
                  </button>                
                </form>

                <form  class="pull-left">
                  &nbsp;
                </form>

                
                <form action="index.php?content=<?php echo $link; ?>&aksi=hapus" method="POST" class="pull-left">
                  <input type="hidden" name="nisn" value="<?php echo $d['nisn'];?>">
                  <input type="hidden" name="foto" value="<?php echo $d['foto'];?>">
                  <button type="submit" class="btn-danger tooltip-info" data-rel="tooltip" title="Hapus Data" onClick="return confirm('Hapus Data <?php echo $d['nama']; ?>')">
                    <i class="ace-icon fa fa-trash bigger-130"></i>
                  </button>                
                </form>

              </div>

              <div class="hidden-md hidden-lg">
                <div class="inline pos-rel">
                  <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
                    <i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
                  </button>

                  <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                    <li>
                      <form action="index.php?content=v<?php echo $link;?>" method="POST" class="pull-left">
                        <input type="hidden" name="id" value="<?php echo $d['id'];?>">                 
                        <button type="submit" class="btn-info tooltip-info" data-rel="tooltip" title="Lihat Data">
                          <i class="ace-icon fa fa-search-plus bigger-130"></i>
                        </button>
                      </form>
                    </li>

                    <li>
                      <form action="index.php?content=e<?php echo $link;?>" method="POST" class="pull-left">
                        <input type="hidden" name="id" value="<?php echo $d['id'];?>">
                        <button type="submit" class="btn-success tooltip-info" data-rel="tooltip" title="Ubah Data">
                          <i class="ace-icon fa fa-pencil bigger-130"></i>
                        </button>                
                      </form>
                    </li>

                    <li>
                      <form action="index.php?content=<?php echo $link; ?>&aksi=hapus" method="POST" class="pull-left">
                        <input type="hidden" name="id" value="<?php echo $d['id'];?>">
                        <button type="submit" class="btn-danger tooltip-info" data-rel="tooltip" title="Hapus Data" onClick="return confirm('Hapus Data <?php echo $d['nama']; ?>')">
                          <i class="ace-icon fa fa-trash bigger-130"></i>
                        </button>                
                      </form>
                    </li>
                  </ul>
                </div>
              </div>
            </td>

          </tr>

          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>