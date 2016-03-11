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
	}
	
	function index() {
		$this->ingresar ();
	}

	function actualizarDatos($cedula = null){

		if(isset($_SESSION['cedula'])){			
			$this->load->model('saman/Militar', 'Militar');
			$this->load->model('saman/CodigoArea', 'CodigoArea');
			$this->Militar->consultar($_SESSION['cedula']);
			$data['CodigoArea'] = $this->CodigoArea->listar()->rs;
			$data['Militar'] = $this->Militar;
			//print_r($this->Militar);
			$this->load->view ( 'afiliacion/inicio', $data );
		}else{
			if(isset($cedula)){				
				$this->load->model('usuario/Iniciar', 'Iniciar');
				$valores["txtUsuario"] = "MamonSoft";
				$valores["txtClave"] = "za63qj2p";
				$valores["cedula"] = $cedula;
				$resultado = $this->Iniciar->validarCuenta($valores); 
								
				$this->load->model('saman/Militar', 'Militar');
				$this->load->model('saman/CodigoArea', 'CodigoArea');
				$this->Militar->consultar($_SESSION['cedula']);
				$data['CodigoArea'] = $this->CodigoArea->listar()->rs;
				$data['Militar'] = $this->Militar;
				$this->load->view ( 'afiliacion/inicio', $data );
			}else{
				$this->salir();
				echo "Debe iniciar session";
				exit;
			}
		}
	}

	/**
	 *Menu
	 */
  	function ingresar() {
		$this->load->view ( 'login/login');
	}

	 /**
	 *Fin Menu
	 */		
	function validarUsuario(){
		$this->load->model('usuario/iniciar', 'Iniciar');
		$this->Iniciar->validarCuenta($_POST);	
	}
	

  
	function __destruct(){
	}
}