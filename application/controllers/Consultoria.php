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
define ('__CONTROLADOR', 'Consultoria');
class Consultoria extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');	
	}
	
	function index() {
		if(isset($_SESSION['cedula'])){
			$this->load->model('saman/Militar', 'Militar');
			$this->Militar->consultar($_SESSION['cedula']);	
			$data['Militar'] = $this->Militar;	
			$this->load->view ( 'consultoria/principal', $data );

		}else{			
			$this->salir("Debe iniciar session");
		}
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
		        
		        
		        header('Location: ' . base_url() . 'index.php/Consultoria/index');
		  	}else{
		  		echo "No se encontro el token";
		  	}
			
		}else{
			echo "falta iniciar un token de Conexion";
		}
	}


	/**
	 * Crear notificaiones
	 *
	 * @access  public
	 * @return mixed
	 */	
	function notificar(){
		$this->load->model('comun/Dbipsfa');
		$sInsertar = 'INSERT INTO datos.requerimiento (oid, obse,esta,fech) 
		VALUES (' . $_GET['oid'] . ',\'' . $_GET['req'] . '\',\'0\', \'now()\')';
		
		$exec = $this->Dbipsfa->consultar($sInsertar);
		
		$arr['msj'] = 'Exito';
		echo json_encode($arr);

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