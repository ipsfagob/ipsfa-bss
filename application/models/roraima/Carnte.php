<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Carnet
 * 
 *
 * @package ipsfa-bss\application\model
 * @subpackage saman
 * @author Carlos Peña
 * @copyright Derechos Reservados (c) 2015 - 2016, MamonSoft C.A.
 * @link http://www.mamonsoft.com.ve
 * @since version 1.0
 */
class Carnet extends CI_Model{
	
	/**
	* @var string
	*/
	var $codigo;


	/**
	* @var date
	*/
	var $fecha;


	/**
	* Iniciando la clase, Cargando Elementos BD Ipsfa
	*
	* @access public
	* @return void
	*/
	function __construct(){
		parent::__construct();
		$this->load->model('saman/Dbipsfa');
	}

	/**
	* Obtener Solicitud pendiente por Carnet
	*
	* @access public
	* @return void
	*/	
	public function obtenerSolicitud($oid){
		$sConsulta = 'SELECT * FROM bss.semillero WHERE observacion=\'REN-' . $oid  . '\' AND estatus=0';
		$obj = $this->Dbipsfa->consultar($sConsulta);
		if ($obj->code == 0){
			$rs = $boj->rs;
			foreach ($rs as $cla => $val) {
				
			}
		}

	}


}