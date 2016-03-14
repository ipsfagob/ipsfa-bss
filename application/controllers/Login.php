<?php
/**
 * IpsfaNet
 * 
 *
 * @package Login
 * @author Carlos Peña
 * @copyright	Derechos Reservados (c) 2014 - 2015, MamonSoft C.A.
 * @link		http://www.mamonsoft.com.ve
 * @since Version 1.0
 *
 */
class Login extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');


	}
	
	function index($msj = null) {
		$this->ingresar ();
	}

	/**
	 *Menu
	 */
  	function ingresar() {
		$this->load->view ( 'login/login');
	}
	protected function inicio(){
		$this->load->view ('panel/inicio');
	}
	/* 
	| ------------------------------------------------------------
	|	Control de Acciones
	| ------------------------------------------------------------
	*/

	/**
	 * Validar y sincronizar el usuario de conexión
	 *
	 * @access  public
	 * @return mixed
	 */	
	public function validarUsuario(){
		if(isset($_SESSION['cedula'])){
			$this->inicio();				
		}else{
			if(isset($_POST['usuario']) && $_POST['usuario'] !== ""){
				$this->load->model('usuario/Iniciar', 'Iniciar');
				$valores["txtUsuario"] = "MamonSoft";
				$valores["txtClave"] = "za63qj2p";
				$valores["cedula"] = $_POST['usuario'];
				$resultado = $this->Iniciar->validarCuenta($valores); 
				if ( $resultado == 1){
					$this->load->model('saman/Militar', 'Militar');
					$this->Militar->consultar($_SESSION['cedula']);				
					$_SESSION['nombreRango'] = $this->Militar->Componente->codigoRango . ". " . 
						$this->Militar->Persona->primerNombre . " " . $this->Militar->Persona->primerApellido;
					
					$this->inicio();
				}else{
					echo "Error en el usuario con la base de datos";
				}
			}else{
				$this->salir();
			}
		}
	}

	/**
	*
	*
	*/
	function identificacion(){
		$this->load->view('login/afiliacion/frmIdentificacion');
	}
	
	/**
	*
	*
	*/
	function confirmar(){
		$this->load->view('login/afiliacion/frmConfirmar');
	}

	
	/**
	*
	*
	*/	
	function crear(){
		$this->load->view('login/afiliacion/frmCrear');
	}

	public function registrarUsuario(){
		$this -> load -> model("usuario/usuario","usuario");
		$usuario = new $this -> usuario;
		$usuario -> cedula = $_POST['cedu'];
		$usuario -> tipo = $_POST['tipo'];
		$usuario -> nombre = $_POST['nomb'];
		$usuario -> apellido = $_POST['apel'];
		$usuario -> direccion = $_POST['dire'];
		$usuario -> sobreNombre = $_POST['seud'];
		$usuario -> correo = $_POST['corr'];	
		$usuario -> celular = $_POST['celu'];
		$usuario -> telefono = $_POST['telf'];
		$usuario -> empresa = $_POST['empr'];
		$usuario -> pagina = $_POST['pagi'];
		$usuario -> clave = $_POST['clav'];
		
		$usuario -> registrar();
		echo "Se registro con exito..";
	}
  	
  	function salir(){
  		session_destroy();
  		$this->index();
  	}

	function __destruct(){
	}
}