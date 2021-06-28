<?php 
include 'DataSource.php';
include 'Producto.php';
include 'IProducto.php';
class ProductoDAO implements IProducto
{
	public function Listar(){
		$data_source = new DataSource();
		$data_table = $data_source->ejecutarConsulta("SELECT codProducto,precio,stock,nomProducto,descripcion,marca,imagen FROM producto");
		$producto = null;
		$resultado = array();

		foreach ($data_table as $clave=>$valor) {
			$producto = new Producto();
			$producto->setCodProducto( $data_table[$clave]["codProducto"] );
			$producto->setPrecio( $data_table[$clave]["precio"] );
			$producto->setStock( $data_table[$clave]["stock"] );
			$producto->setNomProducto( $data_table[$clave]["nomProducto"] );	
            $producto->setDescripcion( $data_table[$clave]["descripcion"] );	
            $producto->setMarca( $data_table[$clave]["marca"] );	
            $producto->setImagen( $data_table[$clave]["imagen"] );			
			array_push($resultado, $producto);
		}
		return $resultado;
	}
	
	public function Agregar(Producto $producto){
		$data_source = new DataSource();

		$sql = "INSERT INTO producto VALUES (:codProducto,:precio,:stock,:nomProducto,:descripcion,:marca,:imagen)";

		$resultado = $data_source->ejecutarActualizacion($sql,array(
			':codProducto'=>$producto->getCodProducto(),			
			':precio'=>$producto->getPrecio(),
			':stock'=>$producto->getStock(),
			':nomProducto'=>$producto->getNomProducto(),	
            ':descripcion'=>$producto->getDescripcion(),
            ':marca'=>$producto->getMarca(),
            ':imagen'=>$producto->getImagen()			
			)
		);
		return $resultado;		
	}

	public function Actualizar(Producto $producto){
		$data_source = new DataSource();
		$sql = "UPDATE producto SET precio = :precio, stock = :stock,nomProducto = :nomProducto,descripcion= :descripcion,marca= :marca,imagen= :imagen						
				WHERE codProducto = :codProducto";
		$resultado = $data_source->ejecutarActualizacion($sql,array(			
			':precio'=>$producto->getPrecio(),
			':stock'=> $producto->getStock(),
			':nomProducto'=>$producto->getNomProducto(),			
			':descripcion'=>$producto->getDescripcion(),
            ':marca'=>$producto->getMarca(),
            ':imagen'=>$producto->getImagen(),
            ':codProducto'=>$producto->getCodProducto()
			)
		);
		return $resultado;
	}

	public function Eliminar($codproducto){
		$data_source = new DataSource();
		$resultado = $data_source->ejecutarActualizacion("DELETE FROM producto WHERE codProducto = :codProducto",
			array(':codProducto'=>$codproducto));
		return $resultado;
	}
}
?>