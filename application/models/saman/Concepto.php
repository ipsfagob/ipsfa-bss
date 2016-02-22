<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * IPSFA Bienestar y Seguridad Social 
 * 
 * Concepto 
 *
 *
 * @package ipsfa-bss\application\model
 * @subpackage saman
 * @author Carlos Peña
 * @copyright Derechos Reservados (c) 2015 - 2016, MamonSoft C.A.
 * @link http://www.mamonsoft.com.ve
 * @since version 1.0
 */
class Concepto extends CI_Model{

	var $codigo = '';

	var $nombre = '';

	function __construct(){
		parent::__construct();
		$this->load->model('saman/Dbsaman', 'Dbsaman');
		

	}


	/**
	* Codigo : nropersona | personas	
	* @var string
	* @param Dependiente
	*/
	function consultar($codigo){
		$sConsulta = 'SELECT * FROM ci_reembolso_concep WHERE reembconccod=\'' . $codigo . '\'';		
		$obj = $this->Dbsaman->consultar($sConsulta);
		if($obj->code == 0){
			foreach ($obj->rs as $key => $val) {					
				$this->codigo = strtoupper($codigo);
				$this->nombre = strtoupper($val->reembconcnombre);
			}
		}	
	}


	function listar(){
		$sConsulta = 'SELECT reembconccod AS codigo, reembconcnombre AS nombre FROM ci_reembolso_concep 
					  WHERE reembconcnombre != \'REEMBOLSO\' AND reembconcnombre != \'Concepto 1\'';		
		$arr = $this->Dbsaman->consultar($sConsulta);		
		return $arr;

	}

	function __destruct(){
		unset($this->MPersona);
	}
}