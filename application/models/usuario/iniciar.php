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

session_start();

class Iniciar extends CI_Model {

  var $token = null;

  function __construct() {
    $this -> load -> model('usuario/usuario', 'Usuario');
  }

  function validarCuenta($arg = null) {
    $this -> Usuario -> sobreNombre = $arg['txtUsuario'];
    $this -> Usuario -> clave = $arg['txtClave'];
    if ($this -> Usuario -> validar() == TRUE) {
      $this -> _entrar($this -> Usuario);
    } else {
      $this -> _salir();
    }
  }

  private function _entrar($usuario) {
    $_SESSION['usuario'] = $usuario -> sobreNombre;
    $_SESSION['oid'] = $usuario -> identificador;
    $_SESSION['nombre'] = $usuario -> nombre;
    $_SESSION['perfil'] = $usuario -> perfil;
    $_SESSION['correo'] = $usuario -> correo;

    if ($usuario -> perfil == md5('panel')) {
      redirect(base_url() . 'index.php/panel/panel');
    } else {
      if ($usuario -> perfil == '2a2e9a58102784ca18e2605a4e727b5f') {
        redirect(base_url() . 'index.php/fisico/almacen');
      } else {
        redirect(base_url() . 'index.php/carro/carro');
      }
    }
  }

  private function _salir() {
    session_destroy();
    redirect(base_url());
  }

  function __destruct() {
    unset($this -> Usuario);
  }

}
