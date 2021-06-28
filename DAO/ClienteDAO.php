<?php 
include 'DataSource.php';
include 'Cliente.php';
include 'ICliente.php';
class ClienteDAO implements ICliente
{
	public function Listar(){
		$data_source = new DataSource();
		$data_table = $data_source->ejecutarConsulta("SELECT dni,nombre,apellido FROM cliente");
		$cliente = null;
		$resultado = array();

		foreach ($data_table as $clave=>$valor) {
			$cliente = new cliente();
			$cliente->setDni( $data_table[$clave]["dni"] );
			$cliente->setNombre( $data_table[$clave]["nombre"] );
			$cliente->setApellido( $data_table[$clave]["apellido"] );		
			array_push($resultado, $cliente);
		}
		return $resultado;
	}
	
	public function Agregar(Cliente $cliente){
		$data_source = new DataSource();

		$sql = "INSERT INTO cliente VALUES (:dni,:nombre,:apellido)";

		$resultado = $data_source->ejecutarActualizacion($sql,array(
			':dni'=>$cliente->getDni(),			
			':nombre'=>$cliente->getNombre(),
			':apellido'=>$cliente->getApellido()		
			)
		);
		return $resultado;		
	}

	public function Actualizar(Cliente $cliente){
		$data_source = new DataSource();
		$sql = "UPDATE cliente SET nombre = :nombre,apellido= :apellido						
				WHERE dni = :dni";
		$resultado = $data_source->ejecutarActualizacion($sql,array(			
			':nombre'=>$cliente->getNombre(),
			':apellido'=> $cliente->getApellido(),
			':dni'=>$cliente->getDni()
			)
		);
		return $resultado;
	}

	public function Eliminar($dni){
		$data_source = new DataSource();
		$resultado = $data_source->ejecutarActualizacion("DELETE FROM cliente WHERE dni = :dni",
			array(':dni'=>$dni));
		return $resultado;
	}
}
?>