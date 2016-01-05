<?php
if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * Coorporacion de Estampado
 * Carrito de Compras 01/02/2014
 * Solicitud de Mercacia
 *
 * @package estcorp
 * @subpackage comun
 * @author Carlos Peña
 * @copyright Derechos Reservados (c) 2014 - 2015, GenProg C.A.
 * @link    http://www.solo-educacion.org
 * @since Version 1.0
 *
 */

class MDeposito extends CI_Model {

  function __construct() {
    $this -> load -> database();
  }
  
  function registrar($arr){
  	$datos = array("oidu"=>$arr[5],"oido"=>$arr[0],"banco"=>$arr[1],"deposito"=>$arr[2],"obser"=>$arr[3],"fecha"=>$arr[4],"estatus"=>0);
  	$this -> db -> insert("deposito",$datos);
  	return "Se registro con exito";
  }
  
  function listarPorUsuario($usuarioId = NULL, $esta = NULL){
  	$lista = 'SELECT pedido.orde, usuario.nomb, usuario.apel, usuario.corr, usuario.telf,usuario.oid as oidu,
    producto.nomb as nombre, pedido.prec, pedido.cant, SUM(pedido.prec*pedido.cant) AS total,
	 deposito.banco, deposito.deposito,deposito.obser,deposito.fecha,deposito.estatus 
	 FROM pedido 
  	JOIN usuario ON pedido.oidu=usuario.oid LEFT 
	JOIN producto ON pedido.oidp=producto.oid 
	LEFT JOIN deposito ON pedido.orde = deposito.oido
  	WHERE usuario.oid='.$usuarioId.' AND pedido.esta='.$esta.' GROUP BY pedido.orde';
    $resultado = $this -> db -> query($lista);
    $cant = 0;
    if ($this -> db -> _error_number() == 0)
      $rs = $resultado -> result();
    $arr[] = array('err' => $this -> db -> _error_number(), 'msj' => $this -> db -> _error_message(), 'rs' => $rs,'cant'=>$resultado -> num_rows());
    return $arr;
  }
  
  function listarPorAdmin( $esta = NULL){
  	$lista = 'SELECT pedido.orde, usuario.nomb, usuario.apel, usuario.corr, usuario.telf,usuario.oid as oidu,
    producto.nomb as nombre, pedido.prec, pedido.cant, SUM(pedido.prec*pedido.cant) AS total,
	 deposito.banco, deposito.deposito,deposito.obser,deposito.fecha,deposito.estatus
	 FROM pedido
  	JOIN usuario ON pedido.oidu=usuario.oid LEFT
	JOIN producto ON pedido.oidp=producto.oid
	LEFT JOIN deposito ON pedido.orde = deposito.oido
  	WHERE pedido.esta='.$esta.' GROUP BY pedido.orde';
  	$resultado = $this -> db -> query($lista);
  	$cant = 0;
  	if ($this -> db -> _error_number() == 0)
  		$rs = $resultado -> result();
  	$arr[] = array('err' => $this -> db -> _error_number(), 'msj' => $this -> db -> _error_message(), 'rs' => $rs,'cant'=>$resultado -> num_rows());
  	return $arr;
  }
  
  function cabezeraJSONCliente() {
  	$cabecera[1] = array("titulo" => " ", "tipo" => "detallePost", "atributos" => "width:15px", "funcion" => "Detalle_Orden", "parametro" => "2");
    $cabecera[2] = array("titulo" => "#PEDIDO", "atributos" => "width:40px");
    $cabecera[3] = array("titulo" => "Monto", "atributos" => "width:50px;text-align : right;");
    $cabecera[4] = array("titulo" => "Banco", "atributos" => "width:100px");
    $cabecera[5] = array("titulo" => "Deposito", "atributos" => "width:120px");
    $cabecera[6] = array("titulo" => "Observaciones");
    $cabecera[7] = array("titulo" => "Fecha");
    
    return $cabecera;
  }
  
  function cabezeraJSONAdmin() {
  	$cabecera[1] = array("titulo" => " ", "tipo" => "detallePost", "atributos" => "width:15px", "funcion" => "Detalle_Orden", "parametro" => "4");
  	$cabecera[2] = array("titulo" => "Nombre", "atributos" => "width:60px");
  	$cabecera[3] = array("titulo" => "Telefono|Correo", "atributos" => "width:40px");
  	$cabecera[4] = array("titulo" => "#PEDIDO", "atributos" => "width:40px;text-align : right;");
    $cabecera[5] = array("titulo" => "Monto", "atributos" => "width:50px;text-align : right;");
    $cabecera[6] = array("titulo" => "Banco", "atributos" => "width:100px");
    $cabecera[7] = array("titulo" => "Deposito", "atributos" => "width:120px");
    $cabecera[8] = array("titulo" => "Observaciones");
    $cabecera[9] = array("titulo" => "Fecha");
    $cabecera[10] = array("titulo" => "A", "tipo" => "bimagen", "funcion" => 'Aceptar_Procesando', "parametro" => "4,6,7,9", "ruta" => __IMG__ . "botones/aceptar1.png", "atributos" => "width:10px");
    $cabecera[11] = array("titulo" => "R", "tipo" => "bimagen", "funcion" => 'Rechazar_Procesando', "parametro" => "4", "ruta" => __IMG__ . "botones/quitar.png", "atributos" => "width:10px");
  
  	return $cabecera;
  }
  
  function Aceptar($arr){
  	$this -> db -> query("UPDATE deposito SET estatus=1 WHERE oido=".$arr[0]);
  }
  
  function Rechazar($arr){
  	$this -> db -> query("UPDATE deposito SET estatus=2 WHERE oido=".$arr[0]);
  }
  
  

  function __destruct() {
    unset($this -> db);
  }

}
