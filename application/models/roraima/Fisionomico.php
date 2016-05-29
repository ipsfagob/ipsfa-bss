<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Fisionomico
 * 
 *
 * @package ipsfa-bss\application\model
 * @subpackage saman
 * @author Carlos Peña
 * @copyright Derechos Reservados (c) 2015 - 2016, MamonSoft C.A.
 * @link http://www.mamonsoft.com.ve
 * @since version 1.0

  dfi_datos_fisionomicos_id integer NOT NULL DEFAULT nextval('services.dfi_datos_fisionomicos_id_seq'::regclass),
  afi_afiliado_id integer NOT NULL,
  dfi_color_piel_ integer NOT NULL,
  dfi_color_cabello_ integer NOT NULL,
  dfi_color_ojos_ integer NOT NULL,
  dfi_estatura double precision NOT NULL,
  dfi_estatus character varying(7) NOT NULL,

 */
class Fisionomico extends CI_Model{
	
	
	protected $esq = '';

	protected $_DB = null;
	/**
	* @var integer
	*/
	var $oid;

	/**
	* @var integer
	*/
	var $codPiel;

	/**
	* @var string
	*/
	var $colorPiel;


	/**
	* @var integer
	*/
	var $codCabello;

	/**
	* @var string
	*/
	var $colorCabello;

	/**
	* @var integer
	*/
	var $codOjos;

	/**
	* @var string
	*/
	var $colorOjos;

	/**
	* @var decimal
	*/
	var $estatura;

	/**
	* @var integer
	*/
	var $estatus = 1;




	/**
	* Iniciando la clase, Cargando Elementos BD Ipsfa
	*
	* @access public
	* @return void
	*/
	function __construct($esq = '', $db = ''){
		parent::__construct();
		$this->_DB = $db;
		$this->esq = $esq;
		
	}

	private function mapear(){
		$arr = array(	
				'oid' => $this->oid,
				'dfi_color_piel_' => $this->codPiel,
				'dfi_color_cabello_'=> $this->codCabello,
				'dfi_color_ojos_' => $this->codOjos,
				'dfi_estatura' => $this->estatura,
				'dfi_estatus' => $this->estatus
			);
		return $arr;
	}
	/**
	* Consultar Elemento
	*
	* @access public
	* @return void
	*/
	function consultar(){
		$sConsulta = 'SELECT * FROM ' . $this->esq . '.tbl_datos_fisionomicos WHERE afi_afiliado_id = \'' . $this->oid . '\';';

		return true;
	}



	/**
	* Salvar Datos Fisionomicos
	*
	* @access public
	* @return bool
	*/
	function salvar(){
		$sConsulta = 'SELECT * FROM ' . $this->esq . '.tbl_datos_fisionomicos WHERE oid=' . $this->oid;
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
		$this->_DB->actualizarArreglo($this->esq . '.tbl_datos_fisionomicos', $this->mapear(), $donde);
	
	}

	/**
	* Guardar Datos Fisionomicos
	*
	* @access public
	* @return bool
	*/
	private function guardar(){
		$this->_DB->insertarArreglo($this->esq . '.tbl_datos_fisionomicos', $this->mapear());
	
	}


}