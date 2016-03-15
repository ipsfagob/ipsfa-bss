<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * IPSFA Bienestar y Seguridad Social 
 * 
 * Codigo de Area 
 *
 *
 * @package ipsfa-bss\application\model
 * @subpackage saman
 * @author Carlos Peña
 * @copyright Derechos Reservados (c) 2015 - 2016, MamonSoft C.A.
 * @link http://www.mamonsoft.com.ve
 * @since version 1.0
 */
class CodigoArea extends CI_Model{
	
	/**
	* @var string
	*/
	var $codigo;


	/**
	* Iniciando la clase, Cargando Elementos BD Ipsfa
	*
	* @access public
	* @return void
	*/
	function __construct(){
		parent::__construct();
		$this->load->model('saman/Dbsaman');
	}


	/**
	* Listar todos los codigos de Areas del país
	*
	* @access public
	* @return array
	*/
	public function listar(){
		$sConsulta = 'SELECT codarea FROM codarea';
		$lst = array();
		$arr = $this->Dbsaman->consultar($sConsulta);
		return $arr;
	}

}