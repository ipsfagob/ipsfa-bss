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
	var $estatus;




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

	function mapear(){
		$arr = array(				
				'dfi_color_piel_' => $this->codPiel,
				'dfi_color_cabello_'=> $this->codCabello,
				'dfi_color_ojos_' => $this->codOjos,
				'dfi_estatura' => $this->estatura,
				'dfi_estatus' => $this->estatus
			);

	}
	/**
	* Consultar Elemento
	*
	* @access public
	* @return void
	*/
	function consultar(){
		$sConsulta = 'SELECT * FROM services.tbl_datos_fisionomicos WHERE afi_afiliado_id = \'' . $this->oid . '\';';

		return true;
	}

	/**
	* Actualizar Medicamentos
	*
	* @access public
	* @return bool
	*/
	function actualizar(){
		return true;
	}

}