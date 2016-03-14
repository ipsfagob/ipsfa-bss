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
			//print_r($_POST);
			if(isset($_POST['usuario']) && $_POST['usuario'] != ""){
				$this->load->model('usuario/Iniciar', 'Iniciar');
				$valores["usuario"] = $_POST['usuario'];
				$valores["clave"] = $_POST['clave'];
				
				$resultado = $this->Iniciar->validarCuenta($valores);
				
				if ( $resultado == 1){
					$this->inicio();
				}else{
					echo "Error en el usuario con la base de datos";
				}
			}else{

				//$this->salir();
			}
		}
	}

	/**
	*
	*
	*/
	function identificacion($msj = null){
		$data['msj'] = $msj;
		$this->load->view('login/afiliacion/frmIdentificacion', $data);
		session_destroy();
	}
	
	/**
	* 
	*
	*/
	function confirmar(){
		$msj = "";
		if(isset($_POST['cedula'])){
			$this->load->model('saman/Persona');
			$this->load->model('saman/Militar');
			$this->Persona->consultar($_POST['cedula']);
			if($this->Persona->fechaNacimiento == $_POST['fecha']){
				$max = count($this->Persona->Familiares);
				$Militar = $this->Militar->obtener($this->Persona->oid);
				$data['apellido'] = $this->Persona->primerApellido;
				$ano = explode('/', $Militar->fechaIngreso);
				$posicion = mt_rand(0, $max);
				$data['afiliado'] = "MARIA IZARRA CHAVEZ";
				$resp = "NO";
				if ($posicion != $max) {
					$afiliado = $this->Persona->Familiares[$posicion];					
					$data['afiliado'] =  $afiliado->nombreApellidoCompleto();
					$resp = "SI";				
				}

				$data['APIKey'] = md5($ano[0] . $Militar->Componente->codigo . "SI" . $resp);
				$data['id'] = $this->Persona->cedula;
				$_SESSION['APIkey'] = $data['APIKey'];
				$_SESSION['cedula'] = $_POST['cedula'];				
				$_SESSION['nombreRango'] = $Militar->Componente->codigoRango . ". " . $this->Persona->primerNombre . " " . $this->Persona->primerApellido;
				$this->load->view('login/afiliacion/frmConfirmar', $data);	

			}else{
				$msj = "Error en la identificación, intente de nuevo o dirigase a la cede principal del IPSFA para actualizar sus datos";
				$this->identificacion($msj);
			}
		}else{
			$this->identificacion();
		}
		
	}

	
	/**
	*
	*
	*/	
	function crear(){
		
		$APIkey = md5($_POST['promocion']. $_POST['componente'] . $_POST['apellido']. $_POST['afiliado']);
		if($APIkey == $_SESSION['APIkey']){
			$this->load->view('login/afiliacion/frmCrear');
		}else{
			$msj = "Ocurrio un error en los datos de confirmación";
			$this->identificacion($msj);
		}
		
	}

	public function registrarUsuario(){

		$this -> load -> model("usuario/usuario","usuario");
		$usuario = new $this -> usuario;
		$usuario->cedula = $_SESSION['cedula'];
		$usuario->tipo = 1;
		$usuario->nombre = $_SESSION['nombreRango'];
		$usuario->sobreNombre = $_POST['usuario'];
		$usuario->correo = $_POST['correo'];
		$usuario->clave = $_POST['clave'];
		$usuario->respuesta = $_SESSION['APIkey'];
		if($usuario->existe() == -1){
			$usuario->registrar();	
			$_SESSION['correo'] = $_POST['correo'];
			$_SESSION['estatus'] = 0;
			$this->load->view('login/afiliacion/frmOk');
		}else{
			$msj = "El usuario se encuentra registrado, intente recuperar la contraseña";
			$this->identificacion($msj);
		}
	}
  	
  	function salir(){
  		session_destroy();
  		$this->index();
  	}

	function __destruct(){
	}
}