<?php
 
require "includes/Validation.php"; 

class Validate {

    private $error = 0;
    private $mensaje = '';
    private $validacion; 

    public function __CONSTRUCT() {
        $this->validacion = new Validation(); 
    }

    function getMessage() {
        return $this->mensaje;
    }

    function getStatus() {
        return $this->error==0;
    }





    public function validarTipo($datoEntrante,&$campo) {
        // $tipoValidacion = "validateEntero";
        $tipoValidacion = 'validate'.$campo->tipoValidacion;

        // Verficamos que exista el metodo "validateX" en el objeto Validation que almacena la variable $this->validacion
        if(method_exists($this->validacion, $tipoValidacion)){
            // $datoValidado = ejecutamos dinamicamente la funcion "validateX(dato entrante) y retorna un objeto {status,valor,mensaje}"
            $datoValidado = $this->validacion->$tipoValidacion($datoEntrante);


            if ($datoValidado->status) { 
                // $this->mensaje .= 'Validación exitosa';
            } else {
                $this->error++;
                $this->mensaje .= 'El campo <b>' . $campo->nombreCampo . '</b> <span style="color:red">' . $datoValidado->mensaje . '</span><br>';
            } 
        }else{
            $this->error++;
            $this->mensaje .= 'La validacion <b>' . $campo->tipoValidacion . '</b> <span style="color:red">No existe</span><br>';

        }

    }





    function validarValor($arrayValidacion) {
         
        foreach ($arrayValidacion as $campo) { 

            $campo = (Object) $campo; 

            if ($campo->requerido == TRUE) { 


                if (array_key_exists($campo->nombreCampo, $_REQUEST)) {
                    /*strip_tags -> Retira las etiquetas HTML y PHP de un string y espacios*/
                    $datoEntrante = strip_tags(trim($_REQUEST[$campo->nombreCampo]));
                    
                    // Evalua que envies un dato. Diferente de null y de cadena vacia
                    if ($datoEntrante != "" || $datoEntrante != null) {  
                        $this->validarTipo($datoEntrante,$campo);
                    } else {
                        $this->error++;
                        $this->mensaje .= 'El campo <b>' . $campo->nombreCampo . '</b> <span style="color:red">es requerido</span>' . '<br>';
                    }
                } else {
                    $this->error++;
                    $this->mensaje .= 'No existe indice '.$campo->nombreCampo.' <br>';
                }
            } else {//validacionNoRequerida
                if (array_key_exists($campo->nombreCampo, $_REQUEST)) {
                    $datoEntrante = strip_tags(trim($_REQUEST[$campo->nombreCampo]));

                    if ($datoEntrante != "" || $datoEntrante != null) {
                        $this->validarTipo($datoEntrante,$campo);
                    }
                } 
            }

        }

        return $this->error==0;
    }

}

?>
