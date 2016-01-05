<?php
if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * Coorporacion de Estampado
 * Carrito de Compras 01/02/2014
 * Solicitud de Mercacia
 *
 * @package estcorp
 * @subpackage fisico
 * @author Carlos Peña
 * @copyright Derechos Reservados (c) 2014 - 2015, GenProg C.A.
 * @link    http://www.solo-educacion.org
 * @since Version 1.0
 *
 */
class MAlmacen extends CI_Model {

  var $identificador = NULL;

  var $nombre = '';

  var $ubicacion = '';

  var $observacion = '';

  function __construct() {
    if (!isset($this -> db)) {
      $this -> load -> database();
    }
  }

  function registrar() {
    $data = $this->mapearObjeto();
    $this->db->insert('almacen', $data);
    $arr[] = array('err' => $this -> db -> _error_number(), 'msj' => $this -> db -> _error_message());
    return $arr; 
  }

  function mapearObjeto() {
    $data = array('oid' => $this -> identificador, 'nomb' => $this -> nombre, 'ubic' => $this -> ubicacion, 'obse' => $this -> observacion);
    return $data;
  }
  
  function listar() {
  	$lista = 'SELECT * FROM almacen';
  	$resultado = $this -> db -> query($lista);
  	if ($this -> db -> _error_number() == 0) $rs = $resultado -> result();
  	$arr[] = array('err' => $this -> db -> _error_number(), 'msj' => $this -> db -> _error_message(), 'rs' => $rs);
  	return $arr;
  }
  
  function anularOrdenPedido(){
    
  }
  
  function desincorporar(){
    
  }
  
  function eliminar(){
    
  }

  function cabeceraJSON(){
    $cabecera[1] = array("titulo" => "codigo", "atributos" => "width:70px;text-align:center;");
    $cabecera[2] = array("titulo" => "Nombre", "atributos" => "width:220px;text-align:center;");
    $cabecera[3] = array("titulo" => "Ubicacion", "atributos" => "width:120px;text-align:center;");
    $cabecera[4] = array("titulo" => "Observacion", "atributos" => "width:260px;text-align:center;");
    return $cabecera;
  }

  function __destruct() {
    $this->db->close();
    unset($this -> db);
  }

}
?>