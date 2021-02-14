<?php
/*
	classes ini cuma coba2
*/
# configuration class
include "ConfigClass.php"; //calling the configuration class file in this system
# redirect class
include "ValidationClass.php"; //calling the validation class file in this system
# crud class
include "CrudClass.php"; // calling the create read update delete class file in this system

// Class Database
$host="localhost";
$user="root";
$pass="";
$name="esemka";

// object configclass
$main=new ConfigClass($host,$user,$pass,$name); //defining connect database
echo $main->ConnectHost();
$main->ConnectDb();
// object crudclass
$crud=new CrudClass(); //defining the create read update delete class for system


// end of php codes
	// wrote by prianggaemilsyah a.k.a juniorsumbar
?>