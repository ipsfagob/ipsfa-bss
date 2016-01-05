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
class MCategoria extends CI_Model {

  var $identificador = NULL;

  var $nombre = '';

  function __construct() {
    if (!isset($this -> db)) {
      $this -> load -> database();
    }
  }

  function registrar() {
    $data = $this -> mapearObjeto();
    $this -> db -> insert('categoria', $data);
    $arr[] = array('err' => $this -> db -> _error_number(), 'msj' => $this -> db -> _error_message());
    return $arr;
  }

  function mapearObjeto() {
    $data = array('oid' => $this -> identificador, 'nomb' => $this -> nombre, 'imag' => $this -> imagen);
    return $data;
  }

  function listar() {
    $lista = 'SELECT oid, nomb, imag FROM categoria';
    $resultado = $this -> db -> query($lista);
    if ($this -> db -> _error_number() == 0)
      $rs = $resultado -> result();
    $arr[] = array('err' => $this -> db -> _error_number(), 'msj' => $this -> db -> _error_message(), 'rs' => $rs);
    return $arr;
  }
  
  function eliminar(){
    
  }
  
  function borrar(){
    $sCon = 'DELETE FROM categoria WHERE oid=' . $this->identificador;
    $this -> db -> query($sCon);
    
    $lista = 'SELECT * FROM producto WHERE cate=' . $this->identificador;
    $resultado = $this -> db -> query($lista);
    
    foreach ($resultado->result() as $sC => $sV) {
      $sCon = 'DELETE FROM producto WHERE oid=' . $sV->oid;
      $this -> db -> query($sCon);
      $sCon = 'DELETE FROM existencia WHERE oidp=' . $sV->oid;
      $this -> db -> query($sCon);  
      $sCon = 'DELETE FROM inventario WHERE oidp=' . $sV->oid;
      $this -> db -> query($sCon);
    }
    
  }

  function __destruct() {
    $this -> db -> close();
    unset($this -> db);
  }

}
?>