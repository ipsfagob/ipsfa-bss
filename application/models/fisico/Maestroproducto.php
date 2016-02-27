<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

/**
 * 
 * Carrito de Compras 01/02/2014
 *
 * @package ipsfa-bss\application\model
 * @subpackage fisico
 * @author Carlos Peña <crash_madover@yahoo.com>
 * @copyright Derechos Reservados (c) 2015 - 2016, MamonSoft C.A.
 * @link http://www.mamonsoft.com.ve
 * @since version 1.0
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
	

	/**
	* Iniciando la clase, Cargando Elementos BD SAMAN
	*
	* @access public
	* @return void
	*/	
	function __construct() {
		parent::__construct ();
		if (! isset ( $this->db )) {
			$this->load->database ();
		}
	}
	function cosultar() {

	}

    function consultarID() {

    }
	function registrar() {

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

	}
	function actualizar() {

	}

	function borrar() {

	}
	
	
	/**
	 * Listar existencia de productos
	 *
	 * @return array
	 */
	function listarActivo($tipo = NULL) {
		
	}
	
	/**
	 * Listar Existencia de los productos
	 * 
	 * @access public
	 * @var string|cod, nomb, obse, imag
	 * @return JsonSerializable
	 */
	function listarExistenciaProductosSaman($pr = ''){
		$this->load->model('saman/Dbsaman', 'Dbsaman');
		$obj = $this->Dbsaman->consultar('SELECT suministrocod AS oid, suministronombre AS nomb, suministronmbrcomercial AS obse FROM ci_suministros_med WHERE suministronombre ~* \'' . $pr . '\'');
		
		return json_encode($obj->rs);
	}


	/**
	 * Listar Existencia de los productos
	 * 
	 * @access public
	 * @var string|cod, nomb, obse, imag
	 * @return JsonSerializable
	 */
	function listarExistenciaProductosSidroFan($pr = ''){
		$this->load->model('comun/Dbipsfa');
		$obj = $this->Dbipsfa->consultar('SELECT oid, nombre AS nomb, contenido AS obse, zpreprd AS imag FROM sidrofan WHERE nombre ~* \'' . $pr . '\'');
		
		return json_encode($obj->rs);
	}


	
	/**
	 * Listar Productos por Categoria
	 */
	function listarPorCategoria($idCategoria = NULL, $ubi = NULL) {

	}
	
	function listarUnidad() {
	
	}

	function __destruct() {
		$this->db->close ();
		unset ( $this->db );
	}
}
