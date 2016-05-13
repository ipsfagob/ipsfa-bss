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
class Banco extends CI_Model{
	
	/**
	* @var string
	*/
	var $nombre =  '';

	/**
	* @var string
	*/
	var $cuenta = '';

	/**
	* @var string
	*/
	var $tipoCuenta = '';

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
		
	}

		/**
	* Evalua el tipo de Cuenta
	* 
	* @access public
	* @return string
	*/
	public function obtenerTipoCuenta(){
		if($this->tipoCuenta == 'CC'){
			return 'CUENTA CORRIENTE';
		}else{
			return 'CUENTA DE AHORRO';
		}
	}

}