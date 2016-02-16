<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * IPSFA Bienestar y Seguridad Social 
 * 
 * Persona 
 *
 *
 * @package ipsfa-bss\application\model
 * @subpackage saman
 * @author Carlos Peña
 * @copyright Derechos Reservados (c) 2015 - 2016, MamonSoft C.A.
 * @link http://www.mamonsoft.com.ve
 * @since version 1.0
 */
class Telefono extends CI_Model{

	/**
	* @var string
	*/
	var $tipo = '';

	/**
	* @var string
	*/
	var $codigoPais = '';
	
	/**
	* @var string
	*/
	var $codigoArea = '';

	/**
	* @var string
	*/
	var $numero = '';

	
	function __construct(){
		parent::__construct();
		
	}


}
