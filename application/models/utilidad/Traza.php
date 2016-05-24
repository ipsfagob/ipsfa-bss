<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * MamonSoft 
 *
 * Traza 
 *
 * @package Mamonsoft
 * @subpackage Comun
 * @author Carlos Peña
 * @copyright	Derechos Reservados (c) 2014 - 2015, MamonSoft C.A.
 * @link		http://www.mamonsoft.com.ve
 * @since Version 1.0
 */
class Traza extends CI_Model{


	/**
	* Clave principal autoincrementable
	*
	* @return integer
	*/
	var $oid = NULL;


	/**
	* Codigo generados automaticamente
	*
	* @return string
	*/
	var $codigo = '';

	/**
	* Tipo de Codigo en los casos (R: Reembolso |A: Apoyo |C: Carta Aval)
	*
	* @return string
	*/
	var $tipo = 0 ;



	function __construct(){
		parent::__construct();
		$this->load->model('comun/Dbipsfa');
	}


	function crear($arr){

	}

	function listar(){

	}



	function __destruct(){

	}
}