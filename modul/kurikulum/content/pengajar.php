<div class="panel panel-default">
  <div class="panel-heading">
    <a href="index.php">Beranda</a> &gt;
    Pengajar Mata Pelajaran 
  </div>
</div>
<?php
$table1="pengajaran";

$link="pengajar";

  // delete data
  if (isset($_GET['aksi'])){
    if ($_GET['aksi']=="hapus"){
  // delete file 
        $id_pengajaran=$_POST['id_pengajaran'];
        $data=$crud->ReadAllClausa($table1,'id_pengajaran',$id_pengajaran);
        $delete_process1=$crud->delete1($table1,'id_pengajaran',$id_pengajaran);
          
        if ($delete_process1){
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

      Data Mata Pelajaran SMK N 7 Pekanbaru
      </div>

      <table id="dynamic-table" class="table table-striped table-bordered table-hover">
 
        <thead>
          <tr>
            <th>No.</th>
            <th>Nama Mata Pelajaran</th>
            <th>Jenis Mata Pelajaran</th>
            <th>Kelas</th>
            <th>Pengajar</th>
            <th>KKM</th>
            <th>Aksi</th>
          </tr>
        </thead>


        <tbody>
          <?php
            $q=$crud->ReadAllOrderDesc('pengajaran','id_pengajaran');
            $no=0;
            while ($d=mysql_fetch_assoc($q)) {                
                $no+=1;


          ?>
          <tr>
            

            <td align="center">
              <?php echo $no;?>
            </td>
           
            <td>
              <?php

              $d2=$crud->ReadAllClausa('mata_pelajaran','id_mapel',$d['id_mapel']);
              echo $d2['nama_mapel'];
              ?>
              
            </td>

            <td><?php 
              if ($d2['jenis_mapel']=="Umum") {
                echo "Umum";
              }else{
                $d3=$crud->ReadAllClausa('jurusan','id_jurusan',$d2['jenis_mapel']);
                echo "Jurusan ".$d3['keterangan'];
              }
            ?></td>


            <td>
              <?php 
                if ($d2['jenis_mapel']=="Umum") {
                  $d4=$crud->ReadAllClausa('kelas','id_kelas',$d['id_kelas']);
                  $d5=$crud->ReadAllClausa('jurusan','id_jurusan',$d4['id_jurusan']);
                  echo $d4['keterangan']." - ".$d5['keterangan'];
                }else{
                  $d4=$crud->ReadAllClausa('kelas','id_kelas',$d['id_kelas']);
                  echo $d4['keterangan']." - ".$d3['keterangan'];
                }
              ?>

              <?php
                
              ?>
              
            </td>


            <td><?php 
              $d5=$crud->ReadAllClausa('user','id',$d['id']);
              echo $d5['nama'];
            ?></td>


            <td><?php echo $d['kkm'];?></td>
            

            <td>
              
              
              <div class="hidden-sm hidden-xs action-buttons">

                <form action="index.php?content=v<?php echo $link;?>" method="POST" class="pull-left">
                  <input type="hidden" name="id_pengajaran" value="<?php echo $d['id_pengajaran'];?>">                 
                  <button type="submit" class="btn-info tooltip-info" data-rel="tooltip" title="Lihat Data">
                    <i class="ace-icon fa fa-search-plus bigger-130"></i>
                  </button>
                </form>
                <form  class="pull-left">
                  &nbsp;
                </form>

                <form action="index.php?content=e<?php echo $link;?>" method="POST" class="pull-left">
                  <input type="hidden" name="id_pengajaran" value="<?php echo $d['id_pengajaran'];?>">
                  <button type="submit" class="btn-success tooltip-info" data-rel="tooltip" title="Ubah Data">
                    <i class="ace-icon fa fa-pencil bigger-130"></i>
                  </button>                
                </form>

                <form  class="pull-left">
                  &nbsp;
                </form>

                
                <form action="index.php?content=<?php echo $link; ?>&aksi=hapus" method="POST" class="pull-left">
                  <input type="hidden" name="id_pengajaran" value="<?php echo $d['id_pengajaran'];?>">
                  <button type="submit" class="btn-danger tooltip-info" data-rel="tooltip" title="Hapus Data" onClick="return confirm('Hapus Data <?php echo $d2['nama_mapel']; ?>')">
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
                        <input type="hidden" name="id_pengajaran" value="<?php echo $d['id_pengajaran'];?>">                 
                        <button type="submit" class="btn-info tooltip-info" data-rel="tooltip" title="Lihat Data">
                          <i class="ace-icon fa fa-search-plus bigger-130"></i>
                        </button>
                      </form>
                    </li>

                    <li>
                      <form action="index.php?content=e<?php echo $link;?>" method="POST" class="pull-left">
                        <input type="hidden" name="id_pengajaran" value="<?php echo $d['id_pengajaran'];?>">
                        <button type="submit" class="btn-success tooltip-info" data-rel="tooltip" title="Ubah Data">
                          <i class="ace-icon fa fa-pencil bigger-130"></i>
                        </button>                
                      </form>
                    </li>

                    <li>
                      <form action="index.php?content=<?php echo $link; ?>&aksi=hapus" method="POST" class="pull-left">
                        <input type="hidden" name="id_pengajaran" value="<?php echo $d['id_pengajaran'];?>">
                        <button type="submit" class="btn-danger tooltip-info" data-rel="tooltip" title="Hapus Data" onClick="return confirm('Hapus Data <?php echo $d2['nama_mapel']; ?>')">
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