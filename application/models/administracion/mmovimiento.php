<?php
if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * Control de Almacen
 * 
 * Movimiento de Mercancia
 *
 * @package almacen
 * @subpackage fisico
 * @author Carlos Peña
 * @copyright Derechos Reservados (c) 2015 - 2016, MamonSoft C.A.
 * @link    http://www.mamonsoft.com.ve
 * @since Version 1.0
 *
 */
class MMovimiento extends CI_Model {
	
	function __contruct(){
		parent::__construct ();
		if (! isset ( $this->db )) {
			$this->load->database ();
		}
	}
		
	// Modulo para el manejo de los lotes
	function salvarLote($arr = null){
		$sC = 'SELECT * FROM detalle_lote WHERE oid = \'' .  $arr['oid'] . '\'';		
		$rs = $this -> db -> query($sC);
		if ($this -> db -> _error_number() == 0) {
			if($rs -> num_rows() > 0){
				$this->actualizarLote($arr);
			}else{
				$this->agregarLote($arr);
			}				
		}
		$arr[] = array('err' => $this -> db -> _error_number(), 'msj' => $this -> db -> _error_message());
		return $arr;
	}
	
	function agregarLote($arr){
		$this -> db -> insert('detalle_lote', $arr);
	}
	
	function actualizarLote($arr){
		$sC = 'UPDATE detalle_lote SET cant=cant+' . $arr['cant'] . ' WHERE oid = \'' .  $arr['oid'] . '\'';
		$this->db->query ( $sC );
	}
}


?>