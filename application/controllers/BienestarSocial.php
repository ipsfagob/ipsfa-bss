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
//24775075 | 11953710 | 9348067 | 6547344 | 2664801 | 2615359 | 10156786 | 12633177 | 9241417 | 7829589 |17328217
define('_CEDULA', '11400652');

class BienestarSocial extends CI_Controller {

	var $_PRIVADO = TRUE;

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this -> load -> model('carro/mcarro','Carro');
		$this->load->library('session');		
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
	function index($cedula = null) {
		if(isset($_SESSION['cedula'])){
			$this->validarUsuario($_SESSION['cedula']);	
		}else{
			if(isset($cedula)){
				$this->validarUsuario($cedula);	
			}else{
				$this->salir();
				echo "Debe iniciar session";
				exit;
			}
		}

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
			echo "Debe iniciar session";
			exit;
		}
	}
	
	/**
	 * Vista de las Bienestar Ayudas
	 * @param string url
	 * @return html
	 */
	
	function bienestar($url = '') {
		if(isset($_SESSION['cedula'])){
			$data['url'] = $url; 
			$this->load->view ( 'bienestarsocial/bienestar', $data);
		}else{
			$this->salir();
			echo "Debe iniciar session";
			exit;
		}
	}
	
	/**
	 * Vista de las Bienestar Ayudas
	 * @return html
	 */
	function pendientes() {
		if(isset($_SESSION['cedula'])){
			$this->load->model('saman/Militar', 'Militar');
			$this->Militar->consultar($_SESSION['cedula']);
			
			$this->load->model('saman/Solicitud', 'Solicitud');		
			$Militar = $this->Solicitud->importarSolicitudesSaman($this->Militar)->Militar;		
			
			$data['Militar'] = $Militar->Solicitudes;
			$this->load->view ( 'bienestarsocial/pendientes', $data );
		}else{
			$this->salir();
			echo "Debe iniciar session";
			exit;
		}
	}

	/**
	 * Vista Pagina Farmacia
	 * @return html
	 */
	function ayudas() {
		if(isset($_SESSION['cedula'])){
			$this->load->model('saman/Solicitud', 'Solicitud');			
			$data['data'] = $this->Solicitud->listarPorCodigo($_SESSION['cedula']);
			$this->load->view ( 'bienestarsocial/ayuda', $data);
		}else{
			$this->salir();
			echo "Debe iniciar session";
			exit;
		}
	}

	
	/**
	 * Vista Pagina Farmacia
	 * @return html
	 */
	function farmacia($id) {
		if(isset($_SESSION['cedula'])){
			if($id == "me"){
				$this->load->view ( 'bienestarsocial/sidrofan' );
			}else{				
				$this->load->view ( 'bienestarsocial/badan' );
			}

		}else{
			$this->salir();
			echo "Debe iniciar session";
			exit;
		}
	}

	/**
	 * Vista Pagina Farmacia
	 * @return html
	 */
	function citas() {
		if(isset($_SESSION['cedula'])){
			$this->load->model('comun/Cita');	
			$data['cita'] = $this->Cita->consultar($_SESSION['cedula']);
			$this->load->view ( 'bienestarsocial/citas', $data );
		}else{
			$this->salir();
			echo "Debe iniciar session";
			exit;
		}
	}

	/**
	 * Vista Pagina Carro de Pedidos
	 * @return html
	 */
	function carro(){
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
			echo "Debe iniciar session";
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
			$this->load->view ( 'bienestarsocial/solicitud', $data );
		}else{
			$this->salir();
			echo "Debe iniciar session";
			exit;
		}
	}

	/**
	 * Subir multiples archivos al sistema
	 *
	 * @access  public
	 * @return html
	 */
	public function subirArchivos(){
		if(isset($_SESSION['cedula'])){
			$this->load->model('comun/Archivo', 'Archivo');
			$this->Archivo->salvar($_POST['url'], $_FILES, $_POST['codigo']);
			$this->load->view ( 'bienestarsocial/principal');
		}else{
			$this->salir();
			echo "Debe iniciar session";
			exit;
		}		
	}

	/**
	 * Generar solicitud de medicamentos
	 *
	 * @access  public
	 * @return html
	 */
	public function tratamiento(){
		if(isset($_SESSION['cedula'])){
			$this->load->model('saman/Tratamiento');
			$data['data'] = $this->Tratamiento->consultarProlongado($_SESSION['cedula']);
			$this->load->view ( 'bienestarsocial/comun/tratamiento/inicio', $data );
		}else{
			$this->salir();
			echo "Debe iniciar session";
			exit;
		}	
	}

	public function adjuntarProlongado(){
		if(isset($_SESSION['cedula'])){
			$this->load->model('saman/Tratamiento');
			$data['data'] = $this->Tratamiento->consultarProlongado($_SESSION['cedula']);
			$this->load->view ( 'bienestarsocial/comun/tratamiento/frm/datos',$data);
		}else{
			echo "Debe iniciar session";
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


	/**
	 * Salir del Sistema
	 *
	 * @access  public
	 * @return mixed
	 */	
	public function salir() {
		session_destroy();
		//$this->index();
		header('Location: http://192.168.12.195/html/web/web/ipsfaNet/vista/vmenu.php');
		echo "Debe iniciar session";
		exit;
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


	
	/* 
	| ------------------------------------------------------------
	|	Metodos de Asignación, Selección y Eliminación del Carro
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
		print($this->Producto->listarExistenciaProductosSidroFan($pr));
	}

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
			echo "Debe iniciar session";
			exit;
		}	
	}


	function ConsultarPersona(){
		if(isset($_SESSION['cedula'])){
			$this->load->model('saman/Militar', 'Militar');
			$this->Militar->consultar($_SESSION['cedula']);
			
			$this->load->model('saman/Solicitud', 'Solicitud');
			print('<pre>');
			$Militar = $this->Solicitud->importarSolicitudesSaman($this->Militar);
			print_r($this->Militar);
		}else{
			echo "Debe iniciar session";
			exit;
		}	

	}
	function listarSolicitudes(){


	}

	/**
	* Continuar Bienestar Reembolso contruye interfaz
	*
	* @access public
	* @return mixed
	*/
	public function continuarReembolso(){
		if(isset($_SESSION['cedula'])){
			$this->load->model('saman/Militar', 'Militar');
			$this->load->model('saman/CodigoArea', 'CodigoArea');
			$this->load->model('saman/Concepto', 'Concepto');	

			$this->Militar->consultar($_SESSION['cedula']);
			$data['CodigoArea'] = $this->CodigoArea->listar()->rs;
			$data['Militar'] = $this->Militar;
			$data['Concepto'] = $this->Concepto->listar()->rs;
			$data['Codigo'] = $this->generarCodigo($_POST['codigo'], $_POST['obs']);		
			$this->load->view ( 'bienestarsocial/comun/reembolso/inicio', $data);
		}else{
			echo "Debe iniciar session";
			exit;
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
			$imagen = array(); //Listado de Imagenes Subidas
			$arg = array(
				'codigo' => $_SESSION['oid'],
				'numero' => $_POST['Codigo'], 
				'certi' => md5($_SESSION['oid']), 
				'detalle' => json_encode($_POST['Solicitud']), //Esquema Json Opcional
				'recipes' => '',
				'fecha' => 'now()', 
				'tipo' => 1, 
				'estatus' => 0			
			);
			
			$this->Solicitud->crear($arg);
			//print_r($arg);
		}else{
			echo "Debe iniciar session";
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
			$this->load->model('saman/Militar', 'Militar');
			$this->load->model('saman/CodigoArea', 'CodigoArea');
			$this->load->model('saman/Concepto', 'Concepto');	

			$this->Militar->consultar($_SESSION['cedula']);
			$data['CodigoArea'] = $this->CodigoArea->listar()->rs;
			$data['Militar'] = $this->Militar;
			$data['Concepto'] = $this->Concepto->listar()->rs;
			$data['Codigo'] = $this->generarCodigo($_POST['codigo'], $_POST['obs']);		
			$this->load->view ( 'bienestarsocial/comun/apoyo/inicio', $data);
		}else{
			echo "Debe iniciar session";
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
			$imagen = array(); //Listado de Imagenes Subidas
			$arg = array(
				'codigo' => $_SESSION['oid'],
				'numero' => $_POST['Codigo'], 
				'certi' => md5($_SESSION['oid']), 
				'detalle' => json_encode($_POST['Solicitud']), //Esquema Json Opcional
				'recipes' => '',
				'fecha' => 'now()', 
				'tipo' => 2, 
				'estatus' => 0			
			);		
			$this->Solicitud->crear($arg);
		}else{
			echo "Debe iniciar session";
			exit;
		}	
	}

	/**
	 * Permite imprimir hojas de reembolso y apoyo
	 * @return string
	 */	
	public function imprimirHoja($codigo){
		if(isset($_SESSION['cedula'])){
			$this->load->model('saman/Solicitud', 'Solicitud');
			$this->load->model('saman/Militar', 'Militar');
			$this->Militar->consultar($_SESSION['cedula']);	

			$arr['Militar'] = $this->Militar;
			$arr['Codigo'] = $this->generarCodigo($codigo, '');
			$arr['Solicitud'] = $this->Solicitud->listarSolicitudes($arr['Codigo']);
			
			if($codigo == 1){			
				$this->load->view('bienestarsocial/comun/reembolso/imp/plantilla', $arr);
			}else{
				$this->load->view('bienestarsocial/comun/apoyo/imp/plantilla', $arr);
			}
		}else{
			echo "Debe iniciar session";
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
			echo "Debe iniciar session";
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
			$this->Cita->generar();
			$this->citas();
		}else{
			echo "Debe iniciar session";
			exit;
		}	
	}

	/**
	 * 
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
			echo "Debe iniciar session";
			exit;
		}	
	}


	function SalvarSolicitudMedicamentos(){
		if(isset($_SESSION['cedula'])){
			$this->load->model('saman/Solicitud');
			$detalle = $this->Carro->salvarPedido();
			//$imagen = $this->Imagen->Salvar();
			$imagen = array(); //Listado de Imagenes Subidas
			$arr = array(
				'codigo' => $_SESSION['cedula'],
				'numero' => $this->generarCodigo('3','MED'),
				'certi' => md5($_SESSION['cedula']), 
				'detalle' => json_encode($detalle), //Esquema Json Opcional
				'recipes' => json_encode($imagen),
				'fecha' => 'now()', 
				'tipo' => 3, 
				'estatus' => 1
			);
			$obj = $this->Solicitud->crear($arr);
			$msj = "Nos estaremos comunicando con usted a la brevedad posible.";
			if($obj->code !=0) $msj = "Por favor llamar a: ";
			$this->LimipiarProductosCarrito();
			echo $msj . $obj->query;
		}else{
			echo "Debe iniciar session";
			exit;
		}	
	}



}




