<?php

class Validation {

    private const MENSAJE = [
        'campo_obligatorio' => 'Este campo es obligatorio',
      'campo_numerico' => 'no es numérico',
      'campo_nombre' => 'no es un nombre',
      'campo_correo' => 'no es un correo',
      'campo_telefono' => 'no es un Telefono',
      'campo_fecha' => 'no es una fecha'
    ];


    public function validateNombre($valor, $maximo = 10000) {
        // var_dump($valor);
        $valor = substr(trim($valor), 0, $maximo);
        $regla = '/^[a-zA-ZáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙñÑ0-9\s]*(\s*[a-zA-ZáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙñÑ0-9\s\']*)*[a-zA-ZáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙñÑ0-9\s]+$/';
        if ($valor === '0')
            return (Object) array('status' => TRUE, 'valor' => '0', 'mensaje' => '');
        if (filter_var($valor, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => $regla)))) {
            return (Object) array('status' => TRUE, 'valor' => strip_tags(trim($valor)), 'mensaje' => '');
        } else {
            return (Object) array('status' => FALSE, 'valor' => strip_tags(trim($valor)), 'mensaje' => self::MENSAJE['campo_nombre']);
        }
    }


    public function validateEntero($valor) {
        $valor = trim($valor);
        $regla = "/^[0-9]+$/";
        if ($valor === '0') {
            return (Object) array('status' => TRUE, 'valor' => strip_tags(trim($valor)), 'mensaje' => '');
        }
        else {
            if (filter_var($valor, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => $regla)))) {
                return (Object) array('status' => TRUE, 'valor' => strip_tags(trim($valor)), 'mensaje' => '');
            } else {
                return (Object) array('status' => FALSE, 'valor' => strip_tags(trim($valor)), 'mensaje' => self::MENSAJE['campo_numerico']);
            }
        }
    }

    public function validateFecha($valor) {
        if (DateTime::createFromFormat("Y-m-d", $valor)) {
            return (Object) array('status' => TRUE, 'valor' => strip_tags(trim($valor)), 'mensaje' => '');
        } else {
            return (Object) array('status' => FALSE, 'valor' => strip_tags(trim($valor)), 'mensaje' => self::MENSAJE['campo_fecha']);
        }
    }

    public function validateEmail($valor, $maximo = 10000) {
        $valor = substr(trim($valor), 0, $maximo);
        if (filter_var($valor, FILTER_VALIDATE_EMAIL)) {
            return (Object) array('status' => TRUE, 'valor' => strip_tags(trim($valor)), 'mensaje' => '');
        } else {
            return (Object) array('status' => FALSE, 'valor' => strip_tags(trim($valor)), 'mensaje' => self::MENSAJE['campo_correo']);
        }
    }

    public function validateTelefono($valor, $maximo = 10000) {
        $valor = substr(trim($valor), 0, $maximo);
        $regla = "/^[0-9]{10}$/";
        if (filter_var($valor, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => $regla)))) {
            return (Object) array('status' => TRUE, 'valor' => strip_tags(trim($valor)), 'mensaje' => '');
        } else {
            return (Object) array('status' => FALSE, 'valor' => strip_tags(trim($valor)), 'mensaje' => self::MENSAJE['campo_telefono']);
        }
    }  
}

?>
