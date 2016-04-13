<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * IPSFA Bienestar y Seguridad Social 
 * 
 * Tratamientos 
 *
 *
 * @package ipsfa-bss\application\model
 * @subpackage saman
 * @author Carlos Peña
 * @copyright Derechos Reservados (c) 2015 - 2016, MamonSoft C.A.
 * @link http://www.mamonsoft.com.ve
 * @since version 1.0
 */
class Tratamiento extends CI_Model{
	
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
	var $diagnostico = '';

	/**
	* Iniciando la clase, Cargando Elementos BD Dbsaman
	*
	* @access public
	* @return void
	*/
	function __construct(){
		parent::__construct();
		$this->load->model('saman/Dbsaman');
	}

	function listar(){
	}

	/**
	* Consultar Caso en medicamentos prolongados
	*
	* @access public
	* @param string
	* @return Dbsaman
	*/
	public function consultarProlongado($codigo = ''){
		$sConsulta = 'SELECT diagnosticonombre AS nombre, casofchinicio As inico, casodiagnosttexto, 
		fchiniciotrat, fchinformemedico, fchvencinformemed AS vencimiento, casonro FROM ci_casos 
		INNER JOIN ci_diagnosticos ON ci_casos.diagnosticocod=ci_diagnosticos.diagnosticocod
		INNER JOIN personas ON ci_casos.nropersona=personas.nropersona
		WHERE codnip=\'' . $codigo . '\'';
		$obj = $this->Dbsaman->Consultar($sConsulta);
		return $obj;
	}

	/**
	* Listar los medicamentos seleccionados
	*
	* @access public
	* @param string
	* @return Dbsaman
	*/
	public function listarKitDetalle($codigo, $caso = "0000001"){
		$sConsulta = 'SELECT ci_sum_med_present.suministronombre AS nombre,ci_suministros_med.suministronombre,
		suministronmbrcomercial AS comercial,cantidad,presenttipocod,unidades, unidadtipocod,
		 * FROM ci_kit_detalle 
		INNER JOIN ci_sum_med_present ON ci_kit_detalle.suministrocodpres=ci_sum_med_present.suministrocod 
		INNER JOIN ci_suministros_med ON ci_kit_detalle.suministrocodpres=ci_suministros_med.suministrocod
		INNER JOIN personas ON ci_kit_detalle.nropersona=personas.nropersona
		WHERE codnip=\'' . $codigo . '\' AND casonro =\'' . $caso . '\'';
		$obj = $this->Dbsaman->Consultar($sConsulta);		
		return $obj;
	}

}