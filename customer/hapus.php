<?php
include '../config/class.php';

$hasil = $stripe->delete_customer($_GET['id']);

if($hasil['deleted']==true)
{
	echo "<script>alert('Customer berhasil dihapus');location='tampil.php';</script>";
}
?>