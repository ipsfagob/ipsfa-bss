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
//session_start();
date_default_timezone_set ( 'America/Caracas' );
define ('__CONTROLADOR', 'BienestarPanel');
class BienestarPanel extends CI_Controller{


	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('panel/Mpanel');
		header("Cache-Control: no-cache, must-revalidate, max-age=0"); // HTTP/1.1
	}

	function validarUsuario(){		
		$this->index();
	}

	function index(){
		
		$this->load->view('bienestarsocial/panel/inicio');
	}

	function farmacia(){
		$this->load->view('bienestarsocial/panel/farmacia');
	}

	function bienestar(){
		$this->load->view('bienestarsocial/panel/bienestar');
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
		$data['cita'] = $this->Cita->listarPanel(5);
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
	public function consulta(){
		
		$this->load->view('bienestarsocial/panel/consulta');	
	}

	/**
	* Permite listar Reembolso y Ayudas ver estatus
	*
	* @access public
	* @return html
	*/
	public function estadistica(){
		
		$this->load->view('bienestarsocial/panel/estadistica');	
	}

	/**
	* Permite listar Reembolso y Ayudas ver estatus
	*
	* @access public
	* @return html
	*/
	public function reporte(){
		
		$this->load->view('bienestarsocial/panel/reporte');	
	}
	/**
	* Permite listar Reembolso y Ayudas ver estatus
	*
	* @access public
	* @return html
	*/
	public function solicitudes(){
		$data['Solicitudes'] = $this->Mpanel->cosultarSolicitudes();
		$data['titulo'] = 'Solicitud: Reembolso y Ayudas';
		$data['accion'] = 0;
		$this->load->view('bienestarsocial/panel/solicitudes', $data);	
	}

	/**
	* Permite listar Reembolso y Ayudas ver estatus
	*
	* @access public
	* @return html
	*/
	public function solicitudesAutorizar(){
		$data['Solicitudes'] = $this->Mpanel->cosultarSolicitudes(1);
		$data['titulo'] = 'Solicitud: Reembolso y Ayudas Verificadas';
		$data['accion'] = 1;
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
		print($this->Producto->consultarSidroFan($pr));
	}


	/**
	 * Generar listado de medicamentos pedidos
	 *
	 * @access  public
	 * @return html
	 */
	public function medicamentos(){
		$this->load->model('saman/Solicitud');
		$data['data'] = $this->Solicitud->listarMedicamentosPanel(1);
		$this->load->view ( 'bienestarsocial/panel/medicamentos', $data );
	}



	function salvarCita(){
		
	}

	function solicitudesConfigurar($id = '', $tipo = ''){
		error_reporting(0);
		$this->load->model('comun/Archivo');
		$this->load->model('saman/Solicitud');
		$this->load->model('utilidad/Correo');
		$solicitud  = $this->Solicitud->listarSolicitudes($id)->rs;
		$corr = json_decode($solicitud[0]->detalle);
		$doc = json_decode($solicitud[0]->doc);
		$this->Correo->para = $solicitud[0]->cor . ',' . $doc->cor;

		//print_r($this->Correo->para);
		$contenido = 'Ayuda';
		if($solicitud[0]->tipo == 1) $contenido = 'Reembolso';
		$this->Correo->cuerpo = 'Hola, ' . $solicitud[0]->nom . '.<br>
				Su solicitud de ' . $contenido . ' bajo el codigo 
				' . $id . ' para ' . $solicitud[0]->nom . ' esta siendo procesada por nuestros analistas
				<br><br>
				IPSFA en linea Optimizando tu bienestar...';
		$this->Correo->gerencia = 'Gerencia de Bienestar Social';
		$this->Correo->titulo = $solicitud[0]->nom;
		$this->Correo->enviar();
		
		$data['detalles'] = $this->listarDocumentos($id);
		$data['combo'] = $this->listarTipoDocumento();
		$data['ruta'] = base_url() . "public/doc/" . $this->Archivo->_obtenerTipoCarpeta($tipo) . "/" . $id . '/';
		$data['codigo'] = $id;
		$data['correo'] = $solicitud[0]->cor;
		$data['nombre'] = $solicitud[0]->nomb;
		$data['tipo'] = $tipo;
		$this->Solicitud->modificar($id, 2);
		header('Location: ' . base_url() . 'index.php/BienestarPanel/solicitudesConfigurarSM/' . $id . '/' . $tipo);		
	}

	function solicitudesConfigurarT($id = '', $tipo = ''){
		error_reporting(0);
		$this->load->model('comun/Archivo');
		$this->load->model('saman/Solicitud');
		$this->load->model('utilidad/Correo');
		$solicitud  = $this->Solicitud->listarSolicitudes($id)->rs;
		$corr = json_decode($solicitud[0]->detalle);
		$doc = json_decode($solicitud[0]->doc);
		$this->Correo->para = $corr->cor . ',' . $doc->cor;
		$this->Correo->cuerpo = 'Hola, ' . $solicitud[0]->nom . '.<br>
				Su solicitud de Tratamiento Prolongado bajo el codigo 
				' . $id . ' para ' . $corr->nomb . ' por  ' . $corr->diagnostico . '  esta siendo procesada por nuestros analistas
				<br><br>
				IPSFA en linea Optimizando tu bienestar...';
		$this->Correo->gerencia = 'Gerencia de Bienestar Social';
		
		$this->Correo->titulo = $solicitud[0]->nom;
		$this->Correo->enviar();
		
		$this->Solicitud->modificar($id, 2);
		header('Location: ' . base_url() . 'index.php/BienestarPanel/solicitudesConfigurarSM/' . $id . '/' . $tipo);		
	}


	function solicitudesConfigurarSM($id = '', $tipo = ''){
		error_reporting(0);
		$this->load->model('comun/Archivo');
		$this->load->model('saman/Solicitud');
		$this->load->model('utilidad/Correo');

		$solicitud  = $this->Solicitud->listarSolicitudes($id)->rs;
		$corr = json_decode($solicitud[0]->detalle);

		$this->Correo->para = $corr->cor;
		

		$data['detalles'] = $this->listarDocumentos($id);

		$data['combo'] = $this->listarTipoDocumento();
		$data['ruta'] = base_url() . "public/doc/" . $this->Archivo->_obtenerTipoCarpeta($tipo) . "/" . $id . '/';
		$data['codigo'] = $id;
		$data['correo'] = $corr->cor;
		$data['nombre'] = $solicitud[0]->nom;
		$data['tipo'] = $tipo;		
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
		$this->Solicitud->modificar($_POST['codigo'], $_POST['nota']);
		$this->Solicitud->modificarCodigo($_POST['codigo'], $_POST['nota'] . "- MOTIVO: " . $_POST['observa']);
		$aprobacion = "RECHAZADO";
		if($_POST['nota'] == 3) $aprobacion = "APROBADO";
		$this->Correo->para = $_POST['correo'];
		$this->Correo->cuerpo = 'HOLA, ' . $_POST['nombre'] . '.<br>
				SU CASO SEGUN EL CODIGO ' . $_POST['codigo'] . ' HA SIDO ' . $aprobacion . ' <br><br>
				OBSERVACIONES: <BR> ' . $_POST['observa'] . '<br><br>
				IPSFA EN LINEA OPTIMIZANDO SU BIENESTAR...';
		$this->Correo->gerencia = 'Gerencia de Bienestar Social';
		$this->Correo->titulo = $_POST['nombre'];
		$this->Correo->enviar();
		
		header('Location: ' . base_url() . 'index.php/BienestarPanel/index');


	}

	function listaMsj(){

	}

	function listarDirectorio($sCodigo, $iTipo){

		$this->load->model('comun/Archivo');
		$sTipo = $this->Archivo->_obtenerTipoCarpeta($iTipo);
		print (json_encode($this->Archivo->listarDirectorio($sCodigo, $sTipo)));
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

	function consultarCodigo($cod){
		$this->load->model('saman/Solicitud');
		$Solicitud = $this->Solicitud->consultarCodigo($cod);
		echo json_encode($Solicitud->rs);
	}

	function consultaGeneral(){
		$this->load->model('saman/Solicitud');
		$lst = $this->Solicitud->consultaGeneral($_GET);
		//print_r($lst);
		print(json_encode($lst->rs));
	}

	function consultaEstadisticas(){
		$this->load->model('saman/Solicitud');
		//$arr = array('tipo' => 1, 'desde' => '2016/04/12', 'hasta' => '2016/04/15');
		$lst = $this->Solicitud->estadisticasGeneral($_GET);
		//print_r($lst);
		print(json_encode($lst));
	}

	function notificarBadan(){
		$this->load->model('utilidad/Correo');
		$this->Correo->para = $_GET['correo'];
		$this->Correo->cuerpo = 'HOLA, ' . $_GET['nombre'] . '.<br> 
				SU SOLICITU BAJO EL CODIGO ' . $_GET['codigo'] . ' HA SIDO ' . $_GET['tipo'] . '<br><br>
				OBSERVACIONES: <BR> ' . $_GET['contenido'] . '<br><br>
				IPSFA EN LINEA OPTIMIZANDO SU BIENESTAR...';
		$this->Correo->gerencia = 'Gerencia de Bienestar Social';
		$this->Correo->titulo = $_GET['nombre'];
		$this->Correo->enviar();

		$this->load->model('saman/Solicitud');
		$this->Solicitud->modificar($_GET['codigo'], 2);
		echo json_encode("Correo enviado");

	}

	function modificarArchivo(){
		$this->load->model('comun/Archivo');
		$obj = $this->Archivo->modificar($_GET);
		print_r(json_encode($obj));
	}

	function autorizarSolicitud($cod, $val){
		$this->load->model('saman/Solicitud');
		$this->Solicitud->modificar($cod, $val);
		if($val == 5){
			header('Location: ' . base_url() . 'index.php/BienestarPanel/solicitudes');
		}else{
			header('Location: ' . base_url() . 'index.php/BienestarPanel/solicitudesAutorizar');
		}

	}


	function actualizarFarmaIpsfa(){
		$this->load->model('fisico/Maestroproducto');
		$this->Maestroproducto->actualizarFarmaIpsfa();

	}

	function salir(){
		session_destroy();
		header('Location: ' . base_url() . 'index.php/Login/salir');
	}
	function info(){
		phpinfo();
	}

	function __destruct(){

	}

}