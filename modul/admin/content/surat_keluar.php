<div class="panel panel-default">
  <div class="panel-heading">
    <a href="index.php">Beranda</a> &gt;
    Kelola Surat Keluar 
  </div>
</div>
<?php
$table="surat_keluar";

$link="surat_keluar";

  // delete data
  if (isset($_GET['aksi'])){
    if ($_GET['aksi']=="hapus"){
        $id=$_POST['id'];
        $lampiran=$_POST['lampiran'];
        $data=$crud->ReadAllClausa($table,'id',$id);
        $delete_process=$crud->delete1($table,'id',$id);
        $unlink=unlink("../../file/lampiran/$lampiran");


        if ($delete_process){
          echo "<script type='text/javascript'>";
          echo "window.location='index.php?content=$link'";
          echo "</script>";
        }
  // delete file
    }
  }
  // /delete data
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
      Data Surat Keluar
      </div>

      <table id="dynamic-table" class="table table-striped table-bordered table-hover">
 
        <thead>
          <tr>
            <th>No</th>
            <th>Jenis Surat</th>
            <th>No Surat</th>
            <th>Tanggal Kirim</th>
            <th>Tanggal Surat</th>
            <th>Penerima</th>
            <th>Pengolah</th>
            <th>Isi</th>
            <th>Aksi</th>

          </tr>
        </thead>


        <tbody>
          <?php
            $q=$crud->ReadAllOrderDesc($table,'id');
            $no=0;
            while ($d=mysql_fetch_assoc($q)) {
              $no+=1;
                $d2=$crud->ReadAllClausa('kd_surat','kd_surat',$d['kd_surat']);

          ?>
          <tr>
            

            <td align="center">
              <?php echo $no;?>
            </td>
            
            <td>
              <?php echo $d2['keterangan'];?>
            </td>

            <td >
              <?php echo $d['no_surat'];?>
            </td>

            <td >
              <?php echo $d['tgl_kirim'];?>
            </td>

            <td >
              <?php echo $d['tgl_surat'];?>
            </td>

            <td >
              <?php echo $d['penerima'];?>
            </td>
            <td >
              <?php echo $d['pengolah'];?>
            </td>

            <td >
              <?php echo $d['isi'];?>
            </td>

            
            <td>              
              <div class="hidden-sm hidden-xs action-buttons">

                <form action="index.php?content=v<?php echo $link;?>" method="POST" class="pull-left">
                  <input type="hidden" name="id" value="<?php echo $d['id'];?>">               
                  <button type="submit" class="btn-info tooltip-info" data-rel="tooltip" title="Lihat Data">
                    <i class="ace-icon fa fa-search-plus bigger-130"></i>
                  </button>
                </form>
                <form  class="pull-left">
                  &nbsp;
                </form>

                <form action="index.php?content=e<?php echo $link;?>" method="POST" class="pull-left">
                  <input type="hidden" name="id" value="<?php echo $d['id'];?>">
                  <button type="submit" class="btn-success tooltip-info" data-rel="tooltip" title="Ubah Data">
                    <i class="ace-icon fa fa-pencil bigger-130"></i>
                  </button>                
                </form>

                <form  class="pull-left">
                  &nbsp;
                </form>

                
                <form action="index.php?content=<?php echo $link; ?>&aksi=hapus" method="POST" class="pull-left">
                  <input type="hidden" name="id" value="<?php echo $d['id'];?>">
                  <input type="hidden" name="lampiran" value="<?php echo $d['lampiran'];?>">
                  <button type="submit" class="btn-danger tooltip-info" data-rel="tooltip" title="Hapus Data" onClick="return confirm('Hapus Data <?php echo $d['id']; ?>')">
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
                        <button type="submit" class="btn-danger tooltip-info" data-rel="tooltip" title="Hapus Data" onClick="return confirm('Hapus Data <?php echo $d['id']; ?>')">
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