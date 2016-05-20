<?php
if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * Seguridad MamonSoft C.A
 * 
 *
 * @package mamonsoft.modules.seguridad
 * @subpackage iniciar
 * @author Carlos Peña
 * @copyright	Derechos Reservados (c) 2014 - 2015, MamonSoft C.A.
 * @link		http://www.mamonsoft.com.ve
 * @since Version 1.0
 *
 */



class Iniciar extends CI_Model {

  var $token = null;

  function __construct() {
    $this -> load -> model('usuario/Usuario', 'Usuario');
  }

  function validarCuenta($arg = null) {
    $this -> Usuario -> sobreNombre = $arg['usuario'];
    $this -> Usuario -> clave = $arg['clave'];
 
    if ($this -> Usuario -> validar() == TRUE) {
      $this -> _entrar($this -> Usuario);
      return TRUE;
    } else {
      $this -> _salir();
      return FALSE;
    }
  }

  private function _entrar($usuario) {
    
   //http://localhost/ipsfa-bss/index.php/Bienestar 
   $parte =  explode('@', $usuario->correo);
   $correo = substr($parte[0], 0, 4) . '****';
   $pag = explode('.', $parte[1]);
   $direcc =  substr($pag[0], 0, 2) . '**.' . $pag[1];
    $this->session->set_userdata(array(
        'cedula' => $usuario->cedula,
        'nombreRango' => $usuario->nombre,
        'correo' => $usuario->correo,
        'correoaux' => $correo . '@' . $direcc,
        'estatus' => $usuario->estatus,
        'perfil' => $usuario->perfil,
        'ultimaConexion' => '', //$usuario->ultimaConexion()
      )
    );
    $this->load->model('comun/Dbipsfa');
    $arr = array(
      'cedu' => $usuario->cedula,
      'obse' => 'Inicio de Sesión',
      'fech' => 'now()',
      'app' => 'Panel',
      'tipo' => 0
      );

    $this->Dbipsfa->insertarArreglo('bss.traza', $arr);
  }

  function token($token){
    $this->Usuario->cedula = $token->id;
    $this->Usuario->nombre =  $token->nom; //$token->dmi_grado_ . '-' . $token->afi_nombre_primero . ' ' . $token->afi_nombre_segundo;
    $this->Usuario->correo = $token->cor; //$token->usu_correo;
    $this->Usuario->perfil = $token->sit;
    $this->Usuario->estatus = $token->est; //$token->afi_estatus;
    $this->_entrar($this->Usuario);

  }

  private function _salir() {
    redirect('Login/salir');
  }

  function __destruct() {
    unset($this -> Usuario);
  }

}
