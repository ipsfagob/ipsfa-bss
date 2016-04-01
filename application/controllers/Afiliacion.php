<?php
/**
 * IpsfaNet
 * 
 *
 * @package login
 * @author Carlos Peña
 * @copyright	Derechos Reservados (c) 2014 - 2015, MamonSoft C.A.
 * @link		http://www.mamonsoft.com.ve
 * @since Version 1.0
 *
 */
define ('__CONTROLADOR', 'Afiliacion');
class Afiliacion extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');	
	}
	
	function index() {
		$this->actualizarDatos ();
	}


	function actualizarDatos(){
		if(isset($_SESSION['cedula'])){
			$this->load->model('saman/Militar', 'Militar');
			$this->load->model('saman/CodigoArea', 'CodigoArea');
			$this->load->model('saman/Estado', 'Estado');
			$this->Militar->consultar($_SESSION['cedula']);
			$data['CodigoArea'] = $this->CodigoArea->listar()->rs;
			$data['Militar'] = $this->Militar;
			$data['Estado'] = $this->Estado->listar()->rs;
			$this->load->view ( 'afiliacion/inicio', $data );
		}else{			
			$this->salir("Debe iniciar session");
		}
	}

	function datosBancarios(){
		if(isset($_SESSION['cedula'])){
			$this->load->model('saman/Militar', 'Militar');
			$this->Militar->consultar($_SESSION['cedula']);
			$data['Militar'] = $this->Militar;
			$this->load->view ( 'afiliacion/datos_bancario', $data );
		}else{			
			$this->salir("Debe iniciar session");
		}
	}

	
	public function listarMunicipio(){
		if(isset($_SESSION['cedula'])){
			$this->load->model('saman/Municipio', 'Municipio');
			echo json_encode($this->Municipio->listar($_GET['codigo'])->rs);
			

		}else{			
			$this->salir("Debe iniciar session");			
		}
	}

		public function listarParroquia(){
		if(isset($_SESSION['cedula'])){
			$this->load->model('saman/Parroquia', 'Parroquia');
			echo json_encode($this->Parroquia->listar($_GET['codigoEstado'], $_GET['codigoMunicipio'])->rs);
		}else{			
			$this->salir("Debe iniciar session");			
		}
	}

	/**
	 *Menu
	 */
  	function ingresar() {
		$this->load->view ( 'login/login');
	}


	/**
	 * Salir del sistema
	 *
	 * @access public
	 * @return mixed
	 */
  	public function salir($msj = '') {
  		session_destroy();
  		$data['msj'] = $msj;
		$this->load->view ( 'login/login');
	}
  
	function __destruct(){
	}
}