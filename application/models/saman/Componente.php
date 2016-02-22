<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * IPSFA Bienestar y Seguridad Social 
 * 
 * Componente 
 *
 *
 * @package ipsfa-bss\application\model
 * @subpackage saman
 * @author Carlos Peña
 * @copyright Derechos Reservados (c) 2015 - 2016, MamonSoft C.A.
 * @link http://www.mamonsoft.com.ve
 * @since version 1.0
 */
class Componente extends CI_Model{

	/**
	* @var string
	*/
	var $codigo = '';

	/**
	* @var string
	*/
	var $nombre = '';

	/**
	* @var string
	*/
	var $siglas = '';

	/**
	* @var string
	*/
	var $rango = '';

	/**
	* @var string
	*/
	var $codigoRango = '';

	/**
	* Iniciando la clase
	*
	* @access public
	* @return void
	*/
	function __construct(){
		parent::__construct();

	}

	/**
	* Cargar todos los componentes
	* @return DbSaman
	*/
	function listar(){

	}

	/**
	* Cargar un componente y un rango
	*
	* @var string
	* @return mixed
	*/
	function cargar($oid){
		$sConsulta = 'SELECT * FROM ipsfa_grado_x_pers 
		INNER JOIN ipsfa_componentes ON ipsfa_grado_x_pers.componentecod=ipsfa_componentes.componentecod
		INNER JOIN ipsfa_grados ON ipsfa_grado_x_pers.componentecod=ipsfa_grados.componentecod 
					AND ipsfa_grado_x_pers.gradocod=ipsfa_grados.gradocod
		WHERE ipsfa_grado_x_pers.nropersona= ' . $oid . ' ORDER BY gradofchresuelto DESC LIMIT 1';
		$obj = $this->Dbsaman->consultar($sConsulta);
		if($obj->code == 0){
			foreach ($obj->rs as $key => $val) {			
				$this->codigo = $val->componentecod; 			
				$this->siglas = $val->componentesiglas; 					
				$this->nombre = $val->componentenombre;
				$this->codigoRango = $val->gradocod;
				$this->rango = $val->gradonombrelargo;
			}
		}	
	}

}