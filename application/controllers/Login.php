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
date_default_timezone_set ( 'America/Caracas' );
define ('__CONTROLADOR', 'Login');
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
		if(isset($_SESSION['cedula'])){
			$this->inicio();	
		}else{
			$this->load->view ( 'login/login');
		}
		
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

				$this->salir();
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

	/**
	* Establecer politicas para la recuperacion de clave
	*
	* @access public
	* @return mixed
	*/	
	public function recuperar($msj = ''){
		$data['msj'] = $msj;
		$this->load->view('login/afiliacion/frmRecuperar', $data);	
	}

	/**
	* Registar y asignar tipo al usuario
	*
	* @access public
	* @return mixed
	*/	
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
			$this->load->model('comun/Dbipsfa');
			$arr = array(
		      'cedu' => $usuario->cedula,
		      'obse' => 'Creación de Usuario',
		      'fech' => 'now()',
		      'app' => 'Login',
		      'tipo' => 0
			);

    		$this->Dbipsfa->insertarArreglo('traza', $arr);
			$_SESSION['correo'] = $_POST['correo'];
			$_SESSION['estatus'] = 0;
    		$this->enviarCorreoCertificacion();
			$this->load->view('login/afiliacion/frmOk');
		}else{
			$msj = "El usuario se encuentra registrado, intente recuperar la contraseña";
			$this->identificacion($msj);
		}
	}

	/**
	* Enviar Correo Electronico para certificar una cuenta
	*
	* @access protected
	* @return mixed
	*/	
  	public function enviarCorreoCertificacion(){
 
  		require require_once('application/third_party/phpmailer/PHPMailerAutoload.php');;

		$mail = new PHPMailer;

		//$mail->SMTPDebug = 3;                               // Enable verbose debug output

		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'ipsfanet.noresponder@gmail.com';                 // SMTP username
		$mail->Password = 'za63qj2p';                           // SMTP password
		$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587;                                    // TCP port to connect to

		$mail->setFrom('ipsfanet.noresponder@gmail.com', 'No Responder');
		$mail->addAddress('gesaodin@gmail.com', 'Carlos Peña');     // Add a recipient
		//$mail->addAddress('ellen@example.com');               // Name is optional
		//$mail->addReplyTo('info@example.com', 'Information');
		//$mail->addCC('cc@example.com');
		//$mail->addBCC('bcc@example.com');

		//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
		$mail->isHTML(true);                                  // Set email format to HTML

		$mail->Subject = 'Here is the subject';
		$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
		$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		if(!$mail->send()) {
		    echo 'Message could not be sent.';
		    echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
		    echo 'Message has been sent';
		}
            
		

  	}

  	/**
	* Permite validar y comprobar la existencia de un correo
	* Falta validar la funcion para el retorno de verdadero
	*
	* @access public
	* @return mixed
	*/
	public function validarCorreo($sha = ""){
		$this -> load -> model("usuario/usuario","usuario");

		if ($this->usuario->validarCorreo($sha) == TRUE){
			if(isset($_SESSION['estatus'])){
				$_SESSION['estatus'] = 1;
			}
			$this->load->view('login/afiliacion/frmCertificado');
		}

	}

	/**
	* Permite validar la ultima conexion
	*
	* @access public
	* @return mixed
	*/
	public function ultimaConexion(){
		print_r($_SESSION);
	}

  	function salir(){
  		session_destroy();
  		$this->load->view ( 'login/login');
  	}

  	function xCODAP(){
  		echo "<pre>";
  		$this -> load -> model("usuario/usuario","usuario");
  		print_r($this->usuario->listar());
  		
  	}

	function __destruct(){
	}
}