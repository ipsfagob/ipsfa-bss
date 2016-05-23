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
		//if(!isset($_SESSION['cedula'])) $this->salir("Debe iniciar session");
		if(!isset($_SESSION['cedula'])) {
			$this->salir("Debe iniciar session");

		}else{
			$_SESSION['cedula'] = '7682282';
		}
	}
	
	function index() {
		$this->actualizarDatos ();
	}



	/**
	* Rohamel Conexion
	*
	*
	*/
	function token($token = '', $pag = ''){
		$this->load->model('usuario/Usuario');
		$this->load->model('usuario/Iniciar');

		if($token != ''){
			$ruta = '/var/www/NUEVO/ipsfaNet/init.session.IPSFA.web/fileWebSourceLogic/admin/';
			if(base_url() == '/ipsfa-bss/') $ruta = '/home/www/';
			
			$ruta = $ruta . $token . '.json';
			
			if (file_exists($ruta)) {
				$contenido = file_get_contents($ruta);	
			    		       
		        $php_ = json_decode($contenido);		       		       
		        $this->Iniciar->token($php_);
		        
		        if($pag == '') $pag = 'actualizarDatos';
		        header('Location: ' . base_url() . 'index.php/Afiliacion/' . $pag);
		  	}else{
		  		echo "No se encontro el token";
		  	}
			
		}else{
			echo "falta iniciar un token de Conexion";
		}
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
			$data['menu'] = 'mnu_datos_basicos';
			$this->load->view ( 'afiliacion/inicio', $data );
		}else{			
			$this->salir("Debe iniciar session");
		}
	}

	function datosBancarios(){
		if(isset($_SESSION['cedula'])){
			$this->load->model('saman/Militar', 'Militar');
			
			$this->Militar->consultar($_SESSION['cedula']);
			$data['menu'] = 'mnu_datos_bancarios';
			$data['Militar'] = $this->Militar;

			$this->load->view ( 'afiliacion/datos_bancario', $data );
		}else{			
			$this->salir("Debe iniciar session");
		}
	}


	/**
	 * Renovacion de Carnet para afiliados
	 *
	 * @access public
	 * @return mixed
	 */
	public function renovacionCarnet(){
		if(isset($_SESSION['cedula'])){
			$this->load->model('saman/Militar', 'Militar');
			$this->load->model('saman/Sucursales', 'Sucursales');
			
			$this->Militar->consultar($_SESSION['cedula']);
			$data['Militar'] = $this->Militar;
			$data['Sucursales'] = $this->Sucursales->listar()->rs;
			
			$data['menu'] = 'mnu_renovacion_carnet';
			$this->load->view ( 'afiliacion/renovacion', $data );
		}else{			
			$this->salir("Debe iniciar session");
		}
	}

	function consultarp(){
		echo "<pre>";
		$this->load->model('saman/Persona');
		$this->load->model('roraima/Afiliado');
		$this->Persona->consultar('7682282', '');
		
		$this->Afiliado->consultarReferencia($this->Persona);
		
		print_r($this->Persona);
	}
	/**
	 * Renovacion de Carnet para afiliados
	 *
	 * @access public
	 * @return mixed
	 */
	public function adjuntar($id, $motivo, $sucursal){
		if(isset($_SESSION['cedula'])){
			$this->load->model('saman/Estado', 'Estado');
			$this->load->model('saman/Persona');
			$this->load->model('roraima/Afiliado');

			$this->Persona->consultar('', $id);
			$this->Afiliado->consultarReferencia($this->Persona);	
			$data['Persona'] = $this->Persona;
			$data['Estado'] = $this->Estado->listar()->rs;
			$data['menu'] = 'mnu_renovacion_carnet';
			$this->load->view ( 'afiliacion/adjuntar', $data );
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


	public function listarCodigos(){
		if(isset($_SESSION['cedula'])){
			$this->load->model('saman/CodigoArea', 'CodigoArea');
			//echo 'Object: ';
			echo json_encode($this->CodigoArea->listar($_GET['tip'])->rs);
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
	 * Salvar la Dirección
	 *
	 * @access public
	 * @return mixed
	 */
	function salvarDireccion(){
		$this->load->model('saman/Direccion');
		
		$this->load->model('utilidad/Correo', 'Correo');

		$this->Direccion->oid = str_replace("'","",$_GET['oid']);
		$this->Direccion->ides =  str_replace("'","",$_GET['ides']);
		$this->Direccion->idmu =  str_replace("'","",$_GET['idmu']);
		$this->Direccion->idpa =  str_replace("'","",$_GET['idpa']);
		$this->Direccion->direccion =  str_replace("'","",$_GET['dir']);
		$this->Direccion->telefono->tipo =  str_replace("'","",$_GET['tip']);
		$this->Direccion->telefono->codigoArea =  str_replace("'","",$_GET['cod']);
		$this->Direccion->telefono->numero =  str_replace("'","",$_GET['tel']);
		$this->Direccion->correo =  str_replace("'","",$_GET['cor']);

		$this->Direccion->salvar($this->Direccion, 'habitacion');

		$this->Correo->para = $_SESSION['correo'];
		$texto = 'ACTUALIZACION DE DATOS';
		$this->Correo->cuerpo = $this->plantillaMensajeCorreo($_SESSION['nombreRango'], $texto , 'UNICO');
		$this->Correo->gerencia = 'Gerencia de Afiliacion';
		$this->Correo->titulo = $_SESSION['nombreRango'];
		//$this->Correo->enviar();
		
		$arr['msj'] = 'Exito';
		echo json_encode($arr);
	}

	/**
	 * Actualizar Foto
	 *
	 * @access public
	 * @return mixed
	 */
	function actualizarFoto(){
		$this->load->model('comun/Archivo', 'Archivo');
		if(!isset($_POST['file'])) {
			if( $_FILES['file']['size'] < 1000000 ) {
				$this->Archivo->salvar(7, $_FILES, $_POST['oid']);
				$err = "El archivo se subio exitosamente";
			}else{
				$err = "No se puede subir un archivo mayor a 1 MB";
			}
		}
		
	}

	/**
	 * Salvar los datos Fisionomicos y medicos
	 *
	 * @access public
	 * @return mixed
	 */
	function salvarDatosMedicos(){
		$this->load->model('roraima/Afiliado');

		$Afiliado = (Object)$_GET;
		$this->Afiliado->oid = $Afiliado->oid;
		$this->Afiliado->estatus = '1';
		$this->Afiliado->DatosMedicos->tipoSangre = str_replace("'","",$Afiliado->Medicos['alergia']);
		$this->Afiliado->DatosMedicos->alergiasMedicamentos = str_replace("'","",$Afiliado->Medicos['alergia']);
		$this->Afiliado->DatosMedicos->enfermedadesCronicas = str_replace("'","",$Afiliado->Medicos['enfermedad']);
		$this->Afiliado->DatosMedicos->donanteOrgano = str_replace("'","",$Afiliado->Medicos['organo']);
		$this->Afiliado->DatosMedicos->historiaClinica = str_replace("'","",$Afiliado->Medicos['expediente']);

		$this->Afiliado->DatosFisionomicos->codPiel = str_replace("'","",$Afiliado->Fisionomicos['piel']);
		$this->Afiliado->DatosFisionomicos->codCabello = str_replace("'","",$Afiliado->Fisionomicos['cabello']);
		$this->Afiliado->DatosFisionomicos->codOjos = str_replace("'","",$Afiliado->Fisionomicos['ojos']);
		$this->Afiliado->DatosFisionomicos->estatura = str_replace("'","",$Afiliado->Fisionomicos['estatura']);
		$this->Afiliado->salvar();

		print_r($this->Afiliado);



	}



	function plantillaMensajeCorreo($nombre, $tipo, $codigo){
		$msj = '
			Estimado Afiliado(a)  ' . $nombre . ', <br><br>

			Usted ha realizado una solicitud por  ' . $tipo . ' bajo el c&oacute;digo  ' . $codigo . '. Para mayor información puede mantenerse en contacto a trav&eacute;s de nuestro portal web 
			http://www.ipsfa.gob.ve, o le estaremos notificando a través de su correo electr&oacute;nico.<br><br>

			.- IPSFA jam&aacute;s le enviar&aacute; un enlace donde le solicite informaci&oacute;n de claves de acceso a IPSFA en l&iacute;nea, cuentas bancarias, ni correo electr&aacute;nico personal.<br>
			.- IPSFA s&aacute;lo env&iacute;a correos personalizados, es decir, con su nombre, por ejemplo: CNEL. BOLIVAR SIMON.<br>
			.- IPSFA nunca le enviar&aacute; un correo en el que se use su direcci&oacute;n en el encabezado del mensaje, por ejemplo: Estimado afiliado Sr.(a): juan.cristobal.arocha@gmail.com.<br>
			.- Esta es una cuenta no monitoreada. No responda o reenv&aacute;e correos a esta cuenta.<br>
			Ud. dispone de los siguientes correos en caso que requiera reportar cualquier situación irregular: 

			Todos los documentos reposaran en su expediente fisico del Instituto.<br>
			IPSFA en línea Optimizando tu Bienestar.';

		return $msj;

	}

	/**
	 * Salir del sistema
	 *
	 * @access public
	 * @return mixed
	 */
  	public function salir($msj = '') {  		
		session_destroy();
		
		//header('Location: ' . base_url() . 'index.php/Login');
		header('Location: http://www.ipsfa.gob.ve/NUEVO/ipsfaNet/init.session.IPSFA.web/php.Source/projects/admin/app/actions/enlace/iniciarSesion/class.DestroySesionActions.php');
	}



  
	function __destruct(){
	}
}