<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Parroquia
 *
 * Del griego παροικία, paroikía, ‘cerca de la vivienda’ es la 
 * denominación de algunas entidades subnacionales en diferentes países.
 *
 * @package ipsfa-bss\application\model
 * @subpackage saman
 * @author Carlos Peña
 * @copyright Derechos Reservados (c) 2015 - 2016, MamonSoft C.A.
 * @link http://www.mamonsoft.com.ve
 * @since version 1.0
 */
class Parroquia extends CI_Model{
	
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
	* Listar todas las parroquias asociadas al municipio
	* @param string
	* @access public
	* @return array
	*/
	public function listar($codigoEstado = '', $codigoMunicipio = ''){
		$sConsulta = 'SELECT id AS codigo, nb_parroquia AS nombre FROM datos.parroquia WHERE estado_id = \'' . $codigoEstado . '\' AND municipio_id=\'' . $codigoMunicipio . '\'';
		$arr = $this->Dbsaman->consultar($sConsulta);
		return $arr;
	}

}