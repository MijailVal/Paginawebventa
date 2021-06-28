<?php 
interface IProducto
{
	public function Listar();	
	public function Agregar(Producto $producto);
	public function Actualizar(Producto $producto);
	public function Eliminar($codproducto);
}
?>