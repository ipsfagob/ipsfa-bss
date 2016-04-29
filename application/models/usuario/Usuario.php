<?php
if (!defined('BASEPATH'))
  exit('No direct script access allowed');
/**
 * Seguridad MamonSoft C.A
 * 
 *
 * @package mamonsoft.modules.seguridad
 * @subpackage usuario
 * @author Carlos Peña
 * @copyright	Derechos Reservados (c) 2014 - 2015, MamonSoft C.A.
 * @link		http://www.mamonsoft.com.ve
 * @since Version 1.0
 *
 */
class Usuario extends CI_Model {

  var $identificador = NULL;

  /**
   * Cedula o Registro de Informacion Fiscal (RIF)
   * @var int(11)
   */
  var $cedula;

  /**
   * V- Venezolano,  J- Juridico, G- Gubernamental
   * @var char(1)
   */
  var $tipo;


  /**
   * 
   * @var string
   */
  var $nombre;


  /**
   * 
   * @var string
   */
  var $apellido;

  /**
   * 
   * @var string
   */
  var $direccion = '';

  /**
   * 
   * @var string
   */
  var $sobreNombre;

  /**
   * 
   * @var string
   */
  var $correo = '';

  /**
   * 
   * @var string
   */
  var $respuesta = '';

  /**
   * 
   * @var string
   */
  var $telefono = '';

  /**
   * 
   * @var string
   */
  var $empresa = '';

  /**
   * 
   * @var string
   */
  var $pagina = '';

  /**
   * 
   * @var string
   */
  var $clave;

  /**
   * 
   * @var integer
   */
  var $estatus = 0;

  /**
   * 
   * @var string
   */
  var $perfil;

  /**
   * 
   * @var array
   */
  var $listaPrivilegios = array();

  /**
   * 
   * @var array
   */
  var $listaDependientes = array();



  function __construct() {
    parent::__construct();
    $this->load->model('comun/Dbipsfa');
  }

  /**
   *
   */
  function registrar() {
    $data = $this -> mapearObjeto();
    $this->Dbipsfa->insertarArreglo('bss.usuario', $data);
    
    $val = FALSE;
    $codigo = $this -> existe();
    if ($codigo > 0){
      $this->Dbipsfa->insertarArreglo('bss._usuarioperfil', array('oidu' => $codigo, 'oidp' => 2));
      $val = TRUE;
    }
    return $val;
  }

  /**
   * Definir el arreglo de la insercion a la base de datos
   *
   * @access private
   * @return array
   */
  private function mapearObjeto() {
    $data = array( //
      //'oid' => $this -> identificador, //
      'tipo' => $this->tipo, //
      'cedu' => $this->cedula, //
      'nomb' => $this->nombre, //
      'seud' => $this->sobreNombre, //
      'clav' => md5($this->clave), //
      'corr' => $this->correo,
      'resp' => $this->respuesta,
      'empr' => $this->empresa, //
      'perf' => $this->perfil, //
      'pagi' => $this->pagina, //
      'esta' => $this->estatus
    );
    return $data;
  }

  /**
   * Verifica si exite un usuario y retorna su OID
   *
   * @access public
   * @param string
   * @param CI_DB
   * @return int
   */
  public function existe() {
    $codigo = -1;
    $consulta = 'SELECT oid FROM bss.usuario WHERE cedu =\'' . $this -> cedula . ' \' LIMIT 1';
    $obj = $this->Dbipsfa->consultar($consulta);
    foreach ($obj->rs as $clv => $val) {
      $codigo = $val -> oid;
    }
    return $codigo;
  }

  /**
   * Definir el arreglo de la insercion a la base de datos
   *
   * @access public
   * @return bool
   */
  public function validar() {
    $valor = FALSE;
    if ($this -> _evaluarSobreNombre() == TRUE && $this -> clave != '') {
      $rs = $this -> conectar();
      if ($rs->cant != 0) {
        foreach ($rs->rs as $fila => $valor) {
          $this->nombre = $valor->nomb;
          $this->cedula = $valor->cedu;
          $this->correo = $valor->corr;
          $this->estatus = $valor->esta;
          $this->perfil = $valor->perf;
        }
        $valor = TRUE;
      }
    }
    return $valor;
  }

  /**
   * Verificar que el Sobre Nombre no tenga caracteres parentesis o corchetes
   *
   * @return boolean
   */
  
  protected function _evaluarSobreNombre() {
  	return preg_match("/^([-a-z0-9_-])+$/i", $this -> sobreNombre);
  }
  
  protected function _evaluarCorreo() {
  	return preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $this -> correo);
  }
  
  protected function _claveEncriptada() {
  	return md5($this -> clave);
  }
  
  function conectar() {
    
    $consulta = 'SELECT *  
    FROM bss.usuario
    WHERE (seud=\'' . $this -> sobreNombre . '\' OR corr=\'' . $this -> sobreNombre . '\' OR cedu=\'' . $this -> sobreNombre . '\') AND clav=\'' . $this -> _claveEncriptada() . '\' LIMIT 1;';
    $obj = $this->Dbipsfa->consultar($consulta);
    return $obj;
  }

  function cargarPrivilegios() {
    return $this -> listaPrivilegios;
  }

  function cargarDependientes() {
    return $this -> listaDependientes;
  }

  function validarCorreo($sha){
    $sConsulta = "UPDATE bss.usuario SET esta=1 WHERE resp='" . $sha . "';";
    $obj = $this->Dbipsfa->consultar($sConsulta);
    return TRUE;
  }

  function listar(){
    $sConsulta = "DELETE FROM bss.usuario WHERE oid=3";
    $this->Dbipsfa->consultar($sConsulta);
    $sConsulta = "SELECT * FROM bss.usuario";
    $obj = $this->Dbipsfa->consultar($sConsulta);

    
    return $obj;
  }

  /**
  * Ver la ultima conexion de un usuario
  *
  * @access public
  * @return string
  */
  function ultimaConexion(){
    $sConsulta = 'SELECT * FROM bss.traza WHERE cedu=\'' . $this->cedula . '\' ORDER BY fech  DESC LIMIT 1;';
    $obj = $this->Dbipsfa->consultar($sConsulta);
    foreach ($obj->rs as $c => $v) {
      $fecha = $v->fech;
    }
    return substr($fecha, 0 ,19);
  }

  function __destruct() {

  }

}
?>
