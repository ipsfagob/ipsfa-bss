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
	

	protected $esq = 'roraima';

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
	* @var string
	*/
	var $estatus = 1;

	/**
	* Iniciando la clase, Cargando Elementos BD Ipsfa
	*
	* @access public
	* @return void
	*/
	function __construct(){
		parent::__construct();
	}

	private function mapear(){
		$arr = array(	
			'oid' => $this->oid,			
			'dma_tipo_de_sangre' => $this->tipoSangre,
			'dma_alergias_medicamentos'=> $this->alergiasMedicamentos,
			'dma_enfermedades_cronicas' => $this->enfermedadesCronicas,
			'dma_donante_de_organo' => $this->donanteOrgano,
			'dma_num_hist_clinica' => $this->historiaClinica,
			'dma_estatus' => $this->estatus
		);
		return $arr;
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
	* Salvar Datos Fisionomicos
	*
	* @access public
	* @return bool
	*/
	function salvar(){
		$sConsulta = 'SELECT * FROM ' . $this->esq . '.tbl_datos_medicos_afil WHERE oid=' . $this->oid;
		$obj = $this->_DB->consultar($sConsulta);		
		if($obj->cant > 0){
			$acc = $this->actualizar();
		}else{
			$acc = $this->guardar();
		}
		return $acc;
	
	}

	

	/**
	* Actualizar Datos Fisionomicos
	*
	* @access public
	* @return bool
	*/
	private function actualizar(){
		$donde = array('oid' => $this->oid);
		$this->_DB->actualizarArreglo($this->esq . '.tbl_datos_medicos_afil', $this->mapear(), $donde);
	
	}

	/**
	* Guardar Datos Fisionomicos
	*
	* @access public
	* @return bool
	*/
	private function guardar(){
		$this->_DB->insertarArreglo($this->esq . '.tbl_datos_medicos_afil', $this->mapear());
	
	}



}