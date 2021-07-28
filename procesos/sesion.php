<?php
class sesion {
  function __construct() {
     session_start ();
  }
  public function set($usuario, $contrasena) {
     $_SESSION [$usuario] = $contrasena;
  }
  public function get($usuario) {
     if (isset ( $_SESSION [$usuario] )) {
        return $_SESSION [$usuario];
     } else {
         return false;
     }
  }
  public function elimina_variable($usuario) {
      unset ( $_SESSION [$usuario] );
  }
  public function termina_sesion() {
      $_SESSION = array();
      session_destroy ();
  }
}
?>