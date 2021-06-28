<?php
if($_GET){
	if($_GET['dni']){
		$dni=$_GET['dni'];
		require 'DAO/ClienteDAO.php';
		$dao = new ClienteDAO();
		$i = $dao->Eliminar($dni);
		if ($i == 1) {
			header("location:nuevocliente.php");

		}
		else {
			echo "<script>alert('Error');</script>";	
		}
	}else if($_GET['codproducto']){
		$codproducto=$_GET['codproducto'];
		require 'DAO/ProductoDAO.php';
		$dao=new ProductoDAO();
		$i = $dao->Eliminar($codproducto);
		if ($i == 1) {
			header("location:nuevaprenda.php");

		}
		else {
			echo "<script>alert('Error');</script>";	
		}
	}
}
?>