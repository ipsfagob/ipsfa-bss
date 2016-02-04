<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Reembolsos SAMAN
 *
 * @package mamonsoft
 * @subpackage comun
 * @author Carlos Peña
 * @copyright	Derechos Reservados (c) 2014 - 2015, MamonSoft C.A.
 * @link		http://www.mamonsoft.com.ve
 * @since Version 1.0
 *
 */
class Reembolso extends CI_Model{
	
	/**
	*	Objeto de Conexión SAMAN
	*/
	var $__DBSaman = NULL;

	var $oid = NULL;
	


	/**
	*	Listado de Dependientes
	*	@var Dependiente
	*/
	var $dependientes = array();

	/**
	*	Constructor de la Calse
	*
	*/
	function __construct(){
		parent::__construct();
		echo "conexion";

		$this->__DBSaman = $this->load->database('saman', true);

	}

	/**
	*	Establecer Conexión a la Base de datos SAMAN
	*/
	function __iniciarSaman(){
		if($this->__DBSaman != NULL){

		}
	}

	/**
	* Permite Mapear un objeto (personas) de la BD SAMAN
	*	@param string
	* @return Persona
	*/
	function MapearSaman($cedula = NULL){

	}

	function salvar(){

	}

	/*
	*	
	*	@param integer
	*	@return Reembolso
	*/

	function buscar($nropersfilfam ){
		$sConsulta = "SELECT * FROM persona WHERE codnip='$cedula' LIMIT 1";
		$rs = $this->cedula = "";
		$this->oid = "";
	}

	/*
	*
	*
	*
	*/
	function listar($nro){
		$sConsulta = "SELECT ci_reembolso_det.reembsolicnro,ci_reembolso_concep.reembconccod,reembconcnombre,reembclasecod,reembconcmonto,reembconcporc,
		ci_reembolso_concep.auditfechacambio,ci_reembolso_concep.auditfechacreacion
		FROM ci_reembolso_det 
		inner join ci_reembolso_concep on ci_reembolso_det.reembconccod=ci_reembolso_concep.reembconccod
		inner join ci_reembolso_solic 
		on ci_reembolso_det.nropersafilfam=ci_reembolso_solic.nropersonaafilmil
		where ci_reembolso_det.reembsolicnro='$nro';";
		//echo $sConsulta;
		$rs = $this->__DBSaman->query($sConsulta);
		return $rs->result();
	}

}
