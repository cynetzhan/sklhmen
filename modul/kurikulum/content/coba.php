<select name="id_mapel" class="col-sm-8">
	<option>Pilih Guru Pengajar</option>
	<?php
		$q3=$crud->ReadAllOrder('user','nama');
		while ($d3=mysql_fetch_assoc($q3)) {
			if ($d3['kd_level']=='3') {
	?>
				<option value="<?php echo $d3['id'];?>"><?php echo $d3['nama'];?> </option>
	<?php
			}
		
	?>

	<?php
		}
	?>
	
	
</select>