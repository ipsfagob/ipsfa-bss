<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Panel de Control
 *
 * El panel de control de un sistema es un software que provee una interfaz gráfica 
 * para la gestión de usuarios y la administración de los servicios, se puede acceder a:
 *
 * Estadísticas.
 * Detalles sobre las solicitudes.
 * Administración de archivos y directorios.
 * Configuración de cuentas.
 * Administración de bases de datos.
 * Acceso a los archivos de registros del servidor.
 *
 * @package ipsfa-bss\application\controller
 * @subpackage saman
 * @author Carlos Peña
 * @copyright Derechos Reservados (c) 2015 - 2016, MamonSoft C.A.
 * @link http://www.mamonsoft.com.ve
 * @since version 1.0
 */
define ('__CONTROLADOR', 'BienestarPanel');
class BienestarPanel extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('panel/Mpanel');
	}

	function validarUsuario(){
		
		$this->index();
	}

	function index(){
		
		$this->load->view('bienestarsocial/panel/inicio');
	}

	function login(){
		$this->load->view('login/login');
	}

	/**
	 * Generar solicitud de medicamentos
	 *
	 * @access  public
	 * @return html
	 */
	public function tratamiento(){
		$this->load->model('comun/Cita');	
		$data['cita'] = $this->Cita->listar(5);
		$this->load->view ( 'bienestarsocial/panel/tratamiento', $data );
	}


	/**
	 * Generar solicitud de medicamentos
	 *
	 * @access  public
	 * @return html
	 */
	public function citas(){
		$this->load->model('comun/Cita');	
		$data['cita'] = $this->Cita->listar(4);
		$this->load->view ( 'bienestarsocial/panel/citas', $data );
	}


	/**
	* Permite listar Reembolso y Ayudas ver estatus
	*
	* @access public
	* @return html
	*/
	public function solicitudes(){
		$data['Solicitudes'] = $this->Mpanel->cosultarSolicitudes();
		$this->load->view('bienestarsocial/panel/solicitudes', $data);	
	}

		/**
	 * Vista Pagina Farmacia
	 * @return html
	 */
	function sidrofan() {			
		$this->load->view ( 'bienestarsocial/panel/sidrofan' );
	}



	/**
	 * Listar un producto o medicamento según lo declare un usuario
	 *
	 * @access  public
	 * @param string
	 * @return json 
	 */
	public function listarMedicamentosSidroFan($pr = ''){		
		$this->load->model("fisico/maestroproducto", "Producto");
		print($this->Producto->listarExistenciaProductosSidroFan($pr));
	}


	/**
	 * Generar listado de medicamentos pedidos
	 *
	 * @access  public
	 * @return html
	 */
	public function medicamentos(){
		$this->load->model('saman/Solicitud');
		$data['data'] = $this->Solicitud->listarMedicamentos();
		$this->load->view ( 'bienestarsocial/panel/medicamentos', $data );
	}



	function salvarCita(){
		
	}

	function solicitudesConfigurar($id, $tipo = ""){
		$this->load->model('comun/Archivo');
		$this->load->model('saman/Solicitud');
		$this->load->model('utilidad/Correo');

		$solicitud  = $this->Solicitud->listarSolicitudes($id)->rs;

		$this->Correo->para = $solicitud[0]->corr;
		$this->Correo->cuerpo = 'Hola, ' . $solicitud[0]->nomb . '.<br>
				Su solicitud de reembolso bajo el codigo 
				' . $id . ' está siendo procesada por nuestros analistas
				<br><br>
				IPSFA en linea Optimizando tu bienestar...';
		$this->Correo->gerencia = 'Gerencia de Bienestar Social';
		$this->Correo->titulo = $solicitud[0]->nomb;
		$this->Correo->enviar();

		$data['detalles'] = $this->listarDocumentos($id);

		$data['combo'] = $this->listarTipoDocumento();
		$data['ruta'] = base_url() . "public/doc/" . $this->Archivo->_obtenerTipoCarpeta($tipo) . "/" . $id . '/';
		$data['codigo'] = $id;
		$data['correo'] = $solicitud[0]->corr;
		$data['nombre'] = $solicitud[0]->nomb;
		$this->Solicitud->modificar($id, 2);
		$this->load->view('bienestarsocial/panel/config_solicitudes', $data);
		
	}


	function configurarArchivos($data){
		if(is_array($data)){
			$this->load->view('bienestarsocial/panel/config_solicitudes', $data);
		}else{

		}
	}

	function notificarCasos(){

		$this->load->model('utilidad/Correo');
		$this->load->model('saman/Solicitud');
		$this->Solicitud->modificar($_POST['codigo'], 3);
		$this->Solicitud->modificarCodigo($_POST['codigo'], $_POST['nota'] . ". MOTIVO: " . $_POST['observa']);

		$this->Correo->para = $_POST['correo'];
		$this->Correo->cuerpo = 'HOLA, ' . $_POST['nombre'] . '.<br>
				' . $_POST['nota'] . ' SEGUN EL CODIGO ' . $_POST['codigo'] . '<br><br>
				OBSERVACIONES: <BR> ' . $_POST['observa'] . '<br><br>
				IPSFA EN LINEA OPTIMIZANDO SU BIENESTAR...';
		$this->Correo->gerencia = 'Gerencia de Bienestar Social';
		$this->Correo->titulo = $_POST['nombre'];
		$this->Correo->enviar();
		header('Location: ' . base_url() . 'index.php/BienestarPanel/index');


	}

	function listaMsj(){

	}

	function listarDirectorio(){
		
		print (json_encode($this->Archivo->listarDirectorio('00000000', 'reembolso')));
	}
	
	/**
	* Listar los combos de selección
	*
	*/
	function listarTipoDocumento(){
		
		return $this->Archivo->listarTipoDocumento()->rs;
	}


	/**
	* Listar los documentos adjuntos segun sea el caso
	*
	*/
	function listarDocumentos($codigo){
		$this->load->model('comun/Archivo');
		return $this->Archivo->listarDocumentos($codigo)->rs;
	}


	function reportarCitaTratamiento(){
		
		$this->load->model('saman/Solicitud');
		$this->load->model('utilidad/Correo');
		$this->load->model('comun/Cita');
		$this->Solicitud->modificar($_POST['cod'], 3);
		$this->Cita->modificar($cod, 3);
		$this->Correo->para = $_POST['corr'];
		$this->Correo->cuerpo = 'Hola, ' . $_POST['nomb'] . '.<br>
			Su solicitud con codigo  
			' . $_POST['cod'] . ' para tratamiento prolongado ha caducado si aún desea ser atendido debe generar otra
			<br><br>
			IPSFA en linea Optimizando tu bienestar...';
		$this->Correo->gerencia = 'Gerencia de Bienestar Social';
		$this->Correo->titulo = $_POST['nomb'];
		$this->Correo->enviar();
		echo "Hemos notificado al afiliado.";
	}

	function citaAtendida($cod){
		$this->load->model('saman/Solicitud');
		$this->load->model('comun/Cita');
		$this->Solicitud->modificar($cod, 2);
		$this->Cita->modificar($cod, 2);
		$this->citas();
	}

	function __destruct(){

	}

}