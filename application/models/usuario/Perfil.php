<?php

/**
 * Seguridad MamonSoft C.A
 * 
 *
 * @package mamonsoft.modules.seguridad
 * @subpackage perfil
 * @author Carlos Peña
 * @copyright	Derechos Reservados (c) 2014 - 2015, MamonSoft C.A.
 * @link		http://www.mamonsoft.com.ve
 * @since Version 1.0
 *
 */

class Perfil {
	
	var $identificador;
	
	var $nombre;
	
	var $descripcion;
	
	
	
	function __construct($identificador = null) {
		parent::__construct();
		$this->load->database();			
		$consulta = 'SELECT * FROM perfil WHERE oid =\'' . $identificador .  '\'';

		
	}
		
	
	function listaPrivilegios() {
		
	}
	
	
	function __destruct(){
		unset($this->db);
	}
	
}
