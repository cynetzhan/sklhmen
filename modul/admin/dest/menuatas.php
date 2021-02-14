<div id="navbar" class="navbar navbar-default">
	<script type="text/javascript">
		try{ace.settings.check('navbar' , 'fixed')}catch(e){}
	</script>
	
	<div class="navbar-container green" id="navbar-container">
		<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
			<span class="sr-only">Toggle sidebar</span>

			<span class="icon-bar"></span>

			<span class="icon-bar"></span>

			<span class="icon-bar"></span>
		</button>

		<div class="navbar-header pull-left">
			<a href="index.php" class="navbar-brand">
				<small>
					<i class="fa fa-gear"></i>
					Sistem Informasi Rapor Siswa
				</small>
			</a>
		</div>

		<div class="navbar-buttons navbar-header pull-right" role="navigation">
			<ul class="nav ace-nav">
				

				

				
					
				<?php
				$data=$crud->ReadAllClausa('user','id',$_SESSION['id']);
				?>

				<li class="green">
					<a data-toggle="dropdown" href="#" class="dropdown-toggle">
						<img class="nav-user-photo" src="../../file/user/<?php echo $data['foto']; ?>" alt="Jason's Photo" />
						<span class="user-info">
							<small>Selamat Datang</small>
							<?php
							
								echo $data['nama'];
							?>
						</span>

						<i class="ace-icon fa fa-caret-down"></i>
					</a>

					<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
				
						<!--
						<li>
							<a href="index.php?profil">
								<i class="ace-icon fa fa-user"></i>
								Profile
							</a>
						</li>
					-->

						<li>
							<a href="#" onClick="logout()">
								<i class="ace-icon fa fa-power-off"></i>
								Logout
							</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div><!-- /.navbar-container -->
			


</div>