<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * MamonSoft 
 *
 * Semillero
 * La semilla, simiente o pepita es cada uno de los cuerpos que forman 
 * parte del fruto que da origen a una nueva planta; es la estructura mediante 
 * la cual realizan la propagación las plantas que por ello se llaman 
 * espermatofitas (plantas con semilla). 
 *
 * @package Mamonsoft
 * @subpackage Comun
 * @author Carlos Peña
 * @copyright	Derechos Reservados (c) 2014 - 2015, MamonSoft C.A.
 * @link		http://www.mamonsoft.com.ve
 * @since Version 1.0
 */
class Solicitud extends CI_Model{


	function __construct() {
    	if (!isset($this -> db)) $this -> load -> database();
  	}
	
	function crear($cedula, $codigo, $descripcion, $tipo){
		$sConsulta = "INSERT INTO solicitud (codigo,cedula,certi,tipo) 
		VALUES ('$codigo', '$cedula', '$descripcion', $tipo)";

		$this->db->query($sConsulta);
	}

	function listar(){

	}

	function exportarSAMAN(){

	}

	function importarSAMAN(){
		
	}

	function imprimirHoja($cedula){
		
		return true;
	}
}