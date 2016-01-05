<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

/**
 * Coorporacion de Estampado
 * Carrito de Compras 01/02/2014
 *
 * @package estcorp
 * @subpackage administracion
 * @author Carlos Peña
 * @copyright Derechos Reservados (c) 2014 - 2015, GenProg C.A.
 * @link http://www.solo-educacion.org
 * @since Version 1.0
 */
class MaestroProducto extends CI_Model {
	var $identificador = NULL;
	var $codigo = '';
	var $nombre = '';
	var $observacion;
	var $unidad = 0;
	var $solido = 0;
	var $costoProduccion = 0.00;
	var $categoria;
	var $minimo = 0;
	var $maximo = 0;
	var $metodo = 0;
	var $nombreImagen = '';
	
	
	function __construct() {
		parent::__construct ();
		if (! isset ( $this->db )) {
			$this->load->database ();
		}
	}
	function cosultar() {
		$consulta = 'SELECT * FROM producto WHERE nomb=\'' . $this->nombre . '\' LIMIT 1';
		$rs = $this->db->query ( $consulta );
		if ($this->db->_error_number () == 0) {
			foreach ( $rs->result () as $clv => $val ) {
				$this->identificador = $val->oid;
				$this->nombre = $val->nomb;
				$this->observacion = $val->obse;
				$this->unidad = $val->unid;
				$this->costoProduccion = $val->cpro;
				$this->categoria = $val->cate;
				$this->nombreImagen = $val->imag;
				$this->metodo = $val->meto;
			}
		}
		$arr [] = array (
				'err' => $this->db->_error_number (),
				'msj' => $this->db->_error_message () 
		);
		return $arr;
	}

    function consultarID() {
        $consulta = 'SELECT * FROM producto WHERE oid=' . $this->identificador . ' LIMIT 1';


        $rs = $this->db->query ( $consulta );
        if ($this->db->_error_number () == 0) {
            foreach ( $rs->result () as $clv => $val ) {
                $this->identificador = $val->oid;
                $this->nombre = $val->nomb;
                $this->observacion = $val->obse;
                $this->unidad = $val->unid;
                $this->costoProduccion = $val->cpro;
                $this->categoria = $val->cate;
                $this->nombreImagen = $val->imag;
                $this->metodo = $val->meto;
            }
        }
        $arr [] = array (
            'err' => $this->db->_error_number (),
            'msj' => $this->db->_error_message ()
        );
        return $arr;
    }
	function registrar() {
		$data = $this->mapearObjeto ();
		$this->db->insert ( 'producto', $data );
		$arr [] = array (
				'err' => $this->db->_error_number (),
				'msj' => $this->db->_error_message () 
		);
		/**
		 * $producto = $this -> obtenerIdProducto();
		 * $arr[] = $producto;
		 * $this -> identificador = $producto['codigo'];
		 *
		 * $arr[] = $this -> registrarInventario();
		 */
		return $arr;
	}
	
	/**
	 * Creando un objeto de tipo inventario DB
	 *
	 * @return array
	 */
	function mapearObjeto() {
		$data = array ( //
				'oid' => $this->identificador, //
				'nomb' => $this->nombre, //
				'codi' => $this->codigo, //
				'obse' => $this->observacion, //
				'unid' => $this->unidad, //
				'cpro' => $this->costoProduccion, //
				'cate' => $this->categoria, //
				'meto' => $this->metodo, //
				'maxi' => $this->maximo, //
				'mini' => $this->minimo, //
				'imag' => $this->nombreImagen 
		) //
;
		
		return $data;
	}
	function obtenerIdProducto() {
		$codigo = 0;
		$consulta = 'SELECT oid FROM producto WHERE nomb=\'' . $this->nombre . '\' LIMIT 1';
		$rs = $this->db->query ( $consulta );
		if ($this->db->_error_number () == 0) {
			$resultado = $rs->result ();
			foreach ( $resultado as $clv => $val ) {
				$codigo = $val->oid;
			}
		}
		return array (
				'err' => $this->db->_error_number (),
				'msj' => $this->db->_error_message (),
				'codigo' => $codigo 
		);
	}
	function actualizar() {
		$data = $this->mapearObjeto ();
		$this->db->where ( 'oid', $data ['oid'] );
		
		$this->db->update ( 'producto', $data );
		$arr [] = array (
				'err' => $this->db->_error_number (),
				'msj' => $this->db->_error_message () 
		);
		return $arr;
	}
	function borrar() {
		$this->load->model ( 'administracion/minventario', 'Inventario' );
		$this->load->model ( 'fisico/mexistencia', 'Existencia' );
		$arr_a = $this->Inventario->borrar ( $this->identificador );
		$arr [] = $arr_a [0];
		$arr [] = $this->Existencia->borrar ( $this->identificador );
		$this->db->where ( 'oid', $this->identificador );
		$this->db->delete ( 'producto' );
		$arr [] = array (
				'err' => $this->db->_error_number (),
				'msj' => $this->db->_error_message () 
		);
		return $arr;
	}
	
	/**
	 * Listar existencia de productos
	 *
	 * @return array
	 */
	function listarActivo($tipo = NULL) {
		$donde = '';
		$rs = array ();
		if (! is_null ( $tipo )) {
			if ($tipo == 5) {
				$donde = ' WHERE producto.unid != 1';
			} elseif ($tipo == 1) {
				$donde = ' WHERE producto.unid =1';
			}
		}
		$lista = 'SELECT producto.oid AS oidp, producto.codi, producto.nomb, producto.obse AS observacion, inventario.disp, producto.cpro,producto.meto,
    unidad.nomb AS unidad, producto.imag, inventario.fent, producto.mini, producto.maxi, existencia.mode AS obse, producto.cate
    FROM producto LEFT JOIN inventario ON producto.oid=inventario.oidp LEFT JOIN existencia ON existencia.oidp=producto.oid 
    JOIN unidad ON producto.unid=unidad.oid ' . $donde . ' GROUP BY producto.oid';
		// echo $lista;
		$resultado = $this->db->query ( $lista );
		
		if ($this->db->_error_number () == 0)
			$rs = $resultado->result ();
		
		$arr [] = array (
				'err' => $this->db->_error_number (),
				'msj' => $this->db->_error_message (),
				'rs' => $rs 
		);
		return $arr;
	}
	
	/**
	 * Listar Existencia de los productos
	 */
	function listarExistenciaProductos(){
		$donde = '';
		$rs = array ();
		$lista = 'SELECT producto.oid AS oidp, producto.codi, producto.nomb, producto.obse AS observacion, sum(existencia.cant) as disp, existencia.fech as fent, 
				  producto.cpro,producto.meto, unidad.nomb AS unidad, producto.imag, producto.mini, producto.maxi, existencia.mode AS obse, producto.cate 
				  FROM producto LEFT JOIN existencia ON existencia.oidp=producto.oid JOIN unidad ON producto.unid=unidad.oid GROUP BY producto.oid';
		//echo $lista;
		$resultado = $this->db->query ( $lista );
		
		if ($this->db->_error_number () == 0)
			$rs = $resultado->result ();
		
		$arr [] = array (
				'err' => $this->db->_error_number (),
				'msj' => $this->db->_error_message (),
				'rs' => $rs
		);
		return $arr;
	}
	
	/**
	 * Listar Productos por Categoria
	 */
	function listarPorCategoria($idCategoria = NULL, $ubi = NULL) {
		$donde = '';
		if (! is_null ( $idCategoria )) {
			$donde = 'WHERE producto.cate=' . $idCategoria .' and existencia.visi=0';
			if(! is_null ( $ubi ) && $ubi > 0) {
				$donde .= ' AND existencia.ubic=' . $ubi;
			}
		}
		
		
		$lista = 'SELECT producto.oid as oidp, producto.codi, producto.nomb, producto.obse  AS observacion, SUM(existencia.cant) as disp, producto.cpro,producto.meto,
	    unidad.nomb AS unidad, producto.imag, existencia.fech as fent, producto.mini, producto.maxi,  existencia.mode AS obse, producto.cate, existencia.seri, 
				existencia.lote, existencia.ubic, existencia.cdet 
	    FROM producto JOIN existencia ON existencia.oidp=producto.oid  
		JOIN unidad ON producto.unid=unidad.oid ' . $donde . ' GROUP BY producto.oid';//, existencia.cdet';se comento para que no agrupe por precio
		//echo $lista;
		$resultado = $this->db->query ( $lista );
		if ($this->db->_error_number () == 0)
			$rs = $resultado->result ();
		
		$arr [] = array ('err' => $this->db->_error_number (),'msj' => $this->db->_error_message (),'rs' => $rs	);
		return $arr;
	}
	
	function listarUnidad() {
		$lista = 'SELECT oid, nomb FROM unidad';
		$resultado = $this->db->query ( $lista );
		if ($this->db->_error_number () == 0)
			$rs = $resultado->result ();
		$arr [] = array (
				'err' => $this->db->_error_number (),
				'msj' => $this->db->_error_message (),
				'rs' => $rs 
		);
		return $arr;
	}
	
	
	function cabeceraJSON() {
		$cabecera [1] = array (
				"titulo" => "oidp",
				"oculto" => "1" 
		);
		$cabecera [2] = array (
				"titulo" => "codigo",
				"atributos" => "width:70px" 
		);
		$cabecera [3] = array (
				"titulo" => "Nombre",
				"atributos" => "width:350px" 
		);
		$cabecera [4] = array (
				"titulo" => "Unidad",
				"atributos" => "width:100px" 
		);
		$cabecera [5] = array (
				"titulo" => "Cantidad",
				"atributos" => "width:60px;text-align:center" 
		);
		$cabecera [6] = array (
				"titulo" => "Ultima Fecha",
				"atributos" => "width:100px" 
		);
		$cabecera [7] = array (
				"titulo" => "#",
				"atributos" => "width:8px",
				'tipo' => 'bimagen',
				'funcion' => 'eliminarProducto',
				'ruta' => __IMG__ . 'quitar.png',
				'parametro' => '1' 
		);
		return $cabecera;
	}
	function __destruct() {
		$this->db->close ();
		unset ( $this->db );
	}
}

/**
 * select existencia.oidp, producto.nomb, producto.cate, categoria.nomb, existencia.cant,existencia.ubic, almacen.nomb from producto 
INNER JOIN categoria ON categoria.oid=producto.cate
INNER JOIN existencia on existencia.oidp=producto.oid
INNER JOIN almacen ON existencia.ubic=almacen.oid
GROUP BY producto.oid,producto.cate,existencia.ubic**/
