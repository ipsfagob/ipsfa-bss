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

  var $esq = 'bss';

  var $esq_sess = 'session';

  function __construct() {
    
  }

  /**
  *
  *
  */
  function cosultarSolicitudes($oid = 0){
    $this->load->model('comun/Dbipsfa');
    $sConsulta = 'SELECT * FROM ' . $this->esq . '.solicitud WHERE tipo IN (1,2) AND estatus IN (1,2,4) ORDER BY fecha';
    if($oid != '') 
        $sConsulta = 'SELECT * FROM ' . $this->esq . '.solicitud WHERE tipo IN (1,2) AND estatus IN (3) ORDER BY fecha';

    $obj = $this->Dbipsfa->consultar($sConsulta);
    
    return $obj;
  }

  function __destruct() {

  }

  


}
?>