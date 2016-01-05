<?php
if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * Carrito de Compras
 * Solicitud de Mercacia
 *
 * @package mamonsoft
 * @subpackage fisico
 * @author Carlos Peña
 * @copyright Derechos Reservados (c) 2014 - 2015, MamonSoft C.A.
 * @link    http://www.mamonsoft.com.ve
 * @since Version 1.0
 *
 */
class MOrden extends CI_Model {

  var $codigo = NULL;

  var $nombre;

  var $tipo;

  var $fechaSolicitud;

  function __construct() {
    parent::__construct();
    if (!isset($this -> db)) {
      $this -> load -> database();
    }

  }

  function generarPedido() {
    $orden = 0;
    if ($this -> tipo < 0) {
      $msj = 'Debe definir un tipo de orden 0: solicitud, 1: despacho, 2: entrega';
    } else {      
      $this -> codigo = $this -> obtenerUltimoCodgio();
      $data = $this -> mapearObjeto();
      $this -> db -> insert('orden', $data);
      $msj = $this -> db -> _error_message();
    }
    $arr[] = array('err' => $this -> db -> _error_number(), 'msj' => $msj);
    return $arr;
  }

  function obtenerUltimoCodgio() {
    $codigo = 0;
    $consulta = 'SELECT MAX(codi)+1 AS codigo FROM orden WHERE tipo =' . $this -> tipo;
    $resultado = $this -> db -> query($consulta);
    if ($this -> db -> _error_number() == 0) {
      $rs = $resultado -> result();
      foreach ($rs as $clv => $val) {
        $codigo = $val -> codigo;
      }
    }
    return $codigo;
  }

  function mapearObjeto() {
    if (is_null($this -> fechaSolicitud))
      $this -> fechaSolicitud = date("Y/m/d");
    $data = array(//
    'codi' => $this -> codigo, //
    'nomb' => $this -> nombre, //
    'tipo' => $this -> tipo, //
    'fech' => $this -> fechaSolicitud //
    );

    return $data;
  }

  function anularPedido() {
    $arr = $this->listar();
    $rs = $arr[0]['rs'];
    foreach ($rs as $clave => $valor) {
      
    }
    
  }

  function listar() {
    if (!is_null($this -> codigo)) {
      $consultar = 'SELECT producto.nomb as nombre, pedido.prec, pedido.cant FROM orden 
      JOIN pedido ON orden.codi=pedido.orde
      JOIN producto ON pedido.oidp=producto.oid
       WHERE pedido.orde=\'' . $this -> codigo . '\' AND orden.tipo =0';
      $resultado = $this -> db -> query($consultar);
      if ($this -> db -> _error_number() == 0) {
        $rs = $resultado -> result();
      }
      $arr[] = array('err' => $this -> db -> _error_number(), 'msj' => $this -> db -> _error_message(), 'rs' => $rs);
      return $arr;
    }
  }
  
  function pedidoCabeceraJSON(){
    
  }

  function obtenerTipo() {
    $tipo = '';
    switch ($this->tipo) {
      case 0 :
        $tipo = 'pedido';
        break;
      case 1 :
        $tipo = 'despacho';
        break;
      case 2 :
        $tipo = 'entrega';
        break;
      default :
        $tipo = 'pedido';
        break;
    }
    return $tipo;
  }

  function __destruct() {
    unset($this -> db);
  }

}
?>