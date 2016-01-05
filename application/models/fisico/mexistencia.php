<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

/**
 * Coorporacion de Estampado
 * Carrito de Compras 01/02/2014
 * Solicitud de Mercacia
 *
 * @package estcorp
 * @subpackage fisico
 * @author Carlos Peña
 * @copyright Derechos Reservados (c) 2014 - 2015, GenProg C.A.
 * @link http://www.solo-educacion.org
 * @since Version 1.0
 *       
 */
class MExistencia extends CI_Model {
	var $identificador = NULL;
	var $idProducto;
	var $serial;
	var $lote = '';
	var $costoProduccion;
	var $costoDetal;
	var $costoMayor;
	var $unidad;
	var $marca = '';
	var $cantidad = 1;
	var $factura = '';
	var $proveedor = '';
	var $modelo = '';
	var $descripcion = '';
	var $estatus;
	var $ubicacion;
	var $fechaEntrada;
	var $visibilidad = 1;
	
	function __construct() {
		parent::__construct ();
		if (! isset ( $this->db )) {
			$this->load->database ();
		}
	}
	function registrar() {
		$data = $this->mapearObjeto ();
		
		// Registrando el Producto
		
		$arr [] = $this->registrarInventario ();
		
		// Registrando la existencia
		$this->db->insert ( 'existencia', $data );
		$arr [] = array (
				'err' => $this->db->_error_number (),
				'msj' => $this->db->_error_message () 
		);
		$arr [] = $this->actualizarInventario ();
		return $arr;
	}
	function mapearObjeto() {
		$data = array ( //
				'oid' => $this->identificador, //
				'oidp' => $this->idProducto, //
				'marc' => $this->marca, //
				'prov' => $this->proveedor, //
				'seri' => $this->serial, //
				'lote' => $this->lote, //
				'cpro' => $this->costoProduccion, //
				'cdet' => $this->costoDetal, //
				'cmay' => $this->costoMayor, //
				'unid' => $this->unidad, //
				'dscr' => $this->descripcion, //
				'mode' => $this->modelo, //
				'cant' => $this->cantidad, //
				'fact' => $this->factura, //
				'esta' => $this->estatus, //
				'ubic' => $this->ubicacion, //
				'fech' => $this->fechaEntrada, //
				'visi' => $this->visibilidad
		) //
;
		return $data;
	}
	function registrarInventario() {
		$this->load->model ( 'administracion/minventario', 'Inventario' );
		$this->Inventario->idProducto = $this->idProducto;
		$this->Inventario->disponible = $this->cantidad;
		$this->Inventario->serial = $this->serial;
		$this->Inventario->precio = $this->costoProduccion;
		$this->Inventario->lote = $this->lote;
		$this->Inventario->ubicacion = $this->ubicacion;
		$arr = $this->Inventario->registrar ();
		
		// print_r($arr);
		return $arr [0];
	}
	function actualizarInventario() {
		$this->load->model ( 'administracion/minventario', 'Inventario' );
		$this->Inventario->disponibile = $this->cantidad;
		$this->Inventario->idProducto = $this->idProducto;
		$this->Inventario->serial = $this->serial;
		$this->Inventario->lote = $this->lote;
		$this->Inventario->ubicacion = $this->ubicacion;
		$this->Inventario->precio = $this->costoProduccion;
		$arr = $this->Inventario->aumentar ();
		return $arr [0];
	}
	/**
	 * Buscar elementos de y distribuir los lotes.
	 * @param number $cant
	 * @return array
	 */
	function DistribuirExistencia($cant = 0){
		$this->load->model ( 'administracion/minventario', 'Inventario' );-
		$this->Inventario->disponibile = $cant;
		$this->Inventario->idProducto = $this->idProducto;
		$this->Inventario->serial = $this->serial;
		$this->Inventario->lote = $this->lote;
		$this->Inventario->ubicacion = $this->ubicacion;
		$this->Inventario->precio = $this->costoProduccion;
		$arr = $this->Inventario->compromoter ();
		return $arr [0];
		$this->Inventario->lote = $this->lote + 'C';
		$arr = $this->Inventario->registrar ();
		return $arr [0];
		
	}
    
	function cargarPost($arr = array()) {
		$listaSerial = explode ( ',', $arr ['listaserial'] );
		$this->mapearPost ( $arr );
		foreach ( $listaSerial as $serial ) {
			$this->serial = trim ( $serial );
			$this->registrar ();
		}
		echo 'Proceso Exitoso';
	}
	function mapearPost($arr) {
		$this->idProducto = $arr ['idproducto'];
		$this->marca = $arr ['marca'];
		$this->proveedor = $arr ['proveedor'];
		$this->costoProduccion = $arr ['compra'];
		$this->modelo = $arr ['modelo'];
		$this->descripcion = $arr ['descripcion'];
		$this->costoDetal = $arr ['detal'];
		$this->costoMayor = $arr ['mayor'];
		$this->factura = $arr ['factura'];
		$this->unidad = 1;
		$this->estatus = 0;
		
		$this->ubicacion = $arr ['ubicacion'];
		$this->fechaEntrada = $arr ['fecha'];
		return TRUE;
	}
	function cargarPostLote($arr = array()) {
		$this->mapearPost ( $arr );
		$this->unidad = 2;
		$this->serial = trim ( $arr ['serial'] );
		$this->lote = trim ( $arr ['lote'] );
		$this->cantidad = $arr ['cantidad'];
		$this->registrar ();
		
		$this->load->model ( 'administracion/mmovimiento', 'MMovimiento' );
		$data ['oid'] = $arr ['lote'];
		$data ['obsr'] = $arr ['observacion'];
		$data ['cant'] = $arr ['cantidad'];
		$data ['fent'] = $arr ['fecha'];
		$this->MMovimiento->salvarLote( $data );
		
		$arr [] = array (
				'err' => $this->db->_error_number (),
				'msj' => $this->db->_error_message () 
		);
		// print_r($arr);
		echo 'Proceso Exitoso...';
	}
	function listar($idProducto = NULL) {
		$rs = 0;
		$lista = 'SELECT 
    existencia.oidp,existencia.seri, existencia.lote, existencia.cpro, existencia.cdet, existencia.cmay, existencia.fact, existencia.esta,
    existencia.cant,unidad.nomb AS unidad, almacen.nomb AS ubicacion, almacen.ubic 
     FROM existencia 
     JOIN almacen ON existencia.ubic=almacen.oid
     LEFT JOIN producto ON existencia.oidp=producto.oid 
     JOIN unidad ON producto.unid=unidad.oid 
    WHERE existencia.oidp=' . $idProducto;
		
		$resultado = $this->db->query ( $lista );
		if ($this->db->_error_number () == 0) {
			$rs = $resultado->result ();
		}
		$arr [] = array (
				'err' => $this->db->_error_number (),
				'msj' => $this->db->_error_message (),
				'rs' => $rs 
		);
		return $arr;
	}
	function desincorporar($arg = array()) {
	}
	function cabeceraJSON() {
		$cabezera [1] = array (
				"titulo" => "ubicacion",
				"tipo" => 'combo',
				"atributos" => "width:360px" 
		);
		$cabezera [2] = array (
				"titulo" => "Serial",
				"atributos" => "width:140px" 
		);
		$cabezera [3] = array (
				"titulo" => "Factura",
				"atributos" => "width:100px" 
		);
		$cabezera [4] = array (
				"titulo" => "Cantidad",
				"atributos" => "width:50px;text-align:center" 
		);
		$cabezera [5] = array (
				"titulo" => "Unidad",
				"atributos" => "width:50px" 
		);
		$cabezera [6] = array (
				"titulo" => "Compra",
				"atributos" => "width:50px" 
		);
		$cabezera [7] = array (
				"titulo" => "Contado",
				"atributos" => "width:50px" 
		);
		$cabezera [8] = array (
				"titulo" => "Crédito",
				"atributos" => "width:50px" 
		);
		$cabezera [9] = array (
				"titulo" => "Estatus",
				"atributos" => "width:50px;text-align:center" 
		);
		return $cabezera;
	}
	
	/**
	 * Function eliminar Producto completamente
	 */
	function borrar($oidProducto) {
		$this->db->where ( 'oidp', $oidProducto );
		$this->db->delete ( 'existencia' );
		$arr [] = array (
				'err' => $this->db->_error_number (),
				'msj' => $this->db->_error_message () 
		);
		return $arr [0];
	}
	
	/**
	 * Comprometer inventario segun un pedido
	 * 
	 * @param
	 *        	array
	 */
	function comprometer($pedido = null) {
		// Definir lote y serial para un almacen masivo
		foreach ( $pedido as $clv ) {
			$actualizar = 'UPDATE existencia SET esta=1 WHERE oidp= ' . $clv ['oidp'] . ' AND esta=0 LIMIT ' . $clv ['cant'];
			$this->db->query ( $actualizar );
		}
	}
	function __destruct() {
		unset ( $this->db );
	}
}
?>

