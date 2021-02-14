<?php

/**
* Class ini merupakan induk dari config class
*/
class ConfigClass
{
	var $host;
	var $user;
	var $pass;
	var $name;

	function __construct($a,$b,$c,$d)
	{
		# kode dari construct class
		$this->host=$a;
		$this->user=$b;
		$this->pass=$c;
		$this->name=$d;
	}
	// connecting host
	function ConnectHost()
	{
		$connect=mysql_connect($this->host,$this->user,$this->pass);
		// White Testing
		// if($connect){ echo "Koneksi Berhasil"; } else { echo "Koneksi Gagal !!"; }
	}
	// connecting database
	function ConnectDb(){
		$connect=mysql_select_db($this->name);
		// White Testing
		// if($connect){ echo "Database dengan nama <h3><b>".$this->name."</b></h3> Terkoneksi dengan baik."; } else { echo "Database dengan nama <h3><b>".$this->name."</b></h3> Gagal Terkoneksi !!"; }
	}

	// function date
	function change_date($x){
		switch ($x) {
			case '1': return $y="Januari"; break;
			case '2': return $y="Februari"; break;
			case '3': return $y="Maret"; break;
			case '4': return $y="April"; break;
			case '5': return $y="Mei"; break;
			case '6': return $y="Juni"; break;
			case '7': return $y="Juli"; break;
			case '8': return $y="Agustus"; break;
			case '9': return $y="September"; break;
			case '10': return $y="Oktober"; break;
			case '11': return $y="November"; break;
			case '12': return $y="Desember"; break;
		}
	}
	// /sfunction date

	// function get link
	function get_link(){
		echo "<input type='hidden' name='link' value=$_GET[content]>";
	}
	// /function get link 

	// function back link
	function back_link($link){
		echo "<script type='text/javascript'>";
		echo "window.location='index.php?content=$link'";
		echo "</script>";		
	}
	// /function back link

	// function home link
	function home_link(){
		echo "<script type='text/javascript'>";
		echo "window.location='index.php'";
		echo "</script>";		
	}
	// /function home link

	// function province
	
	// function page
	function page($x,$y){
		$data_awal=$x;
		$data_proses=explode($y, $data_awal);
		return $data_proses;
	}
	// /function page


     
	function lesstanggal($thn,$bulan,$tgl){
			switch ($bulan) {
				case '1': return $bln="Januari"; break;
				case '2': return $bln="Februari"; break;
				case '3': return $bln="Maret"; break;
				case '4': return $bln="April"; break;
				case '5': return $bln="Mei"; break;
				case '6': return $bln="Juni"; break;
				case '7': return $bln="Juli"; break;
				case '8': return $bln="Agustus"; break;
				case '9': return $bln="September"; break;
				case '10': return $bln="Oktober"; break;
				case '11': return $bln="November"; break;
				case '12': return $bln="Desember"; break;
			}
		$tanggal=$tgl." ".$bln." ".$thn;
		return $tanggal;
	}



// end of php codes
	// wrote by prianggaemilsyah a.k.a juniorsumbar
}
?>