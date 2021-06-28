<?php 
interface ICliente
{
	public function Listar();	
	public function Agregar(Cliente $cliente);
	public function Actualizar(Cliente $cliente);
	public function Eliminar($dni);
}
?>