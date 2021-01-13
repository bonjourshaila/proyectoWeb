<div class="container-fluid p-4">
  <div class="row">
    <div class="col-md-8 mx-auto">
  <div class="card">
    <div class="card-header">
      <h2><?php echo $alm->id != null ? $alm->nombre : 'Nuevo Registro'; ?></h2>
    </div>
    <div class="card-body">

      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li><a href="?c=Trabajador&m=Trabajador">Trabajadores /  </a></li>
          <li class="active"><?php echo $alm->id != null ? $alm->nombre : ' Nuevo registro'; ?></li>
        </ol>
      </nav>

      <form id="frm-trabajador" action="?c=Trabajador&a=Guardar&m=Trabajador" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $alm->id; ?>" />

        <div class="form-group mb-3">
          <label>Nombre</label>
          <input type="text" name="nombre" value="<?php echo $alm->nombre; ?>" class="form-control" placeholder="Ingrese su nombre" data-validacion-tipo="requerido|min:3" />
        </div>

        <div class="form-group mb-3">
          <label>Apellido paterno</label>
          <input type="text" name="apellidoPaterno" value="<?php echo $alm->apellidoPaterno; ?>" class="form-control" placeholder="Ingrese su apellido paterno" data-validacion-tipo="requerido|min:10" />
        </div>

        <div class="form-group mb-3">
          <label>Apellido materno</label>
          <input type="text" name="apellidoMaterno" value="<?php echo $alm->apellidoMaterno; ?>" class="form-control" placeholder="Ingrese su apellido materno" data-validacion-tipo="requerido|min:10" />
        </div>

        <div class="form-group mb-3">
          <label>Correo</label>
          <input type="text" name="correo" value="<?php echo $alm->correo; ?>" class="form-control" placeholder="Ingrese su correo electrónico" data-validacion-tipo="requerido|email" />
        </div>

        <div class="form-group mb-3">
          <label>Telefono 1</label>
          <input type="number" name="telefono1" value="<?php echo $alm->telefono1; ?>" class="form-control" placeholder="Ingrese su numero telefónico" data-validacion-tipo="requerido|min:10" />
        </div>

        <div class="form-group mb-3">
          <label>Telefono 2</label>
          <input type="number" name="telefono2" value="<?php echo $alm->telefono2; ?>" class="form-control" placeholder="Ingrese su numero telefónico" data-validacion-tipo="requerido|min:10" />
        </div>

        <div class="form-group mb-3">
          <label>Fecha de nacimiento</label>
          <input  type="date" name="fechaNacimiento" value="<?php echo $alm->fechaNacimiento; ?>" class="form-control datepicker" placeholder="Ingrese su fecha de nacimiento" data-validacion-tipo="requerido" />
        </div>

        <hr />

        <div class="text-center">
          <button class="btn btn-primary">Guardar</button>
        </div>
      </form>
    </div>


  </div>
</div>
</div>
</div>




<script>
    $(document).ready(function(){
        $("#frm-alumno").submit(function(){
            return $(this).validate();
        });
    })
</script>
