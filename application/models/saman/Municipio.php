<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Municipio
 * 
 * Es una entidad administrativa que puede agrupar una sola 
 * localidad o varias y que puede hacer referencia a una ciudad, un pueblo o 
 * una aldea.
 *
 * @package ipsfa-bss\application\model
 * @subpackage saman
 * @author Carlos Peña
 * @copyright Derechos Reservados (c) 2015 - 2016, MamonSoft C.A.
 * @link http://www.mamonsoft.com.ve
 * @since version 1.0
 */
class Municipio extends CI_Model{
	
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
	* Listar los municipios por codigo
	*
	* @param string
	* @access public
	* @return array
	*/
	public function listar($codigoEstado = '') {
		$sConsulta = 'SELECT id AS codigo, nb_municipio AS nombre FROM datos.municipio WHERE estado_id=\'' . $codigoEstado . '\'';
		$arr = $this->Dbsaman->consultar($sConsulta);
		return $arr;
	}

}