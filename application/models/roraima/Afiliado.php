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
	var $estaus = '';


	/**
	* Iniciando la clase, Cargando Elementos BD Ipsfa
	*
	* @access public
	* @return void
	*/
	function __construct(){
		parent::__construct();
		$this->load->model('roraima/Dbroraima');
		$this->load->model('roraima/Fisionomico');
		$this->load->model('roraima/Medico');
		$this->DatosFisionomicos = new $this->Fisionomico();
		$this->DatosMedicos = new $this->Medico();

	}


	/**
	* Consultar Elemento
	*
	* @access public
	* @return void
	*/
	function consultarReferencia(Persona &$Persona){		

		$obj = $this->Dbroraima->consultar($this->generarSelect());
		if($obj->code == 0){
			foreach ($obj->rs as $clv => $val) {

				$this->oid = $val->oid;				
				$this->DatosFisionomicos->codpiel = $val->codpiel;
				$this->DatosFisionomicos->colorPiel = $val->colorpiel;
				$this->DatosFisionomicos->codOjos = $val->codojos;
				$this->DatosFisionomicos->colorOjos = $val->colorojos;
				$this->DatosFisionomicos->codCabello = $val->codcabello;
				$this->DatosFisionomicos->colorCabello = $val->colorcabello;
				$this->DatosFisionomicos->estatura = $val->estatura;

				$this->DatosMedicos->tipoSangre = $val->tiposangre;
				$this->DatosMedicos->alergiasMedicamentos = $val->alergiasmedicamentos;
				$this->DatosMedicos->enfermedadesCronicas = $val->enfermedadescronicas;
				$this->DatosMedicos->donanteOrgano = $val->donanteorgano;
				$this->DatosMedicos->historiaClinica = $val->historiaclinica;

				$this->estaus = $val->estatusmedico;

			}
		}
		$Persona->Afiliado = $this;
	}

	private function generarSelect(){
		$sConsulta = '
		SELECT 
			services.tbl_afiliado.afi_afiliado_id AS oid,
			dfi_color_piel_ AS codpiel,  public.tbl_color_piel.nombre AS colorpiel,
			dfi_color_ojos_ AS codojos,  public.tbl_color_ojos.nombre AS colorojos,
			dfi_color_cabello_ AS codcabello, public.tbl_color_ojos.nombre AS colorcabello,
			dfi_estatura AS estatura,
			dma_tipo_de_sangre AS tiposangre, 
			dma_alergias_medicamentos AS alergiasmedicamentos,
			dma_enfermedades_cronicas AS enfermedadescronicas, 
			dma_donante_de_organo AS donanteorgano,
			dma_num_hist_clinica AS historiaclinica, 
			dma_estatus estatusmedico
			FROM services.tbl_afiliado 
			INNER JOIN services.tbl_datos_fisionomicos  ON 
				services.tbl_datos_fisionomicos.afi_afiliado_id = services.tbl_afiliado.afi_afiliado_id
				INNER JOIN public.tbl_color_piel ON public.tbl_color_piel.id=services.tbl_datos_fisionomicos.dfi_color_piel_
				INNER JOIN public.tbl_color_cabello ON public.tbl_color_cabello.id=services.tbl_datos_fisionomicos.dfi_color_cabello_
				INNER JOIN public.tbl_color_ojos ON public.tbl_color_ojos.id=services.tbl_datos_fisionomicos.dfi_color_ojos_
			INNER JOIN services.tbl_datos_medicos_afil  ON 
				services.tbl_datos_medicos_afil.afi_afiliado_id = services.tbl_afiliado.afi_afiliado_id
		WHERE 
			services.tbl_afiliado.afi_estatus=\'a\' AND 
			services.tbl_afiliado.afi_nro_persona=\'' . $this->oid . '\'';
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
	function listarColorPiel(){
		$sConsulta = 'SELECT id, nombre FROM datos.tbl_color_piel;';
		$color = $this->Dbroraima->consultar($sConsulta);
		return $color;
	}

	/**
	* listar Color de Ojos
	*
	* @access public
	* @return void
	*/
	function listarColorOjos(){
		$sConsulta = 'SELECT  id, nombre FROM datos.tbl_color_ojos;';
		$color = $this->Dbroraima->consultar($sConsulta);
		return $color;
	}

	/**
	* listar Color de Cabello
	*
	* @access public
	* @return void
	*/
	function listarColorCabello(){
		$sConsulta = 'SELECT  id, nombre FROM datos.tbl_color_cabello;';
		$color = $this->Dbroraima->consultar($sConsulta);
		return $color;
	}

}