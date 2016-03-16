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
			$this->Militar->consultar($_SESSION['cedula']);
			$data['CodigoArea'] = $this->CodigoArea->listar()->rs;
			$data['Militar'] = $this->Militar;
			$this->load->view ( 'afiliacion/inicio', $data );
		}else{			
			$this->salir();
			echo "Debe iniciar session";
		}
	}

	/**
	 *Menu
	 */
  	function ingresar() {
		$this->load->view ( 'login/login');
	}



  
	function __destruct(){
	}
}