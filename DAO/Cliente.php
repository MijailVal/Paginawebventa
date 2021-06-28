<?php
class cliente {

    private $dni;
    private $nombre;
    private $apellido;

    	
	public function setDni($dni){
		$this->dni = $dni;
	}

	public function getDni(){
		return $this->dni;
	}

    	
	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function getNombre(){
		return $this->nombre;
	}

    	
	public function setApellido($apellido){
		$this->apellido = $apellido;
	}

	public function getApellido(){
		return $this->apellido;
	}

}
?>