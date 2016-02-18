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
    $this -> load -> model('usuario/usuario', 'Usuario');
  }

  function validarCuenta($arg = null) {
    //$this -> Usuario -> sobreNombre = $arg['txtUsuario'];
    //$this -> Usuario -> clave = $arg['txtClave'];
    $_SESSION['cedula'] = $arg['cedula'];
    $_SESSION['usuario'] = $arg['cedula'];
    $_SESSION['oid'] = $arg['cedula'];
    //$_SESSION['nombre'] = $usuario -> nombre;
    //$_SESSION['perfil'] = $usuario -> perfil;
    //$_SESSION['correo'] = $usuario -> correo;
    /**
    if ($this -> Usuario -> validar() == TRUE) {
      $this -> _entrar($this -> Usuario);
      return TRUE;
    } else {
      $this -> _salir();
      return FALSE;
    }
    **/
    return TRUE;
  }

  private function _entrar($usuario) {
    $_SESSION['cedula'] = $usuario -> cedula;
    $_SESSION['usuario'] = $usuario -> sobreNombre;
    $_SESSION['oid'] = $usuario -> identificador;
    $_SESSION['nombre'] = $usuario -> nombre;
    $_SESSION['perfil'] = $usuario -> perfil;
    $_SESSION['correo'] = $usuario -> correo;
    $this->session->set_userdata(array(
        'usuario'  => $usuario -> sobreNombre,
        'oid'     => $usuario -> identificador,
        'nombre' => $usuario -> nombre,
        'perfil' => $usuario -> perfil,
        'correo' => $usuario -> correo
      )
    );
    //redirect('BienestarSocial/principal');
    
    /**
    if ($usuario -> perfil == "") {
      redirect(base_url() . 'index.php/BienestarSocial');
    } else {
      echo "No se encontro usuario conectado...";
    }
    **/

  }

  private function _salir() {
    session_destroy();
  }

  function __destruct() {
    unset($this -> Usuario);
  }

}
