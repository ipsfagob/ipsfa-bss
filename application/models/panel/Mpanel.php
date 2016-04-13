<?php
if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * Penal de Control
 * Administracion del sistema
 *
 * @package application\model\panel
 * @subpackage panel
 * @author Carlos Peña
 * @copyright Derechos Reservados (c) 2015 - 2016, MamonSoft C.A.
 * @link    http://www.mamonsoft.com.ve
 * @since Version 1.0
 *
 */
class Mpanel extends CI_Model {

  var $identificador = NULL;

  function __construct() {
    
  }

  /**
  *
  *
  */
  function cosultarSolicitudes(){
    $this->load->model('comun/Dbipsfa');
    $obj = $this->Dbipsfa->consultar("SELECT * FROM solicitud WHERE tipo IN (1,2) AND estatus IN (1,2) ORDER BY fecha");
    return $obj;
  }

  function __destruct() {

  }

  


}
?>