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
        $tipoTelefono=$this->model->ListarTipoTel();

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
            ['nombreCampo' => "fechaNacimiento",'tipoValidacion' => 'Fecha','requerido' => true],
        ]
    );

    $alm->setId($_REQUEST['id']);
    $alm->setNombre($_REQUEST['nombre']);
    $alm->setApellidoPaterno($_REQUEST['apellidoPaterno']);
    $alm->setApellidoMaterno($_REQUEST['apellidoMaterno']);
    $alm->setCorreo($_REQUEST['correo']);
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



public function ListarTelefonos(){
  $this->validate->validarValor(
      [
          ['nombreCampo' => "id",'tipoValidacion' => 'Entero','requerido' => false,]
      ]
  );

  if($this->validate->getStatus()){
      if (isset($_REQUEST['id'])) {
          $datosTel=$this->model->ListarTelefonos($_REQUEST['id']);
          echo json_encode(["status"=>true,"mensaje"=>"Consulta exitosa","datos"=>$datosTel]);

      }else{
          $datosTel = null;
          echo json_encode(["status"=>false,"mensaje"=>"No se obtuvo información"]);
      }

  }else{
    echo json_encode(["status"=>false,"mensaje"=>"Error de validación"]);
  }


}


public function EditarTel() {

    $alm = new TrabajadorModelo();

    $this->validate->validarValor(
        [
            ['nombreCampo' => "idTelefono",'tipoValidacion' => 'Entero','requerido' => true],
            ['nombreCampo' => "telefono",'tipoValidacion' => 'Telefono','requerido' => true],
            ['nombreCampo' => "idTipoTel",'tipoValidacion' => 'Entero','requerido' => true]

        ]
    );

    $alm->setTelefono($_REQUEST['telefono']);
    $alm->setIdTipoTelefono($_REQUEST['idTipoTel']);
    $alm->setIdTelefono($_REQUEST['idTelefono']);

    if($this->validate->getStatus()){


        $this->model->ActualizarTel($alm);

            // header('Location: index.php?c=Trabajador&m=Trabajador');
        echo json_encode(["status"=>true,"mensaje"=>"Se guardo la información"]);
    }else{
           // $this->errorValidacionMensaje();
        echo json_encode(["status"=>false,"mensaje"=>$this->validate->getMessage()]);
    }


}


public function NuevoTel() {

    $alm = new TrabajadorModelo();

    $this->validate->validarValor(
        [
            ['nombreCampo' => "idTrabajador",'tipoValidacion' => 'Entero','requerido' => true],

            ['nombreCampo' => "telefonoNuevo",'tipoValidacion' => 'Telefono','requerido' => true],
            ['nombreCampo' => "tipoTelNuevo",'tipoValidacion' => 'Entero','requerido' => true]

        ]
    );

    $alm->setIdTrabajador($_REQUEST['idTrabajador']);
    $alm->setTelefono($_REQUEST['telefonoNuevo']);
    $alm->setIdTipoTelefono($_REQUEST['tipoTelNuevo']);


    if($this->validate->getStatus()){


        $this->model->RegistrarTel($alm);

            // header('Location: index.php?c=Trabajador&m=Trabajador');
        echo json_encode(["status"=>true,"mensaje"=>"Se guardo la información"]);
    }else{
           // $this->errorValidacionMensaje();
        echo json_encode(["status"=>false,"mensaje"=>$this->validate->getMessage()]);
    }


}


public function EliminarTel(){
    $this->model->EliminarTel($_REQUEST['id']);
    header('Location: index.php?c=Trabajador&m=Trabajador');
}



}
