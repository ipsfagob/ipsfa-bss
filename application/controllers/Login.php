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
 		
  		require_once('application/libraries/PHPMail/class.phpmailer.php');
 		$mail = new PHPMailer();
        $body                ='';
        $mail->IsSMTP(); 							  // telling the class to use SMTP
        $mail->SMTPDebug  = 1;						  //
        $mail->Host          = "smtp.gmail.com";      //
        $mail->SMTPSecure = "tls";					  //
        $mail->SMTPAuth      = true;                  // enable SMTP authentication
        $mail->SMTPKeepAlive = true;                  // SMTP connection will not close after each email sent

        $mail->Port          = 587;
        $mail->Username      = "ipsfanet.noresponder@gmail.com"; // SMTP account username
        $mail->Password      = "za63qj2p";        // SMTP account password
        $mail->SetFrom('ipsfanet.noresponder@gmail.com', 'Departamento de Afiliacion');
        $mail->AddReplyTo('ipsfanet.noresponder@gmail.com', 'Despartamento Afiliacion');
        $mail->Subject = 'Ipsfa En Linea';

        $cuerpo = '
        Hola, ' . $_SESSION['nombreRango'] . ' <br>
        Ipsfa en linea te da la bienvenida y te invita a certificar tu cuenta de correo.<br>
        <a href="http://200.44.168.196/web/web/ipsfaNet/ipsfa-bss/index.php/Login/validarCorreo/' . $_SESSION['APIkey'] . '">
        Certificar 
        </a>';

        $mail->AltBody    = "Texto Alternativo"; // optional, comment out and test
        $mail->MsgHTML($cuerpo);
        $mail->AddAddress($_SESSION['correo'], "Certificacion de Cuenta");
        if(!$mail->Send()) {
            return "Error al enviar: " . $mail->ErrorInfo;
        } else {
            return "Mensaje enviado a:  !";
        }
		

  	}


/**
	* Enviar Correo Electronico para certificar una cuenta
	*
	* @access protected
	* @return mixed
	*/	
  	public function enviarCorreo(){
 		echo "Hola";
  		require_once('application/libraries/PHPMail/class.phpmailer.php');
 		$mail = new PHPMailer();
        $body                ='';
        $mail->IsSMTP(); 							  // telling the class to use SMTP
        $mail->SMTPDebug  = 1;						  //
        $mail->Host          = "smtp.gmail.com";      //
        $mail->SMTPSecure = "tls";					  //
        $mail->SMTPAuth      = true;                  // enable SMTP authentication
        $mail->SMTPKeepAlive = true;                  // SMTP connection will not close after each email sent

        $mail->Port          = 587;
        $mail->Username      = "ipsfanet.noresponder@gmail.com"; // SMTP account username
        $mail->Password      = "za63qj2p";        // SMTP account password
        $mail->SetFrom('ipsfanet.noresponder@gmail.com', 'Departamento de Afiliacion');
        $mail->AddReplyTo('ipsfanet.noresponder@gmail.com', 'Despartamento Afiliacion');
        $mail->Subject = 'Ipsfa En Linea';

        $cuerpo = '<a href="http://200.44.168.196/web/web/ipsfaNet/ipsfa-bss/index.php/Login/validarCorreo/">Certificar Correo</a>';

        $mail->AltBody    = "Texto Alternativo"; // optional, comment out and test
        $mail->MsgHTML($cuerpo);
        $mail->AddAddress("gesaodin@gmail.com", "Certificacion de Cuenta");
        if(!$mail->Send()) {
            return "Error al enviar: " . $mail->ErrorInfo;
        } else {
            return "Mensaje enviado a:  !";
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