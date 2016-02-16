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

  var $celular = '';

  var $telefono = '';

  var $empresa = '';

  var $pagina = '';

  var $clave;

  var $perfil;

  var $listaPrivilegios = array();

  var $listaDependientes = array();

  function __construct() {
    parent::__construct();
  }

  /**
   *
   */
  function registrar() {
    $this -> load -> database();
    $data = $this -> mapearObjeto();
    $this -> db -> insert('usuario', $data);
    $arr[] = array('err' => $this -> db -> _error_number(), 'msj' => $this -> db -> _error_message());
    $codigo = $this -> existe($this -> cedula, $this -> db);
    if ($codigo > 0)
      $this -> db -> insert('_usuarioperfil', array('oidu' => $codigo, 'oidp' => 2));
    $arr[] = array('err' => $this -> db -> _error_number(), 'msj' => $this -> db -> _error_message());
    $this -> db -> close();
    unset($this -> db);
    return $arr;
  }

  /**
   * Definir el arreglo de la insercion a la base de datos
   *
   * @return array
   */
  private function mapearObjeto() {
    $data = array( //
    'oid' => $this -> identificador, //
    'tipo' => $this -> tipo, //
    'cedu' => $this -> cedula, //
    'nomb' => $this -> nombre, //
    'apel' => $this -> apellido, //
    'dire' => $this -> direccion, //
    'seud' => $this -> sobreNombre, //
    'clav' => md5($this -> clave), //
    'corr' => $this -> correo, //
    'celu' => $this -> celular, //
    'telf' => $this -> telefono, //
    'empr' => $this -> empresa, //
    'perf' => $this -> perfil, //
    'pagi' => $this -> pagina, //
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
  function existe($cedula, $db) {
    $codigo = -1;
    $consulta = 'SELECT oid FROM usuario WHERE cedu =\'' . $cedula . ' \' LIMIT 1';
    $rs = $db -> query($consulta) -> result();
    foreach ($rs as $clv => $val) {
      $codigo = $val -> oid;
    }
    return $codigo;
  }


  function validar() {
    $valor = FALSE;
    if ($this -> _evaluarSobreNombre() == TRUE && $this -> clave != '') {
      $rs = $this -> conectar();
      if (count($rs) > 0) {
        foreach ($rs as $fila => $valor) {
          $this -> perfil = $valor -> perfil;
          $this -> nombre = $valor -> nombre;
          $this -> correo = $valor -> correo;
          $this -> identificador = $valor -> oid;
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
    $this -> load -> database();
    $consulta = 'SELECT usuario.oid, usuario.nomb AS nombre, apel AS apellido, corr AS correo, perf AS perfil 
    FROM usuario 
				 WHERE seud=\'' . $this -> sobreNombre . '\' AND clav=\'' . $this -> claveEncriptada() . '\' LIMIT 1;';
    $rs = $this -> db -> query($consulta);
    $this -> db -> close();
    unset($this -> db);
    return $rs -> result();
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
