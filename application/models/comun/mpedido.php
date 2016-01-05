<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

/**
 * Coorporacion de Estampado
 * Carrito de Compras 01/02/2014
 * Solicitud de Mercacia
 *
 * @package estcorp
 * @subpackage comun
 * @author Carlos Peña
 * @copyright Derechos Reservados (c) 2014 - 2015, GenProg C.A.
 * @link http://www.solo-educacion.org
 * @since Version 1.0
 *       
 */
class MPedido extends CI_Model {
	var $codigo = null;
	function __construct() {
		$this->load->database ();
	}
	
	/**
	 * Realizar solicitud del Pedido
	 */
	function registrar($carroContenido = array()) {
		$data = $this->mapearObjeto ( $carroContenido );
		$val [] = $this->registrarPedido ( $data );
		$val [] = $this->comprometerExistencia ( $data );
        $val['orde'] = $data[0]["orde"];
		return $val;
	}
	function mapearObjeto($carroContenido = array()) {
		$data = array ();
		$orden = $this->generarOrdenPedido ();
		foreach ( $carroContenido as $clv ) {
			
			$idAux = explode ( "_", $clv ['id'] );
			$data [] = array ( //
					'oid' => 'null', //
					'oidp' => $idAux [0], //
					'seri' => $idAux [1],
					'lote' => $idAux [2],
					'ubic' => $idAux [3],
					'oidu' => $_SESSION ['oid'], //
					'prec' => $clv ['price'], //
					'cant' => $clv ['qty'], //
					'orde' => $orden, //
					'esta' => 0 
			); //
			//print_r($idAux);
		}
		
		return $data;
	}
	
	/**
	 * En el almacen compromete existencia
	 *
	 * @param
	 *        	array
	 * @return multitype:NULL
	 */
	function comprometerExistencia($data = array()) {
		$this->load->model ( 'fisico/mexistencia', 'MExistencia' );
		$this->MExistencia->comprometer ( $data );
		$arr [] = array (
				'err' => $this->db->_error_number (),
				'msj' => $this->db->_error_message () 
		);
		return $arr;
	}
	function generarOrdenPedido() {
		$this->load->model ( 'administracion/morden', 'Orden' );
		$this->Orden->nombre = 'Carrito: Solicitud de Pedido';
		$this->Orden->tipo = 0;
		$this->Orden->generarPedido ();
		return $this->Orden->codigo;
	}
	
	/**
	 * En el inventario descuenta disponibilidad
	 * 
	 * @param
	 *        	array
	 * @return multitype:NULL
	 */
	function registrarPedido($data = array()) {
		$this->db->insert_batch ( 'pedido', $data );
		$this->load->model ( 'administracion/minventario', 'MInventario' );
		$this->MInventario->comprometer ( $data );
		$arr [] = array (
				'err' => $this->db->_error_number (),
				'msj' => $this->db->_error_message () 
		);
		return $arr;
	}
	function revocar() {
	}
	function cabeceraJSON() {
		$cabecera [1] = array (
				"titulo" => "codigo",
				"atributos" => "width:70px" 
		);
		$cabecera [2] = array (
				"titulo" => "Nombre Usuario",
				"atributos" => "width:350px" 
		);
		$cabecera [3] = array (
				"titulo" => "telefono",
				"atributos" => "width:350px" 
		);
		$cabecera [4] = array (
				"titulo" => "Correo",
				"atributos" => "width:350px" 
		);
		$cabecera [5] = array (
				"titulo" => "Total",
				"atributos" => "width:100px" 
		);
		$cabecera [6] = array (
				"titulo" => "Orden",
				"atributos" => "width:100px" 
		);
		$cabecera [7] = array (
				"titulo" => "Ultima Fecha",
				"atributos" => "width:100px" 
		);
		return $cabecera;
	}
	function cabezeraJSONCliente() {
		$cabecera [1] = array (
				"titulo" => " ",
				"tipo" => "detallePost",
				"atributos" => "width:15px",
				"funcion" => "Detalle_Orden",
				"parametro" => "2" 
		);
		$cabecera [2] = array (
				"titulo" => "#PEDIDO",
				"atributos" => "width:40px" 
		);
		$cabecera [3] = array (
				"titulo" => "Monto",
				"atributos" => "width:50px;text-align : right;" 
		);
		$cabecera [4] = array (
				"titulo" => "Banco",
				"atributos" => "width:100px",
				"tipo" => "texto_fijo" 
		);
		$cabecera [5] = array (
				"titulo" => "Deposito",
				"atributos" => "width:120px",
				"tipo" => "texto_fijo" 
		);
		$cabecera [6] = array (
				"titulo" => "Observaciones",
				"tipo" => "texto_fijo" 
		);
		$cabecera [7] = array (
				"titulo" => "Fecha",
				"tipo" => "calendario" 
		);
		$cabecera [8] = array (
				"titulo" => "oidu",
				"oculto" => 1 
		);
		$cabecera [9] = array (
				"titulo" => "A",
				"tipo" => "bimagen",
				"funcion" => 'Aceptar_Deposito',
				"parametro" => "2,4,5,6,7,8",
				"ruta" => __IMG__ . "botones/aceptar1.png",
				"atributos" => "width:10px" 
		);
		$cabecera [10] = array (
				"titulo" => "R",
				"tipo" => "bimagen",
				"funcion" => 'Rechazar_Pedido_Cliente',
				"parametro" => "2,8",
				"ruta" => __IMG__ . "botones/quitar.png",
				"atributos" => "width:10px" 
		);
		
		return $cabecera;
	}
	function cabezeraJSONAdmin() {
		$cabecera [1] = array (
				"titulo" => " ",
				"tipo" => "detallePost",
				"atributos" => "width:15px",
				"funcion" => "Detalle_Orden",
				"parametro" => "2" 
		);
		$cabecera [2] = array (
				"titulo" => "Nombre",
				"atributos" => "width:60px" 
		);
		$cabecera [3] = array (
				"titulo" => "Telefono|Correo",
				"atributos" => "width:40px" 
		);
		$cabecera [4] = array (
				"titulo" => "#PEDIDO",
				"atributos" => "width:40px;text-align : right;" 
		);
		$cabecera [5] = array (
				"titulo" => "Monto",
				"atributos" => "width:50px;text-align : right;" 
		);
		$cabecera [6] = array (
				"titulo" => "Banco",
				"atributos" => "width:100px",
				"tipo" => "texto_fijo" 
		);
		$cabecera [7] = array (
				"titulo" => "Deposito",
				"atributos" => "width:120px",
				"tipo" => "texto_fijo" 
		);
		$cabecera [8] = array (
				"titulo" => "Observaciones",
				"tipo" => "texto_fijo" 
		);
		$cabecera [9] = array (
				"titulo" => "Fecha",
				"tipo" => "calendario" 
		);
		$cabecera [10] = array (
				"titulo" => "oidu",
				"oculto" => 1 
		);
		$cabecera [11] = array (
				"titulo" => "A",
				"tipo" => "bimagen",
				"funcion" => 'Aceptar_Deposito',
				"parametro" => "4,6,7,8,9,10",
				"ruta" => __IMG__ . "botones/aceptar1.png",
				"atributos" => "width:10px" 
		);
		$cabecera [12] = array (
				"titulo" => "R",
				"tipo" => "bimagen",
				"funcion" => 'Rechazar_Pedido_Cliente',
				"parametro" => "4,10",
				"ruta" => __IMG__ . "botones/quitar.png",
				"atributos" => "width:10px" 
		);
		
		return $cabecera;
	}
	function listarActivo() {
		$lista = 'SELECT pedido.orde, usuario.nomb, usuario.apel, usuario.corr, usuario.telf       
    FROM pedido 
        JOIN usuario ON pedido.oidu=usuario.oid LEFT JOIN producto ON pedido.oidp=producto.oid 
        WHERE tipo=0';
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
	 *
	 * @param string $usuarioId        	
	 * @param string $tipo
	 *        	0: Pendiente, 1: Procesando, 2: Procesado, 3: Cancelado Por Cliente 4: Cancelado por administrador
	 * @return multitype:NULL unknown
	 */
	function listarPorUsuario($usuarioId = NULL, $esta = NULL) {
		$lista = 'SELECT pedido.orde, usuario.nomb, usuario.apel, usuario.corr, usuario.telf,usuario.oid as oidu,
    producto.nomb as nombre, pedido.prec, pedido.cant, SUM(pedido.prec*pedido.cant) AS total FROM pedido 
  			JOIN usuario ON pedido.oidu=usuario.oid LEFT JOIN producto ON pedido.oidp=producto.oid 
  			WHERE usuario.oid=' . $usuarioId . ' AND pedido.esta=' . $esta . ' GROUP BY pedido.orde';
		$resultado = $this->db->query ( $lista );
		$rs = 0;
		$cant = 0;
		if ($this->db->_error_number () == 0)
			$rs = $resultado->result ();
		$arr [] = array (
				'err' => $this->db->_error_number (),
				'msj' => $this->db->_error_message (),
				'rs' => $rs,
				'cant' => $resultado->num_rows () 
		);
		return $arr;
	}
	function listarPorAdmin($esta = NULL) {
		$lista = 'SELECT pedido.orde, usuario.nomb, usuario.apel, usuario.corr, usuario.telf,usuario.oid as oidu,
    producto.nomb as nombre, pedido.prec, pedido.cant, SUM(pedido.prec*pedido.cant) AS total FROM pedido
  			JOIN usuario ON pedido.oidu=usuario.oid LEFT JOIN producto ON pedido.oidp=producto.oid
  			WHERE pedido.esta=' . $esta . ' GROUP BY pedido.orde';
		$resultado = $this->db->query ( $lista );
		$rs = 0;
		$cant = 0;
		if ($this->db->_error_number () == 0)
			$rs = $resultado->result ();
		$arr [] = array (
				'err' => $this->db->_error_number (),
				'msj' => $this->db->_error_message (),
				'rs' => $rs,
				'cant' => $resultado->num_rows () 
		);
		return $arr;
	}

	function listaPedidosOrden($orden) {
		$query = "SELECT pedido.orde, producto.nomb as nombre,producto.obse as detalle, pedido.prec, pedido.cant,(cant*prec)as total FROM pedido 
	LEFT JOIN producto ON pedido.oidp=producto.oid 
	WHERE pedido.orde=" . $orden;
		$resultado = $this->db->query ( $query );
		$rs = 0;
		if ($this->db->_error_number () == 0)
			$rs = $resultado->result ();
		$arr [] = array (
				'err' => $this->db->_error_number (),
				'msj' => $this->db->_error_message (),
				'rs' => $rs,
				'cant' => $resultado->num_rows () 
		);
		return $arr;
	}
	
	/**
	 * Descomprometer pedido
	 * arg[] = array('cant'=>1,'oidp'=>2);
	 *
	 * @param
	 *        	array
	 * @return true
	 */
	function presindir($arg = null) {
		$this->load->model ( 'administracion/minventario', 'MInventario' );
		$this->MInventario->presindir ( $arg );
		$arr [] = array (
				'err' => $this->db->_error_number (),
				'msj' => $this->db->_error_message () 
		);
		return $arr;
	}
	function cambiarEstatusPedido($orden, $estatus) {
		$this->db->query ( "UPDATE pedido SET esta=" . $estatus . " WHERE orde=" . $orden );
		return "Se modifico con exito";
	}
	function __destruct() {
		unset ( $this->db );
	}
}
