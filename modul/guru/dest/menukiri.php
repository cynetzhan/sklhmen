<?php
if(isset($_GET['content'])){
 switch ($_GET['content']) {
    case 'siswa': $status2="active"; break;
    case 'esiswa': $status2="active"; break;
    case 'isiswa': $status2="active"; break;
    case '
    vsiswa': $status2="active"; break;

    case 'mapel': $status3="active"; break;
    case 'emapel': $status3="active"; break;
    case 'imapel': $status3="active"; break;
    case 'vmapel': $status3="active"; break;

    case 'pengajar': $status4="active"; break;
    case 'epengajar': $status4="active"; break;
    case 'ipengajar': $status4="active"; break;
    case 'vpengajar': $status4="active"; break;

    case 'kelas': $status5="active"; break;
    case 'ekelas': $status5="active"; break;
    case 'ikelas': $status5="active"; break;
    case 'vkelas': $status5="active"; break;

    case 'rapor': $status6="active"; break;
    case 'erapor': $status6="active"; break;
    case 'irapor': $status6="active"; break;
    case 'vrapor': $status6="active"; break;

    case 'prodi': $status7="active"; break;
    case 'eprodi': $status7="active"; break;
    case 'iprodi': $status7="active"; break;
    case 'vprodi': $status7="active"; break;

    case 'reportrapor': $status8="active"; break;
    case 'ereportrapor': $status8="active"; break;
    case 'ireportrapor': $status8="active"; break;
    case 'vreportrapor': $status8="active"; break;

    case 'reportabsen': $status9="active"; break;
    case 'ereportabsen': $status9="active"; break;
    case 'ireportabsen': $status9="active"; break;
    case 'vreportabsen': $status9="active"; break;

    case 'profil': $status13="active"; break;
    case 'eprofil': $status13="active"; break;
    case 'efoto': $status13="active"; break;
    case 'esandi': $status13="active"; break;

 }
}else{
  $status1="active";
}
?>
<div id="sidebar" class="sidebar responsive">
	<script type="text/javascript">
		try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
	</script>


	<ul class="nav nav-list">
		<li class="<?php echo $status1; ?>">
			<a href="index.php">
				<i class="menu-icon fa fa-home"></i>
				<span class="menu-text"> Beranda </span>
			</a>
			<b class="arrow"></b>
		</li>
		<li class="<?php echo $status4; ?>">
			<a href="index.php?content=pengajar">
				<i class="menu-icon fa fa-users"></i>
				<span class="menu-text"> Kelola Pengajaran </span>
			</a>
			<b class="arrow"></b>
		</li>	
		<li class="<?php echo $status13; ?>">
			<a href="index.php?content=profil">
				<i class="menu-icon fa fa-key"></i>
				<span class="menu-text"> Kelola Akun </span>
			</a>
			<b class="arrow"></b>
		</li>
			</ul>
	</ul><!-- /.nav-list -->

	<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
		<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
	</div>

	<script type="text/javascript">
		try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
	</script>
</div>