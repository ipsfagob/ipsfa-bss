<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Medico
 * 
 * 
 * @package ipsfa-bss\application\model
 * @subpackage saman
 * @author Carlos Peña
 * @copyright Derechos Reservados (c) 2015 - 2016, MamonSoft C.A.
 * @link http://www.mamonsoft.com.ve
 * @since version 1.0

  dma_datos_medicos_afil_id integer NOT NULL DEFAULT nextval('services.dma_datos_medicos_afil_id_seq'::regclass),
  afi_afiliado_id integer NOT NULL,
  dma_tipo_de_sangre character(20),
  dma_alergias_medicamentos character varying(100),
  dma_enfermedades_cronicas text,
  dma_donante_de_organo character varying(5),
  dma_num_hist_clinica character varying(20),
  dma_estatus character varying(7),
 */
class Medico extends CI_Model{
	


	/**
	* @var integer
	*/
	var $oid;

	/**
	* @var string
	*/
	var $tipoSangre;

	/**
	* @var string
	*/
	var $alergiasMedicamentos;

	/**
	* @var string
	*/
	var $enfermedadesCronicas;

	/**
	* @var string
	*/
	var $donanteOrgano;

	/**
	* @var string
	*/
	var $historiaClinica;

	/**
	* Iniciando la clase, Cargando Elementos BD Ipsfa
	*
	* @access public
	* @return void
	*/
	function __construct(){
		parent::__construct();
		$this->load->model('saman/Dbroraima');
	}

	/**
	* Consultar Elemento
	*
	* @access public
	* @return void
	*/
	function consultar($id){

	}

	/**
	* Actualizar Medicamentos
	*
	* @access public
	* @return void
	*/
	function actualizar(Medico $Medico){

	}



}