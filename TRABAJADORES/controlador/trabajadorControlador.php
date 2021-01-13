<?php
require_once 'TRABAJADORES/modelo/trabajadorModelo.php';

class TrabajadorControlador{

    private $model;

    public function __CONSTRUCT(){
        $this->model = new Trabajador();
    }

    public function Index(){
        require_once 'includes/header.php';
        require_once 'TRABAJADORES/vista/trabajadorVista.php';
        require_once 'includes/footer.php';
    }

    public function Crud(){
        $alm = new Trabajador();

        if(isset($_REQUEST['id'])){
            $alm = $this->model->Obtener($_REQUEST['id']);
        }

        require_once 'includes/header.php';
        require_once 'TRABAJADORES/vista/trabajadorEditarVista.php';
        require_once 'includes/footer.php';
    }

    public function Guardar(){
        $alm = new Trabajador();

        $alm->id = $_REQUEST['id'];
        $alm->nombre = $_REQUEST['nombre'];
        $alm->apellidoPaterno = $_REQUEST['apellidoPaterno'];
        $alm->apellidoMaterno = $_REQUEST['apellidoMaterno'];
        $alm->correo = $_REQUEST['correo'];
        $alm->telefono1 = $_REQUEST['telefono1'];
        $alm->telefono2 = $_REQUEST['telefono2'];
        $alm->fechaNacimiento = $_REQUEST['fechaNacimiento'];

        $alm->id > 0
            ? $this->model->Actualizar($alm)
            : $this->model->Registrar($alm);

        header('Location: index.php?c=Trabajador&m=Trabajador');
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
