<?php
require_once 'TRABAJADORES/modelo/trabajadorModelo.php';
require_once 'includes/Validate.php';

class TrabajadorControlador{
    private $model;
    private $validate;

    public function __CONSTRUCT(){
        $this->validate=new Validate();
        $this->model = new TrabajadorModelo();
    }

    public function Index(){
        $datosLista=$this->model->Listar();
        require_once 'includes/header.php';
        require_once 'TRABAJADORES/vista/trabajadorVista.php';
        require_once 'includes/footer.php';
    }

    public function ListarFiltro(){
      if (isset($_REQUEST['filtro'])) {
        $datosLista=$this->model->ListarFiltro($_REQUEST['filtro']);
        require_once 'includes/header.php';
        require_once 'TRABAJADORES/vista/trabajadorVista.php';
        require_once 'includes/footer.php';
    }
}

public function EditarAgregar(){
    $alm = new TrabajadorModelo();
    $this->validate->validarValor(
        [
            ['nombreCampo' => "id",'tipoValidacion' => 'Entero','requerido' => false,]
        ]
    );

    if($this->validate->getStatus()){
        if (isset($_REQUEST['id'])) {
            $alm = $this->model->Obtener($_REQUEST['id']);
        }else{
            $alm = null;
        }
        require_once 'includes/header.php';
        require_once 'TRABAJADORES/vista/trabajadorEditarVista.php';
        require_once 'includes/footer.php';
    }else{
        $this->errorValidacionMensaje();
    }
}




public function Guardar() {

    $alm = new TrabajadorModelo();

    $this->validate->validarValor(
        [
            ['nombreCampo' => "id",'tipoValidacion' => 'Entero','requerido' => false],
            ['nombreCampo' => "nombre",'tipoValidacion' => 'Nombre','requerido' => true],
            ['nombreCampo' => "apellidoPaterno",'tipoValidacion' => 'Nombre','requerido' => true],
            ['nombreCampo' => "apellidoMaterno",'tipoValidacion' => 'Nombre','requerido' => true],
            ['nombreCampo' => "correo",'tipoValidacion' => 'Email','requerido' => true],
            ['nombreCampo' => "telefono1",'tipoValidacion' => 'Telefono','requerido' => true],
            ['nombreCampo' => "telefono2",'tipoValidacion' => 'Telefono','requerido' => false],
            ['nombreCampo' => "fechaNacimiento",'tipoValidacion' => 'Fecha','requerido' => true],
        ]
    );

    $alm->setId($_REQUEST['id']);
    $alm->setNombre($_REQUEST['nombre']);
    $alm->setApellidoPaterno($_REQUEST['apellidoPaterno']);
    $alm->setApellidoMaterno($_REQUEST['apellidoMaterno']);
    $alm->setCorreo($_REQUEST['correo']);
    $alm->setTelefono1($_REQUEST['telefono1']);
    $alm->setTelefono2($_REQUEST['telefono2']);
    $alm->setFechaNacimiento($_REQUEST['fechaNacimiento']);

    if($this->validate->getStatus()){

        $_REQUEST["id"]>0
        ? $this->model->Actualizar($alm)
        : $this->model->Registrar($alm);

            // header('Location: index.php?c=Trabajador&m=Trabajador');
        echo json_encode(["status"=>true,"mensaje"=>"Se guardo la información"]);
    }else{
           // $this->errorValidacionMensaje();
        echo json_encode(["status"=>false,"mensaje"=>$this->validate->getMessage()]);
    }


}



public function Eliminar(){
    $this->model->Eliminar($_REQUEST['id']);
    header('Location: index.php?c=Trabajador&m=Trabajador');
}


public function Cumpleaños(){

    require_once 'includes/header.php';
    require_once 'TRABAJADORES/vista/trabajadorCumpleañosVista.php';
    require_once 'includes/footer.php';
}
}
