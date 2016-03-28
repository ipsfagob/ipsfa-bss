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
		fchiniciotrat, fchinformemedico, fchvencinformemed AS vencimiento FROM ci_casos 
		INNER JOIN ci_diagnosticos ON ci_casos.diagnosticocod=ci_diagnosticos.diagnosticocod
		INNER JOIN personas ON ci_casos.nropersona=personas.nropersona
		WHERE codnip=\'' . $codigo . '\'';;
		$obj = $this->Dbsaman->Consultar($sConsulta);
		return $obj;
	}

}