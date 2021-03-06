<?php

/**
 * Bienestar Social
 * 
 * Una herramienta para la entrega de medicamentos de alto costo
 * 
 * @package	Ipsfa.BienestarSocial
 * @author	Carlos Peña
 * @copyright	Copyright (c) 2015 - 2016, MamonSof C.A. (http://www.mamonsoft.com.ve/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	http://www.mamonsoft.com.ve/ipsfa
 * @since	Version 1.0.0
 * @filesource
 * #1070B7 Azul claro 
 * #00345A Azul Oscuro
 * #990000
 */
date_default_timezone_set ( 'America/Caracas' );
define ('__CONTROLADOR', 'BienestarSocial');
class BienestarSocial extends CI_Controller {

	var $_PRIVADO = TRUE;

	/**
	* Iniciando la clase
	*
	* @access public
	* @return void
	*/
	function __construct(){
		parent::__construct();		
		$this->load->helper('url');
		$this -> load -> model('carro/mcarro','Carro');
		$this->load->library('session');
		header("Cache-Control: no-cache, must-revalidate, max-age=0"); // HTTP/1.1
	}

	/*
	| -----------------------------------------------------------
	|	Control de Vistas en la WEB
	| -----------------------------------------------------------
	*/
	
	/**
	 * Vista Datos Basicos del Personal
	 * @return mixed
	 */
	function index() {
		if(isset($_SESSION['cedula'])){
			$_SESSION['back']=0;
			$this->load->view ( 'bienestarsocial/principal');
		}else{
			$this->salir();
		}

	}

	/**
	* Rohamel Conexion
	*
	*
	*/
	function token($token = ''){
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
		        
		        header('Location: ' . base_url() . 'index.php/BienestarSocial/index');
		  	}else{
		  		echo "No se encontro el token";
		  	}
			
		}else{
			echo "falta iniciar un token de Conexion";
		}
	}

	private function home(){
		header('Location: ' . base_url() . 'index.php/BienestarSocial/index');
	}
	
	/**
	 * Vista Datos Basicos del Personal
	 * @return html
	 */
	function datos() {
		if(isset($_SESSION['cedula'])){
			$this->load->model('saman/Militar', 'Militar');
			$this->load->model('saman/CodigoArea', 'CodigoArea');
			$this->Militar->consultar($_SESSION['cedula']);
			$data['CodigoArea'] = $this->CodigoArea->listar()->rs;
			$data['Militar'] = $this->Militar;
			$this->load->view ( 'bienestarsocial/datos', $data );
		}else{
			$this->salir();
			exit;
		}
	}
	
	/**
	 * Vista de las Bienestar Ayudas
	 *
	 * @access public
	 * @param string
	 * @return html
	 */
	
	function bienestar($url = '') {
		if(isset($_SESSION['cedula'])){
			$data['url'] = $url; 
			$this->load->view ( 'bienestarsocial/bienestar', $data);
		}else{
			$this->salir();
			exit;
		}
	}
	
	/**
	 * Vista de las Bienestar Ayudas
	 *
	 * @access public
	 * @return html
	 */
	function pendientes() {
		if(isset($_SESSION['cedula'])){
			$this->load->model('saman/Militar', 'Militar');
			$this->Militar->consultar($_SESSION['cedula']);
			
			$this->load->model('saman/Solicitud');		
			$Militar = $this->Solicitud->importarSolicitudesSaman($this->Militar)->Militar;		
			
			$data['Militar'] = $Militar->Solicitudes;
			$this->load->view ( 'bienestarsocial/pendientes', $data );
		}else{
			$this->salir();
			exit;
		}
	}

	/**
	 * Vista Pagina Farmacia
	 *
	 * @access public
	 * @return html
	 */
	public function ayudas() {
		if(isset($_SESSION['cedula'])){
			$this->load->model('saman/Solicitud', 'Solicitud');			
			$data['data'] = $this->Solicitud->listarPorCodigo($_SESSION['cedula']);
			$this->load->view ( 'bienestarsocial/ayuda', $data);
		}else{
			$this->salir();
			exit;
		}
	}

	
	/**
	 * Vista Pagina Farmacia
	 *
	 * @access public
	 * @return html
	 */
	public function farmacia($id = '') {
		if(isset($_SESSION['cedula'])){
			if($id == "me"){
				$this->load->view ( 'bienestarsocial/sidrofan' );
			}else{
				$data['data'] = $this->Carro->listar();
				$this->load->view ( 'bienestarsocial/badan', $data);
			}
		}else{
			$this->salir();
			exit;
		}
	}

	/**
	 * Vista Pagina Farmacia
	 *
	 * @access public
	 * @return html
	 */
	function citas() {
		if(isset($_SESSION['cedula'])){
			$this->load->model('comun/Cita');	
			$data['cita'] = $this->Cita->consultar($_SESSION['cedula']);
			$this->load->view ( 'bienestarsocial/citas', $data );
		}else{
			$this->salir();
			exit;
		}
	}

	/**
	 * Vista Pagina Carro de Pedidos
	 * @return html
	 */
	function carro(){
		$this->load->model('saman/Estado');
		$data['Estado'] = $this->Estado->listar()->rs;
		$data['data'] = $this->Carro->listar();
		$this->load->view ( 'bienestarsocial/carro', $data );
	}

	/**
	 * Reportes generales
	 *
	 * @access  public
	 * @return html
	 */
	function reportar(){
		if(isset($_SESSION['cedula'])){
		//$data['data'] = $this->Carro->listar();pendientes
			$this->load->view ( 'bienestarsocial/reportar' );
		}else{
			$this->salir();
			exit;
		}
	}

	/**
	 * Archivos adjuntos a casos pendientes
	 *
	 * @access  public
	 * @return html
	 */
	public function adjuntos($codigo, $url){
		if(isset($_SESSION['cedula'])){
			$data['codigo'] = $codigo;
			$data['url'] = $url;
			$this->load->model('saman/Solicitud');
			$data['data'] = $this->Solicitud->seleccionarDocumentos($codigo);
			if($url == 1){
				$this->load->view ( 'bienestarsocial/solicitud', $data );
			}else{
				$this->load->view ( 'bienestarsocial/solicitud_ayuda', $data );
			}
		}else{
			$this->salir();
			exit;
		}
	}

	/**
	 * Subir multiples archivos al sistema
	 *
	 * @access public
	 * @return mixed
	 */
	public function subirArchivos(){
		if(isset($_SESSION['cedula'])){
			if(isset($_POST['url'] )){
				$this->load->model('comun/Archivo', 'Archivo');
				$this->load->model('utilidad/Correo');
				$this->load->model('utilidad/Semillero');
								
				$this->Archivo->salvar($_POST['url'], $_FILES, $_POST['codigo']);				
				$this->Correo->para = $_SESSION['correo'];
				$texto = 'APOYO';
				if($_POST['url'] == 1) $texto = 'REEMBOLSO';
				$this->Correo->cuerpo = $this->plantillaMensajeCorreo($_SESSION['nombreRango'], $texto ,$_POST['codigo']);
				$this->Correo->gerencia = 'Gerencia de Bienestar Social';
				$this->Correo->titulo = $_SESSION['nombreRango'];
				$this->Correo->enviar();
				$this->load->model('saman/Solicitud');
				$this->Solicitud->modificar($_POST['codigo'], 1); // Cambio General del Estatus del caso
				$this->home();
			}
		}else{
			$this->salir();
			exit;
		}		
	}


	/**
	 * Subir multiples archivos para tratamiento prolongado
	 *
	 * @access public
	 * @return mixed
	 */
	function subirArchivosTratamiento(){
		if(isset($_SESSION['cedula'])){
			$this->load->model('comun/Archivo', 'Archivo');
			$this->load->model('utilidad/Correo', 'Correo');
			$this->load->model('utilidad/Semillero');
			$this->load->model('saman/Solicitud');
			$obs = 'TRA-' . $_POST['patologia'] . '-' . $_POST['oid'];
			$codigo = $this->generarCodigo('5',$obs);
			$valor = $this->Semillero->consultarTratamiento($codigo, $obs, 0);
			if($valor == 0){
				$json = $_POST;
				$json['cor'] = $_SESSION['correo'];
				$this->Archivo->salvar(3, $_FILES , $codigo);
				$this->Correo->para = $_SESSION['correo'];
				$this->Correo->cuerpo = $this->plantillaMensajeCorreo($_SESSION['nombreRango'], 'TRATAMIENTO PROLONGADO', $codigo);
				$this->Correo->gerencia = 'Gerencia de Bienestar Social';
				$this->Correo->titulo = $_SESSION['nombreRango'];

				$this->Correo->enviar();

				$arr = array(
					'codigo' => $_SESSION['cedula'],
					'numero' => $codigo,
					'certi' => md5($_SESSION['cedula']), 
					'detalle' => json_encode($json), //Esquema Json Opcional
					'recipes' => $_POST['patologia'],
					'fecha' => 'now()', 
					'tipo' => 5, 
					'estatus' => 1,
					'fcita' => date('Y-m-j')
				);
				$obj = $this->Solicitud->crear($arr);
				//$this->Solicitud->modificar($codigo, 1); //Actualizar tratamiento prolongado por activación
			}
			

			$this->home();
		}else{
			$this->salir();
			exit;
		}		
	}

	/**
	 * Seleccionar tratamientos prolongados
	 *
	 * @access  public
	 * @return mixed
	 */
	public function tratamiento(){
		if(isset($_SESSION['cedula'])){			
			$this->load->model('saman/Militar');
			$this->Militar->consultar($_SESSION['cedula']);
			$data['Militar'] = $this->Militar;
			$this->load->view ( 'bienestarsocial/comun/tratamiento/inicio', $data );
		}else{
			$this->salir();
			exit;
		}	
	}

	/**
	 * Generar solicitud de medicamentos
	 *
	 * @access public
	 * @return mixed
	 */
	public function casoTratamientos(){
		if(isset($_SESSION['cedula'])){
			$oid = '';
			$id = '';
			$this->load->model('saman/Tratamiento');
			$arr = (!isset($_POST['familiar'])) ?  $_SESSION['cedula'] : explode('|', $_POST['familiar']);
			if(is_array($arr)) {

				$id = $arr[0];
				$oid = $arr[1];
				$nomb = $_POST['nomb'];
			}
			$data['data'] = $this->Tratamiento->consultarProlongado($id);
			$data['id'] = $id;
			$data['oid'] = $oid;
			$data['nomb'] = $nomb;
			$this->load->view ( 'bienestarsocial/comun/tratamiento/casos', $data );
		}else{
			$this->salir();
			exit;
		}	
	}

	/**
	 * Generar solicitud de medicamentos
	 *
	 * @access  public
	 * @return html
	 */
	public function tratamientoSolicitud(){
		$this->load->model('comun/Cita');	
		$data['cita'] = $this->Cita->listar(5, $_SESSION['cedula']);
		$this->load->view ( 'bienestarsocial/tratamiento', $data );
	}

	/**
	 * Generar solicitud de medicamentos
	 *
	 * @access  public
	 * @return html
	 */
	public function cartaaval(){
		if(isset($_SESSION['cedula'])){
			$this->load->model('saman/Tratamiento');
			$data['data'] = $this->Tratamiento->consultarProlongado($_SESSION['cedula']);
			$this->load->view ( 'bienestarsocial/comun/carta_aval/inicio', $data );
		}else{
			$this->salir();
			exit;
		}	
	}

	/**
	 * Generar Codigo para una cita
	 *
	 * @access  public
	 * @return html
	 */
	public function generarCitaTratamientoProlongado($id = ''){
		$this->load->model('saman/Solicitud');
		echo $this->Solicitud->generarCitaTratamientoProlongado();
	}


	/**
	 * Generar solicitud de medicamentos
	 *
	 * @access  public
	 * @return html
	 */
	public function adjuntarProlongado(){
		if(isset($_SESSION['cedula'])){
			$this->load->model('saman/Tratamiento');
			$id = (!isset($_POST['id'])) ?  $_SESSION['cedula'] : $_POST['id'];
			$data['data'] = $this->Tratamiento->consultarProlongado($id);
			if(isset($data['data']->rs[0])){
				$data['nomb'] = $_POST['nomb'];				
				$this->load->view ( 'bienestarsocial/comun/tratamiento/frm/datos',$data);				
			}else{
				$this->index();
			}
		}else{
			
			$this->salir();
			exit;
		}	
	}

	/**
	 * listar medicamentos de un tratamiento o patologia
	 *
	 * @access  public
	 * @return json
	 */
	public function listarKitDetalle(){	
		if(isset($_SESSION['cedula'])){	
			$this->load->model('saman/Tratamiento');
			echo json_encode($this->Tratamiento->listarKitDetalle($_GET['id'], $_GET['diag'])->rs);			
		}else{			
			$this->salir();
			exit;
		}	
	}


	/**
	 * Generar solicitud de medicamentos
	 *
	 * @access  public
	 * @return html
	 */
	public function medicamentos(){
		$this->load->model('saman/Solicitud');
		$data['data'] = $this->Solicitud->listarMedicamentos($_SESSION['cedula']);
		$this->load->view ( 'bienestarsocial/medicamentos', $data );
	}






	/* 
	| ------------------------------------------------------------
	|	Control de Acciones
	| ------------------------------------------------------------
	*/



	/**
	 * Listar un producto o medicamento según lo declare un usuario
	 *
	 * @access  public
	 * @param string
	 * @return json 
	 */
	public function listarMedicamentosBADAN($pr = ''){		
		$this->load->model("fisico/maestroproducto", "Producto");
		print($this->Producto->listarExistenciaProductosSaman($pr));
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
	 * Listar un producto o medicamento de FarmaIPSFA
	 *
	 * @access  public
	 * @param string
	 * @return json 
	 */
	function listarMedicamentosFarmaIpsfa($pr = ''){
		$this->load->model("fisico/maestroproducto", "Producto");
		print($this->Producto->consultarFarmaIpsfa($pr));
	}

	
	/* 
	| ------------------------------------------------------------
	|	Metodos de Asignación, Selección y Eliminación del Carro
	| ------------------------------------------------------------
	*/
	/**
	 * Agregar un Medicamento al Carro
	 *
	 * @access  public
	 * @return string
	 */
	public function AgregarProductosCarrito(){
        $this->Carro->registrar($_POST);
	}

	/**
	 * Agregar un Medicamento al Carro
	 *
	 * @access  public
	 * @return mixed 
	 */
	public function EliminarProductosCarrito(){
		$this->Carro->eliminar($_POST['rowid']);		
	}

	/**
	 * Agregar un Medicamento al Carro
	 *
	 * @access  public
	 * @return mixed 
	 */
	public function LimipiarProductosCarrito(){
		$this->Carro->limpiar();
	}

	/*
	| ------------------------------------------------------------	
	| TESTS
	| Listar todos los reembolsos pendiente por personas
	| ------------------------------------------------------------
	*/

	/**
	 * Listar Casos generales de Bienestar Social
	 *
	 * @access  public
	 * @return mixed 
	 */
	public function listarCasosBienestar(){
		if(isset($_SESSION['cedula'])){
			print("<pre>");
			$this->load->model('saman/reembolso', 'Reembolso');
			print_r($this->Reembolso->listarCedula($_SESSION['cedula']));
		}else{
			$this->salir();
			exit;
		}	
	}

	/**
	 * Consultar Persona
	 *
	 * @access  public
	 * @return Militar
	 */
	function ConsultarPersona(){
		if(isset($_SESSION['cedula'])){
			$this->load->model('saman/Militar', 'Militar');
			$this->Militar->consultar('8579025');
			
			$this->load->model('saman/Solicitud', 'Solicitud');
			print('<pre>');
			$Militar = $this->Solicitud->importarSolicitudesSaman($this->Militar);
			print_r($this->Militar);

			
		}else{
			$this->salir();
			exit;
		}	

	}

	/**
	* Continuar Bienestar Reembolso contruye interfaz
	*
	* @access public
	* @return mixed
	*/
	public function continuarReembolso(){
		if(isset($_SESSION['cedula'])){
			if(isset($_POST['codigo'])){
				$this->load->model('saman/Militar');
				$this->load->model('saman/CodigoArea');
				$this->load->model('saman/Concepto');
				$this->load->model('utilidad/Semillero');	
				$this->load->model('saman/Solicitud');
				$this->Semillero->obtener($_POST['codigo'], $_SESSION['cedula'], 'REM');
				$valor = $this->Solicitud->consultar($this->Semillero->codigo);
				$_SESSION['back'] = 1;


				if($this->Semillero->estatus == 1 && $valor == 1){
					$this->adjuntos($this->Semillero->codigo, 1);				
				}else{
					$this->Militar->consultar($_SESSION['cedula']);
					$data['CodigoArea'] = $this->CodigoArea->listar()->rs;
					$data['Militar'] = $this->Militar;
					$data['Concepto'] = $this->Concepto->listar()->rs;
				
					$data['Codigo'] = $this->Semillero->codigo;	
					$this->load->view ( 'bienestarsocial/comun/reembolso/inicio', $data);
				}				
			}else{
				header('Location: ' . base_url() . 'index.php/BienestarSocial/bienestar/1');
			}
		}else{
			header('Location: ' . base_url() . 'index.php/BienestarSocial/bienestar/1');
		}	
	}

	/**
	 * Salvar una solicitud de reembolso
	 *
	 * @access public
	 * @return mixed 
	 */
	public function salvarReembolso(){
		if(isset($_SESSION['cedula'])){
			$this->load->model('saman/Solicitud', 'Solicitud');
			//$imagen = $this->Imagen->Salvar();
			$Solicitud = array('solicitud' => $_POST['Solicitud'], 'banco' => $_POST['banco'], 'responsable' => $_SESSION['nombreRango']);
			$imagen = array(); //Listado de Imagenes Subidas
			$arg = array(
				'codigo' => $_SESSION['cedula'],
				'numero' => $_POST['Codigo'], 
				'certi' => md5($_SESSION['cedula']), 
				'detalle' => json_encode($Solicitud), //Esquema Json Opcional
				'recipes' => '',
				'fecha' => 'now()', 
				'tipo' => 1, 
				'estatus' => 0,
				'fcita' => date('Y-m-j')
			);
			
			$this->Solicitud->crear($arg);
			//print_r($arg);
		}else{
			$this->salir();
			exit;
		}	
		
	}

	/**
	* Continuar Bienestar Ayuda contruye interfaz
	*
	* @access public
	* @return mixed
	*/
	public function continuarApoyo(){
		if(isset($_SESSION['cedula'])){
			if(isset($_POST['codigo'])){
				$this->load->model('saman/Militar');
				$this->load->model('saman/CodigoArea');
				$this->load->model('saman/Concepto');
				$this->load->model('utilidad/Semillero');	
				$this->load->model('saman/Solicitud');
				$this->Semillero->obtener($_POST['codigo'], $_SESSION['cedula'], 'APO');
				$valor = $this->Solicitud->consultar($this->Semillero->codigo);
				
				if($this->Semillero->estatus == 1 && $valor == 1){
					$this->adjuntos($this->Semillero->codigo, 2);				
				}else{
					$this->Militar->consultar($_SESSION['cedula']);
					$data['CodigoArea'] = $this->CodigoArea->listar()->rs;
					$data['Militar'] = $this->Militar;
					$data['Concepto'] = $this->Concepto->listar()->rs;
				
					$data['Codigo'] = $this->Semillero->codigo;	
					$this->load->view ( 'bienestarsocial/comun/apoyo/inicio', $data);
				}
			}else{
				header('Location: ' . base_url() . 'index.php/BienestarSocial/index');
			}	
			
		}else{
			$this->salir();
			exit;
		}	
	}

	/**
	 * Salvar una solicitud de Apoyo
	 *
	 * @access public
	 * @return mixed 
	 */
	public function salvarApoyo(){
		if(isset($_SESSION['cedula'])){
			$this->load->model('saman/Solicitud', 'Solicitud');
			//$imagen = $this->Imagen->Salvar();
			$Solicitud = array('solicitud' => $_POST['Solicitud'], 'responsable' => $_SESSION['nombreRango']);
			$imagen = array(); //Listado de Imagenes Subidas
			$arg = array(
				'codigo' => $_SESSION['cedula'],
				'numero' => $_POST['Codigo'], 
				'certi' => md5($_SESSION['cedula']), 
				'detalle' => json_encode($Solicitud), //Esquema Json Opcional
				'recipes' => '',
				'fecha' => 'now()', 
				'tipo' => 2, 
				'estatus' => 0,
				'fcita' => date('Y-m-j')			
			);		
			$this->Solicitud->crear($arg);
		}else{
			$this->salir();
			exit;
		}	
	}

	/**
	 * Permite imprimir hojas de reembolso y apoyo
	 * @return string
	 */	
	public function imprimirHoja($codigo, $url){
		if(isset($_SESSION['cedula'])){
			$this->load->model('saman/Solicitud', 'Solicitud');
			$this->load->model('saman/Militar', 'Militar');
			$this->Militar->consultar($_SESSION['cedula']);	

			$arr['Militar'] = $this->Militar;
			$arr['Codigo'] = $codigo;
			$arr['Solicitud'] = $this->Solicitud->listarSolicitudes($arr['Codigo']);
			
			if($url == 1){			
				$this->load->view('bienestarsocial/comun/reembolso/imp/plantilla', $arr);
			}else{
				$this->load->view('bienestarsocial/comun/apoyo/imp/plantilla', $arr);
			}
		}else{
			$this->salir();
			exit;
		}	
	}


	/**
	 * Salvar Anomalia Media
	 *
	 * @access public
	 * @return string
	 */
	function SalvarAnomaliaMedia(){	
		if(isset($_SESSION['cedula'])){
			$this->load->model('utilidad/Anomalia');
			$obj = $this->Anomalia->media( $_SESSION['oid'], json_encode($_POST));
			$msj = "Nos estaremos comunicando con usted a la brevedad posible.";
			if($obj->code !=0) $msj = "Por favor llamar a: ";
			echo $msj;
		}else{
			$this->salir();
			exit;
		}	
	}

	/**
	 * Guardar Solicitud de Medicamentos
	 *
	 * @access  public
	 * @return mixed 
	 */
	function SalvarSolicitudMedicamentos($tipo = ''){
		if(isset($_SESSION['cedula'])){

			
			$this->load->model('saman/Solicitud');
			$this->load->model('comun/Archivo', 'Archivo');
			$this->load->model('utilidad/Correo', 'Correo');
			$codigo = $this->generarCodigo('3','MED');
			$this->Archivo->salvar(4, $_FILES, $codigo);

			
			$detalle = $this->Carro->salvarPedido();
			//$imagen = $this->Imagen->Salvar();
			
			$imagen = array(); //Listado de Imagenes Subidas
			$arr = array(
				'codigo' => $_SESSION['cedula'],
				'numero' => $codigo,
				'certi' => md5($_SESSION['cedula']), 
				'detalle' => json_encode($detalle), //Esquema Json Opcional
				'recipes' => $_POST['observa'] ,
				'fecha' => 'now()', 
				'tipo' => 3, 
				'estatus' => 1,
				'fcita' => date('Y-m-j')
			);
			$obj = $this->Solicitud->crear($arr);
			$msj = "Nos estaremos comunicando con usted a la brevedad posible.";
			$this->load->model('utilidad/Correo', 'Correo');
			$this->Correo->para = $_SESSION['correo'];
			/**
			$this->Correo->cuerpo = 'Hola, ' . $_SESSION['nombreRango'] . '.<br>
				Usted ha realizado una solicitud por medicamentos sera procesada por nuestros analistas
				<br><br>
				IPSFA en linea Optimizando tu bienestar...';
			**/

			$this->Correo->cuerpo = $this->plantillaMensajeCorreo($_SESSION['nombreRango'], 'MEDICAMENTOS' ,$codigo);
			$this->Correo->gerencia = 'Gerencia de Bienestar Social';
			$this->Correo->titulo = $_SESSION['nombreRango'];
			$this->Correo->enviar();

			if($obj->code !=0) $msj = "Por favor llamar a: ";
			$this->LimipiarProductosCarrito();
			echo $msj;
			
			

		}else{
			$this->salir();
			exit;
		}	
	}



	/**
	 * Permite generar un codigo de planillas
	 *
	 * @access public
	 * @return string
	 */	
	public function generarCodigo($tipo = "", $obs = ""){
		if(isset($_SESSION['cedula'])){
			$this->load->model('utilidad/Semillero', 'Semillero');
			$this->Semillero->obtener($tipo, $_SESSION['cedula'], $obs);
			return $this->Semillero->codigo;
		}else{
			$this->salir();
			exit;
		}
	}


	/**
	 * Permite generar un codigo de planillas
	 *
	 * @access public
	 * @return string
	 */	
	public function generarCita(){
		if(isset($_SESSION['cedula'])){
			$this->load->model('comun/Cita');
			$this->load->model('utilidad/Correo');
			if(isset($_POST['id'])){
				$codigo = $this->Cita->generar($_POST);
				$this->Correo->para = $_SESSION['correo'];
				$texto = 'CITA PARA TRATAMIENTO PROLONGADO';
				$this->Correo->cuerpo = $this->plantillaMensajeCorreo($_SESSION['nombreRango'], $texto , $codigo);
				$this->Correo->gerencia = 'Gerencia de Bienestar Social';
				$this->Correo->titulo = $_SESSION['nombreRango'];
				$this->Correo->enviar();
				//$this->citas();
				header('Location: ' . base_url() . 'index.php/BienestarSocial/citas');
			}else{
				$this->index();
			}
			
			
		}else{
			$this->salir();
			exit;
		}	
	}



	function plantillaMensajeCorreo($nombre, $tipo, $codigo){
		$msj = '
			Estimado Afiliado(a)  ' . $nombre . '. <br><br>

			Usted ha realizado una solicitud por  ' . $tipo . ' bajo el c&oacute;digo  ' . $codigo . ' la cual ser&aacute; procesada  por nuestros
			analistas de Bienestar y Seguridad Social. Para mayor informaci&oacute;n puede 
			mantenerse en contacto a trav&eacute;s de nuestro portal web 
			http://www.ipsfa.gob.ve, o le estaremos notificando a trav&eacute;s de su correo electr&oacute;nico.<br><br>

			.- IPSFA jam&aacute;s le enviar&aacute; un enlace donde le solicite informaci&oacute;n de claves de acceso a IPSFA en l&iacute;nea, cuentas bancarias, ni correo electr&oacute;nico personal.<br>
			.- IPSFA s&oacute;lo env&iacute;a correos personalizados por ejemplo: CNEL. BOLIVAR SIMON.<br>
			.- IPSFA nunca le enviar&aacute; un correo en el que se use su direcci&oacute;n en el encabezado del mensaje, por ejemplo: Estimado afiliado Sr.(a): juan.cristobal.arocha@gmail.com.<br>
			.- Esta es una cuenta no monitoreada. No responda o reenv&iacute;e correos a esta cuenta.<br>
			Ud. dispone de los siguientes correos en caso que requiera reportar cualquier situaci&oacute;n irregular: <br><br>

			Todos los documentos reposaran en su expediente f&iacute;sico del Instituto.<br>
			IPSFA en línea Optimizando tu Bienestar.';

		return $msj;

	}


	function cancelarSolicitud($cod = ''){
		$this->load->model('saman/Solicitud');
		$this->Solicitud->modificar($cod, 9); // Cambio General del Estatus del caso
		
	}



	/**
	 * Salir del Sistema
	 *
	 * @access  public
	 * @return mixed
	 */	
	public function salir() {
		session_destroy();
		
		//header('Location: ' . base_url() . 'index.php/Login');
		header('Location: http://www.ipsfa.gob.ve/NUEVO/ipsfaNet/init.session.IPSFA.web/php.Source/projects/admin/app/actions/enlace/iniciarSesion/class.DestroySesionActions.php');
		
		
	}

	function iniciarTablas(){

		$this->load->model('comun/Dbipsfa');
		$sCon = "DROP TABLE bss.archivo;
		CREATE TABLE bss.archivo
		(
		  oid serial NOT NULL,
		  codigo character varying(20),
		  nombre character varying(250),
		  coddoc integer,
		  fecha date
		);
		COMMENT ON TABLE bss.archivo IS 'Registra todos los archivos del sistema';
		COMMENT ON COLUMN bss.archivo.oid IS 'Indentificador clave y unico e incremetal';
		COMMENT ON COLUMN bss.archivo.codigo IS 'Origen del documento Solicitud (Responsable)';
		COMMENT ON COLUMN bss.archivo.nombre IS 'Nombre del documento con su extención';
		COMMENT ON COLUMN bss.archivo.coddoc IS 'Releción::tdocumento';";
		$this->Dbipsfa->consultar($sCon);

		$sCon = "DROP TABLE bss.semillero;
		CREATE TABLE bss.semillero
		(
		  oid serial NOT NULL,
		  codigo character varying(16),
		  certi character varying(32),
		  fecha timestamp without time zone,
		  tipo bigint,
		  observacion character varying(250) NOT NULL,
		  estatus bigint,
		  CONSTRAINT semillero_pkey PRIMARY KEY (oid)
		);
		COMMENT ON TABLE bss.semillero IS 'Generador de codigos';
		COMMENT ON COLUMN bss.semillero.oid IS 'Indentificador clave y unico e incremetal';
		COMMENT ON COLUMN bss.semillero.codigo IS 'Indentificador interno de una solicitud';
		COMMENT ON COLUMN bss.semillero.certi IS 'Marca uncica de evaluacion de la solicitud';
		COMMENT ON COLUMN bss.semillero.fecha IS 'Momento preciso en el cual se hace una solicitud';
		COMMENT ON COLUMN bss.semillero.tipo IS 'Indicador de la Solicitud (1 - N) ::tipo_solicitud';
		COMMENT ON COLUMN bss.semillero.observacion IS 'Observaciones generales clave de apoyo unica';
		COMMENT ON COLUMN bss.semillero.estatus IS 'Estatus de la solicitud (0-N)';";
		$this->Dbipsfa->consultar($sCon);

		$sCon = "DROP TABLE bss.solicitud;
		CREATE TABLE bss.solicitud
		(
		  oid serial NOT NULL,
		  codigo character varying(16) NOT NULL,
		  numero character varying(16) NOT NULL,
		  certi character varying(32),
		  detalle text,
		  recipes text,
		  fecha timestamp without time zone,
		  tipo bigint,
		  estatus bigint,
		  fcita date,
		  CONSTRAINT numero_pkey PRIMARY KEY (numero)
		);
		COMMENT ON TABLE bss.solicitud IS 'Solicitudes del sistema';
		COMMENT ON COLUMN bss.solicitud.oid IS 'Indentificador clave y unico e incremetal';
		COMMENT ON COLUMN bss.solicitud.codigo IS 'Establece el numero del solicitante (Cédula)';
		COMMENT ON COLUMN bss.solicitud.numero IS 'Indentificador interno de una solicitud';
		COMMENT ON COLUMN bss.solicitud.certi IS 'Marca uncica de evaluacion de la solicitud';
		COMMENT ON COLUMN bss.solicitud.detalle IS 'Descripcion JSON de los casos segun su forma';
		COMMENT ON COLUMN bss.solicitud.recipes IS 'Descripcion JSON de los casos segun su forma';
		COMMENT ON COLUMN bss.solicitud.fecha IS 'Momento preciso en el cual se hace una solicitud';
		COMMENT ON COLUMN bss.solicitud.tipo IS 'Indicador de la Solicitud (1 - N) ::tipo_solicitud';
		COMMENT ON COLUMN bss.solicitud.estatus IS 'Estatus de la solicitud (0-N)';
		COMMENT ON COLUMN bss.solicitud.fcita IS 'Fecha estimada del evento';";

		$this->Dbipsfa->consultar($sCon);


		echo "exito";
	}


	function jsonObject(){
		echo "<pre>";
		$this->load->model('comun/Dbipsfa', 'Dbipsfa');
		$obj = $this->Dbipsfa->consultar('SELECT * FROM session.tbl_respuesta WHERE oid=34022');
		$doc = json_decode($obj->rs[0]->doc);

		print_r($doc);
	}

}




