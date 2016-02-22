<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * IPSFA Bienestar y Seguridad Social 
 * 
 * Reembolso 
 *
 *
 * @package ipsfa-bss\application\model
 * @subpackage saman
 * @author Carlos Peña
 * @copyright Derechos Reservados (c) 2015 - 2016, MamonSoft C.A.
 * @link http://www.mamonsoft.com.ve
 * @since version 1.0
 */
class Reembolso extends CI_Model{
	
	/**
	*	Objeto de Conexión SAMAN
	*/
	var $__DBSaman = NULL;

	var $oid = NULL;
	
	/**
	*	Reembolso, Apoyo, Carta Aval
	*	@var string
	*/
	var $tipo = '';

	/**
	*	Formato: AAAA/MM/DD
	*	@var date
	*/
	var $fechaSolicitud;

	/**
	*	Formato: AAAA/MM/DD
	*	@var date 
	*/
	var $fechaAprobación;

	/**
	*	@var doblue
	*/
	var $montoSolicitado;
	
	/**
	*	@var doblue
	*/
	var $montoAprobado;

	/**
	*	Listado de Dependientes
	*	@var Dependiente
	*/
	var $dependientes = array();

	/**
	*	Listado de Pendientes
	*	@var PendienteReembolsos
	*/
	var $pendientes = array();


	/**
	*	Constructor de la Calse
	*
	*/
	function __construct(){
		parent::__construct();
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
	function mapear($cedula = NULL){

	}

	function salvar(){

	}

	/*
	*	Buscar Reembolsos Por Cedula de Identidad del Afiliado
	*	@param integer
	*	@param boolean
	*	@return boolean
	*/

	function listarCedula($cedula = NULL, $estatus = FALSE){
		
		$sConsulta = "SELECT reembsolicnro AS oid,ci_reembolso_tipo.reembtiponombre AS tipo, 
		ci_reembolso_solic.reembfchsolicitud AS fechaSolicitud,
		ci_reembolso_solic.reembfchaprobacion AS fechaAprobacion, 
		ordenpagomonto AS montoSolicitado,reembconcmontoapr AS montoAprobado FROM personas 
			INNER JOIN ci_reembolso_solic ON (personas.nropersona=ci_reembolso_solic.nropersonaafilmil)
			INNER JOIN ci_reembolso_tipo ON (ci_reembolso_solic.reembtipocod=ci_reembolso_tipo.reembtipocod)
		WHERE codnip='$cedula'";
		
		$rs = $this->__DBSaman->query($sConsulta);
		

		if($rs->num_rows() > 0){
			$this->pendientes = $rs->result();
		}
		

		return $this->pendientes;
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
