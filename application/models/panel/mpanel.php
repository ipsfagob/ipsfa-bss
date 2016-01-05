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
class MPanel extends CI_Model {

  var $identificador = NULL;

  var $nombre = '';

  var $ubicacion = '';

  var $observacion = '';

  function __construct() {
    if (!isset($this -> db)) {
      $this -> load -> database();
    }
  }

  function __destruct() {
    $this->db->close();
    unset($this -> db);
  }
  
  function registrarGaleria($cod,$nom){
  	$data=array("oidp"=>$cod,"imagen"=>$nom);
  	$this -> db -> insert("galeria",$data);
  	return "Se registro imagen con exito";
  }
  
  function consultarGaleria($cod){
  	$imagenes = $this -> db -> query('SELECT * FROM galeria WHERE oidp='.$cod);
  	$obj = array();
  	$cant = $imagenes -> num_rows();
  	if($cant > 0){
  		$obj['resp'] = 1 ;
  		$rsImg = $imagenes -> result();
  		$i = 0;
  		foreach($rsImg as $fila){
  			$i++;
  			$rImg = '<img src="'.__IMG__.'galeria/'.$fila->imagen.'" width=50></img> ';
  			//$rImg = "epa";
  			$cuep[$i] = array("1" => $fila-> oid,"2" => $fila -> imagen , "3" => "","4"=> $rImg );
  		}
  		
  		$obj = array("Cabezera" => $this -> cab() , "Cuerpo" => $cuep, "Paginador" => 10, "Origen" => "json", "msj" => "SI");
  	}else{
  		$obj = array("msj" => "NO");
  	}
  	
  	return json_encode($obj);
  }
  
  function eliminarGaleria($arr){
  	if( $this -> db->query("DELETE FROM galeria WHERE oid=".$arr[0]) ){
  		$archivo = BASEPATH . 'img/galeria/'.$arr[1];
	    if (file_exists($archivo)) {
			if (unlink($archivo))
				$msj = "El archivo fue borrado";
			else
				$msj = "El archivo no fue borrado";
		} else
			$msj = "El archivo no existe";
  	}else{
  		$msj = "No se elimino";
  	}
  	return $msj;
  }
  
  function cab(){
  	$cabe = array();
  	$cabe[1] = array("titulo" => "", "oculto"=>1);
  	$cabe[2] = array("titulo" => "Imagen", "atributos" => "width:100%", "buscar" => 0);
  	$cabe[3] = array("titulo" => "#", "tipo" => "bimagen", "funcion" => 'eliminarGaleria', "parametro" => "1,2", "ruta" => __IMG__ . "quitar.png", "atributos" => "width:5px");
  	$cabe[4] = array("titulo" => "Ver","atributos" => "width:100px");
  	return $cabe;
  }

}
?>