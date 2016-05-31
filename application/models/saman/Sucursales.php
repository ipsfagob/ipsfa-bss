<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Sucursales
 * 
 * Es un concepto político que se refiere a una forma de organización social, 
 * económica, política soberana y coercitiva, conformada por un conjunto de instituciones, 
 * que tienen el poder de regular la vida comunitaria nacional, generalmente solo en un 
 * territorio determinado o territorio nacional; aunque no siempre, como en el caso del 
 * imperialismo. Suele incluirse en la definición de Estado el reconocimiento por parte 
 * de la comunidad internacional como sujeto de derecho internacional.
 *
 * @package ipsfa-bss\application\model
 * @subpackage saman
 * @author Carlos Peña
 * @copyright Derechos Reservados (c) 2015 - 2016, MamonSoft C.A.
 * @link http://www.mamonsoft.com.ve
 * @since version 1.0
 */
class Sucursales extends CI_Model{
	
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


	public function obtener($oid){
		$nombre = '';
		$sConsulta = 'SELECT oid, nomb AS nombre FROM bss.sucursales WHERE oid=' . $oid;
		$obj = $this->Dbsaman->consultar($sConsulta);
		foreach ($obj->rs as $clave => $valor) {
			$nombre = $valor->nombre;
		}
		return $nombre;
	}

	/**
	* Listar todos los codigos de Areas del país
	*
	* @access public
	* @return array
	*/
	public function listar(){
		$sConsulta = 'SELECT oid, nomb AS nombre FROM bss.sucursales';
		$arr = $this->Dbsaman->consultar($sConsulta);
		return $arr;
	}

}