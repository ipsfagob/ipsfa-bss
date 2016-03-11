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
class Login extends CI_Controller {
	function __construct(){
		parent::__construct();		
	}
	
	function index() {
		$this->ingresar ();
	}

	/**
	 *Menu
	 */
  	function ingresar() {
		$this->load->view ( 'login/login');
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
	protected function validarUsuario($cedula){
		$this->load->model('usuario/Iniciar', 'Iniciar');
		$valores["txtUsuario"] = "MamonSoft";
		$valores["txtClave"] = "za63qj2p";
		$valores["cedula"] = $cedula;
		$resultado = $this->Iniciar->validarCuenta($valores); 
		if ( $resultado == 1){
			$this->load->model('saman/Militar', 'Militar');
			$this->Militar->consultar($_SESSION['cedula']);			
			$datos['Militar'] = $this->Militar;
			$_SESSION['nombreRango'] = $this->Militar->Componente->codigoRango . ". " . 
				$this->Militar->Persona->primerNombre . " " . $this->Militar->Persona->primerApellido;
			$this->load->view ( 'bienestarsocial/principal');
		}else{
			echo "Error en el usuario con la base de datos";
		}		
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
  
	function __destruct(){
	}
}