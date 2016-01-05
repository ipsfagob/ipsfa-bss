<?php
if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * 
 * Carrito de Compras
 *
 * @package mamonsoft
 * @subpackage administracion
 * @author Carlos Peña
 * @copyright Derechos Reservados (c) 2014 - 2015, Mamonsoft C.A.
 * @link    http://www.mamonsoft.com.ve
 * @since Version 1.0
 *
 */

class MInventario extends CI_Model {

  var $identificador = NULL;

  var $idProducto;

  var $disponible = 0;
  
  var $serial = "0"; 
  
  var $lote = "0"; //Cuanto el Proceso es por lotes
  
  var $ubicacion = 0;

  var $precio = 0.00;

  var $fechaEntrada = NULL;

  function __construct() {
    parent::__construct();
    if (!isset($this -> db)) {
      $this -> load -> database();
    }

  }

  /**
   * En el caso del menos uno (-1) hace
   * referencia al producto que no existe
   *
   * @param array Producto
   * @return int
   */
  function disponibilidad($idProducto = 0) {
    $disponible = -1;
    $consulta = 'SELECT disp FROM inventario WHERE oidp= ' . $this -> idProducto .
    ' AND seri= ' . $this -> serial .
    ' AND lote= ' . $this -> lote .
    ' AND ubic= ' . $this -> ubicacion . ' LIMIT 1';
    
    $rs = $this -> db -> query($consulta) -> result();
    foreach ($rs as $clv => $val) {
      $disponible = $val -> disp;
    }
    return $disponible;
  }

  function verificar() {

  }

  function registrar() {
    $data = $this -> mapearObjeto();
    $this -> db -> insert('inventario', $data);
    $arr[] = array('err' => $this -> db -> _error_number(), 'msj' => $this -> db -> _error_message());
    return $arr;
  }

  /**
   * Creando un objeto de tipo inventario DB
   * @return array
   */
  function mapearObjeto() {
    if (is_null($this -> fechaEntrada))
      $this -> fechaEntrada = date("Y/m/d");
    $data = array(//
    'oid' => $this -> identificador, //
    'oidp' => $this -> idProducto, //}
    'seri' => $this -> serial, //
    'lote' => $this -> lote, //
    'ubic' => $this -> ubicacion, //
    'disp' => $this -> disponible, //
    'prec' => $this -> precio, //
    'fent' => $this -> fechaEntrada//
    );

    return $data;
  }

  function actualizar() {
    $data = $this -> mapearObjeto();
    $this -> db -> where('oidp', $data['oidp']);
    $this -> db -> update('inventario', $data);
    $arr[] = array('err' => $this -> db -> _error_number(), 'msj' => $this -> db -> _error_message());
    return $arr;
  }

  /**
   * Aumentar Producto
   * @return multitype:NULL
   */
  function aumentar() {
    if ($this -> precio > 0) {
    	//Aumento la disponibilidad y aumento los precios
      $actualizar = 'UPDATE inventario SET disp=disp+' . $this -> disponibile . ', prec=' . $this -> precio . 
      ' WHERE oidp= ' . $this -> idProducto . 
      ' AND seri= ' . $this -> serial . 
      ' AND lote= ' . $this -> lote . 
      ' AND ubic= ' . $this -> ubicacion . ' LIMIT 1';
      
    } else {
      $actualizar = 'UPDATE inventario SET disp=disp+' . $this -> disponibile . 
      ' WHERE oidp= ' . $this -> idProducto . 
      ' AND seri= ' . $this -> serial . 
      ' AND lote= ' . $this -> lote . 
      ' AND ubic= ' . $this -> ubicacion . ' LIMIT 1';
      
    }
    $this -> db -> query($actualizar);
    $arr[] = array('err' => $this -> db -> _error_number(), 'msj' => $this -> db -> _error_message());
    return $arr;
  }

  function borrar($oidProducto = null) {
    $this -> db -> where('oidp', $oidProducto);
    $this -> db -> delete('inventario');
    $arr[] = array('err' => $this -> db -> _error_number(), 'msj' => $this -> db -> _error_message());
    return $arr;
  }

  /**
   * Comprometer inventario segun un pedido
   * @param array
   */
  function comprometer($pedido = null) {
    //Usuando metodo masivo de query ¡Mala idea!
    foreach ($pedido as $clv) {
      $actualizar = 'UPDATE inventario SET disp=disp-' . $clv['cant'] . ' WHERE oidp= ' . $clv['oidp'] . 
      ' AND seri= \'' . $clv['seri'] . '\' AND lote= \'' . $clv['lote'] . '\' AND ubic= \'' . $clv['ubic'] . '\' LIMIT 1';
      $this -> db -> query($actualizar);
      $actualizar = 'UPDATE existencia SET cant=cant-' . $clv['cant'] . ' WHERE oidp= ' . $clv['oidp'] .
      ' AND seri= \'' . $clv['seri'] . '\' AND lote= \'' . $clv['lote'] . '\' AND ubic= \'' . $clv['ubic'] . '\' LIMIT 1';
      $this -> db -> query($actualizar);
      //echo $actualizar;
    }
  }

  /**
   * Hace referecia al metodo comprometer
   */
  function presindir($pedido = null) {
    $query = "SELECT oidp,cant FROM pedido WHERE orde=".$pedido;
    $rsProd = $this -> db -> query($query);
    $productos = $rsProd -> result();
    foreach ($productos as $prod) {
      $actualizar = 'UPDATE inventario SET disp=disp+' . $prod->cant . ' WHERE oidp= ' . $prod -> oidp . 
      ' AND seri= ' . $this -> serial . 
      ' AND lote= ' . $this -> lote . 
      ' AND ubic= ' . $this -> ubicacion . ' LIMIT 1';
      $this -> db -> query($actualizar);
    }
  }

  function generarMovimiento() {
    $actualizar = 'INSERT INTO movimiento disp=disp-' . $clv['cant'] . ' WHERE oidp= ' . $clv['oidp'];
    $this -> db -> query($actualizar);
  }

  function __destruct() {
    //unset($this -> db);
  }

}
