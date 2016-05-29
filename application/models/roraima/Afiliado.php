<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Afiliado
 * 
 *
 * @package ipsfa-bss\application\model
 * @subpackage saman
 * @author Carlos Peña
 * @copyright Derechos Reservados (c) 2015 - 2016, MamonSoft C.A.
 * @link http://www.mamonsoft.com.ve
 * @since version 1.0
  afi_afiliado_id integer NOT NULL DEFAULT nextval('services.afi_afiliado_id_seq'::regclass),
  afi_parentesco_fam_mil_ integer NOT NULL,
  afi_nro_persona integer NOT NULL,
  afi_tipo_documento character(1),
  afi_numero_documento character varying(10) NOT NULL,
  afi_nombres character varying(70) NOT NULL,
  afi_apellido_paterno character varying(20),
  afi_apellido_materno character varying(20) NOT NULL,
  afi_estado_civil_ character varying(2) NOT NULL,
  afi_sexo_ character varying(2) NOT NULL,
  afi_fecha_nacimiento character varying(10) NOT NULL,
  afi_pais_nacimiento_ character varying(50),
  afi_estatus character varying(7),
 */
class Afiliado extends CI_Model{

	var $_DB = null;
	
	/**
	* @var integer
	*/
	var $oid;

	/**
	* @var object
	*/
	var $DatosFisionomicos ;
	
	/**
	* @var object
	*/
	var $DatosMedicos ;

	/**
	* @var string
	*/	
	var $estaus = '1';

	var $esqema = '';

	/**
	* Iniciando la clase, Cargando Elementos BD Ipsfa
	*
	* @access public
	* @return void
	*/
	function __construct(){
		parent::__construct();		
		$this->load->model('roraima/Fisionomico');
		$this->load->model('roraima/Medico');

	}

	function loadDB($db = ''){
		if($db != '') {
			$this->load->model('roraima/Dbroraima');
			$this->_DB = $this->Dbroraima;
			$this->esqema = 'public';	

			$sConsulta = $this->generarSelectRoraima();
			//$object = $this->_DB->consultar('select * from services.tbl_afiliado limit 1');
			//print_r($object);
			
		}else{
			$this->load->model('comun/Dbipsfa');	
			$this->_DB = $this->Dbipsfa;
			$this->esqema = 'datos';				
			$sConsulta = $this->generarSelect();
		}
		return $sConsulta;

	}

	/**
	* Consultar Elemento
	*
	* @access public
	* @return void
	*/
	function consultarReferencia(Persona &$Persona, $db = ''){	
		$this->oid = $Persona->oid;

		$Afiliado = new Afiliado();
		$Afiliado->DatosFisionomicos = new $this->Fisionomico($this->esqema, $this->_DB);
		$Afiliado->DatosMedicos = new $this->Medico($this->esqema, $this->_DB);
		$sConsulta = $this->loadDB($db);
		$obj = $this->_DB->consultar($sConsulta);
		
		if($obj->code == 0){
			foreach ($obj->rs as $clv => $val) {						
				
				$Afiliado->DatosFisionomicos->codPiel = $val->codpiel;
				$Afiliado->DatosFisionomicos->colorPiel = strtoupper($val->colorpiel);
				$Afiliado->DatosFisionomicos->codOjos = $val->codojos;
				$Afiliado->DatosFisionomicos->colorOjos = strtoupper($val->colorojos);
				$Afiliado->DatosFisionomicos->codCabello = $val->codcabello;
				$Afiliado->DatosFisionomicos->colorCabello = strtoupper($val->colorcabello);
				$Afiliado->DatosFisionomicos->estatura = $val->estatura;

				$Afiliado->DatosMedicos->tipoSangre = trim($val->tiposangre);
				$Afiliado->DatosMedicos->alergiasMedicamentos =  strtoupper($val->alergiasmedicamentos);
				$Afiliado->DatosMedicos->enfermedadesCronicas =  strtoupper($val->enfermedadescronicas);
				$Afiliado->DatosMedicos->donanteOrgano = $val->donanteorgano;
				$Afiliado->DatosMedicos->historiaClinica = $val->historiaclinica;

				$Afiliado->estaus = $val->estatusmedico;

			}
		}		
		$Persona->Afiliado = $Afiliado;
		
	}

	private function generarSelect(){
		$sConsulta = 'SELECT 
			roraima.tbl_datos_fisionomicos.oid AS oid,
			dfi_color_piel_ AS codpiel,  datos.tbl_color_piel.nombre AS colorpiel,
			dfi_color_ojos_ AS codojos,  datos.tbl_color_ojos.nombre AS colorojos,
			dfi_color_cabello_ AS codcabello, datos.tbl_color_cabello.nombre AS colorcabello,
			dfi_estatura AS estatura,
			dma_tipo_de_sangre AS tiposangre, 
			dma_alergias_medicamentos AS alergiasmedicamentos,
			dma_enfermedades_cronicas AS enfermedadescronicas, 
			dma_donante_de_organo AS donanteorgano,
			dma_num_hist_clinica AS historiaclinica, 
			dma_estatus estatusmedico
			FROM roraima.tbl_datos_fisionomicos 
				INNER JOIN datos.tbl_color_piel ON datos.tbl_color_piel.id=roraima.tbl_datos_fisionomicos.dfi_color_piel_
				INNER JOIN datos.tbl_color_cabello ON datos.tbl_color_cabello.id=roraima.tbl_datos_fisionomicos.dfi_color_cabello_
				INNER JOIN datos.tbl_color_ojos ON datos.tbl_color_ojos.id=roraima.tbl_datos_fisionomicos.dfi_color_ojos_
			INNER JOIN roraima.tbl_datos_medicos_afil  ON 
				roraima.tbl_datos_medicos_afil.oid = roraima.tbl_datos_fisionomicos.oid
		WHERE 
			roraima.tbl_datos_fisionomicos.oid=' . $this->oid ;
			
		return $sConsulta;
	}

	private function generarSelectRoraima(){
		$sConsulta = 'SELECT 
			services.tbl_datos_fisionomicos.afi_afiliado_id AS oid,
			dfi_color_piel_ AS codpiel,  public.tbl_color_piel.nombre AS colorpiel,
			dfi_color_ojos_ AS codojos,  public.tbl_color_ojos.nombre AS colorojos,
			dfi_color_cabello_ AS codcabello, public.tbl_color_cabello.nombre AS colorcabello,
			dfi_estatura AS estatura,
			dma_tipo_de_sangre AS tiposangre, 
			dma_alergias_medicamentos AS alergiasmedicamentos,
			dma_enfermedades_cronicas AS enfermedadescronicas, 
			dma_donante_de_organo AS donanteorgano,
			dma_num_hist_clinica AS historiaclinica, 
			dma_estatus estatusmedico
			FROM services.tbl_afiliado
				INNER JOIN services.tbl_datos_fisionomicos ON 
					services.tbl_datos_fisionomicos.afi_afiliado_id=services.tbl_afiliado.afi_afiliado_id
				INNER JOIN services.tbl_datos_medicos_afil  ON 
					services.tbl_datos_medicos_afil.afi_afiliado_id = services.tbl_datos_fisionomicos.afi_afiliado_id
					INNER JOIN public.tbl_color_piel ON public.tbl_color_piel.id=services.tbl_datos_fisionomicos.dfi_color_piel_
					INNER JOIN public.tbl_color_cabello ON public.tbl_color_cabello.id=services.tbl_datos_fisionomicos.dfi_color_cabello_
					INNER JOIN public.tbl_color_ojos ON public.tbl_color_ojos.id=services.tbl_datos_fisionomicos.dfi_color_ojos_				
			WHERE 
				services.tbl_afiliado.afi_estatus = \'a\' AND
				services.tbl_afiliado.afi_nro_persona='  . $this->oid ;
		

		return $sConsulta;

	}

	/**
	* Actualizar Medicamentos
	*
	* @access public
	* @return void
	*/
	function salvar(){
		$this->DatosFisionomicos->oid = $this->oid;
		$this->DatosFisionomicos->salvar();
		$this->DatosMedicos->oid = $this->oid;
		$this->DatosMedicos->salvar();
	}

	/**
	* listar Color de Piel
	*
	* @access public
	* @return void
	*/
	function listarColorPiel($db =''){
		if(!isset($this->_DB)) $this->loadDB();
		$sConsulta = 'SELECT id, nombre FROM ' . $this->esqema . '.tbl_color_piel;';
		$color = $this->_DB->consultar($sConsulta);
		return $color;
	}

	/**
	* listar Color de Ojos
	*
	* @access public
	* @return void
	*/
	function listarColorOjos($db =''){
		if(!isset($this->_DB)) $this->loadDB();
		$sConsulta = 'SELECT  id, nombre FROM ' . $this->esqema . '.tbl_color_ojos;';
		$color = $this->_DB->consultar($sConsulta);
		return $color;
	}

	/**
	* listar Color de Cabello
	*
	* @access public
	* @return void
	*/
	function listarColorCabello($db =''){
		if(!isset($this->_DB)) $this->loadDB();
		$sConsulta = 'SELECT  id, nombre FROM ' . $this->esqema . '.tbl_color_cabello;';
		$color = $this->_DB->consultar($sConsulta);
		return $color;
	}

}