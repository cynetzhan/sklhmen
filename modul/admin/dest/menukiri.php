<?php
if(isset($_GET['content'])){
 switch ($_GET['content']) {
    case 'user': $status2="active"; break;
    case 'euser': $status2="active"; break;
    case 'iuser': $status2="active"; break;
    case 'vuser': $status2="active"; break;
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
		<li class="<?php echo $status2; ?>">
			<a href="index.php?content=user">
				<i class="menu-icon fa fa-users"></i>
				<span class="menu-text"> Kelola Pengguna </span>
			</a>
			<b class="arrow"></b>
		</li>
			</ul>
		
			<ul class="nav nav-list">
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