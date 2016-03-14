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

  var $nombre;

  var $apellido;

  var $direccion = '';

  var $sobreNombre;

  var $correo = '';

  var $respuesta = '';

  var $telefono = '';

  var $empresa = '';

  var $pagina = '';

  var $clave;

  var $estatus = 0;

  var $perfil = '';

  var $listaPrivilegios = array();

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
    $this->Dbipsfa->insertarArreglo('usuario', $data);
    
    $val = FALSE;
    $codigo = $this -> existe();
    if ($codigo > 0){
      $this->Dbipsfa->insertarArreglo('_usuarioperfil', array('oidu' => $codigo, 'oidp' => 2));
      $val = TRUE;
    }
    return $val;
  }

  /**
   * Definir el arreglo de la insercion a la base de datos
   *
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
   * @param string
   * @param CI_DB
   * @return int
   */
  public function existe() {
    $codigo = -1;
    $consulta = 'SELECT oid FROM usuario WHERE cedu =\'' . $this -> cedula . ' \' LIMIT 1';
    $obj = $this->Dbipsfa->consultar($consulta);
    foreach ($obj->rs as $clv => $val) {
      $codigo = $val -> oid;
    }
    return $codigo;
  }


  function validar() {
    $valor = FALSE;
    if ($this -> _evaluarSobreNombre() == TRUE && $this -> clave != '') {
      $rs = $this -> conectar();
      if ($rs->cant != 0) {
        foreach ($rs->rs as $fila => $valor) {
          $this->nombre = $valor->nomb;
          $this->cedula = $valor->cedu;
          $this->correo = $valor->corr;
          $this->estatus = $valor->esta;
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
    FROM usuario
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

  function __destruct() {

  }

}
?>
