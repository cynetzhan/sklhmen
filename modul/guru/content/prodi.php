<div class="panel panel-default">
  <div class="panel-heading">
    <a href="index.php">Beranda</a> &gt;
    Program Studi
  </div>
</div>
<?php
$table1="jurusan";

$link="prodi";

  // delete data
  if (isset($_GET['aksi'])){
    if ($_GET['aksi']=="hapus"){
  // delete file 
        $id_jurusan=$_POST['id_jurusan'];
        $data=$crud->ReadAllClausa($table1,'id_jurusan',$id_jurusan);
        $delete_process1=$crud->delete1($table1,'id_jurusan',$id_jurusan);
          
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
          
      </div>
    <!-- div.dataTables_borderWrap -->
    <div>
      
      <div class="table-header">

      Data Program Studi SMK N 7 Pekanbaru
      </div>

      <table id="dynamic-table" class="table table-striped table-bordered table-hover">
 
        <thead>
          <tr>
            <th>No.</th>
            <th>Nama Program Studi</th>
            <th>Ketua Program Studi</th>
            <th>Aksi</th>
          </tr>
        </thead>


        <tbody>
          <?php
            $q=$crud->ReadAllOrderDesc($table1,'id_jurusan');
            $no=0;
            while ($d=mysql_fetch_assoc($q)) {                
                $no+=1;


          ?>
          <tr>
            

            <td align="center">
              <?php echo $no;?>
           
            <td>
              
              <?php 
              echo "Program Studi ".$d['keterangan'];
              ?>
                
            </td>
            <td >
              <?php
              if ($d['id']=='0') {
                echo "Ketua Program Studi Belum Dipilih";
              }else{
                $d3=$crud->ReadAllClausa('user','id',$d['id']);
                echo $d3['nama'];
              }

              ?>
            </td>

            <td>
              
              
              <div class="hidden-sm hidden-xs action-buttons">

                <form action="index.php?content=v<?php echo $link;?>" method="POST" class="pull-left">
                  <input type="hidden" name="id_jurusan" value="<?php echo $d['id_jurusan'];?>">                 
                  <button type="submit" class="btn-info tooltip-info" data-rel="tooltip" title="Lihat Data">
                    <i class="ace-icon fa fa-search-plus bigger-130"></i>
                  </button>
                </form>
                <form  class="pull-left">
                  &nbsp;
                </form>

                <form action="index.php?content=e<?php echo $link;?>" method="POST" class="pull-left">
                  <input type="hidden" name="id_jurusan" value="<?php echo $d['id_jurusan'];?>">
                  <button type="submit" class="btn-success tooltip-info" data-rel="tooltip" title="Ubah Data">
                    <i class="ace-icon fa fa-pencil bigger-130"></i>
                  </button>                
                </form>

                <form  class="pull-left">
                  &nbsp;
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
                        <input type="hidden" name="id_jurusan" value="<?php echo $d['id_jurusan'];?>">                 
                        <button type="submit" class="btn-info tooltip-info" data-rel="tooltip" title="Lihat Data">
                          <i class="ace-icon fa fa-search-plus bigger-130"></i>
                        </button>
                      </form>
                    </li>

                    <li>
                      <form action="index.php?content=e<?php echo $link;?>" method="POST" class="pull-left">
                        <input type="hidden" name="id_jurusan" value="<?php echo $d['id_jurusan'];?>">
                        <button type="submit" class="btn-success tooltip-info" data-rel="tooltip" title="Ubah Data">
                          <i class="ace-icon fa fa-pencil bigger-130"></i>
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