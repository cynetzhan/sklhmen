<?php
session_start();
include "config.php";
$jumlah1 = mysql_query("SELECT * FROM disposisi
    WHERE status='Terverifikasi'");
$a = mysql_num_rows($jumlah1);


$nip=$_SESSION['user'];
$query=mysql_query("Select * from profil where nip='$nip'");
$data=mysql_fetch_array($query);

$jumlah2 = mysql_query("SELECT * FROM disposisi
    WHERE status='Didisposisikan' and id_jabatan='$data[id_jabatan]' ");

$b=mysql_num_rows($jumlah2);
$total=$a+$b;
if($total>0){
    echo $total;
}
?>
