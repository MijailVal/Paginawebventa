<?php
class Producto
{
	private $codproducto;
	private $precio;
	private $stock;
	private $nomproducto;
    private $descripcion;
    private $marca;
    private $imagen;
	
	
	public function setCodProducto($codproducto){
		$this->codproducto = $codproducto;
	}

	public function getCodProducto(){
		return $this->codproducto;
	}

	public function setPrecio($precio){
		$this->precio= $precio;  
	}

	public function getPrecio(){
		return $this->precio;
	}

	public function setStock($stock){
		$this->stock = $stock;
	}

	public function getStock(){
		return $this->stock;
	}	

	public function setNomProducto($nomproducto){
		$this->nomproducto = $nomproducto;
	}

	public function getNomProducto(){
		return $this->nomproducto;
	}
    public function setDescripcion($descripcion){
		$this->descripcion = $descripcion;
	}

	public function getDescripcion(){
		return $this->descripcion;
	}
    public function setMarca($marca){
		$this->marca = $marca;
	}

	public function getMarca(){
		return $this->marca;
	}
    public function setImagen($imagen){
		$this->imagen = $imagen;
	}

	public function getImagen(){
		return $this->imagen;
	}
}
?>