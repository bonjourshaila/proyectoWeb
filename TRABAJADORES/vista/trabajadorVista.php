<script src="TRABAJADORES/vista/js/trabajador.js.php" type="text/javascript" charset="utf-8" async defer></script>


<div class="container-fluid p-4">
  <div class="row">
    <div class="col-md-10 mx-auto">
  <div class="card">
    <h1 class="card-header">Trabajadores</h1>
    <div class="card-body">
      <div >
      <a class="btn btn-primary" href="?c=Trabajador&a=Crud&m=Trabajador">Nuevo trabajador</a>
      <hr>
      <hr>
    </div>
      <table class="table table-striped">
          <thead>
              <tr>
                  <th style="width:180px;">Nombre</th>
                  <th>Apellido paterno</th>
                  <th>Apellido materno</th>
                  <th>Correo</th>
                  <th>Telefono 1</th>
                  <th>Telefono 2</th>
                  <th style="width:120px;">Nacimiento</th>
                  <th style="width:60px;"></th>
                  <th style="width:60px;"></th>
              </tr>
          </thead>
          <tbody>
          <?php foreach($this->model->Listar() as $r): ?>
              <tr>
                  <td><?php echo $r->nombre; ?></td>
                  <td><?php echo $r->apellidoPaterno; ?></td>
                  <td><?php echo $r->apellidoMaterno; ?></td>
                  <td><?php echo $r->correo; ?></td>
                  <td><?php echo $r->telefono1; ?></td>
                  <td><?php echo $r->telefono2; ?></td>
                  <td><?php echo $r->fechaNacimiento; ?></td>
                  <td>
                      <a href="?c=Trabajador&a=Crud&m=Trabajador&id=<?php echo $r->id; ?>" class="btn btn-warning"> Editar</a>
                  </td>
                  <td>
                    <a class="btn btn-danger" onclick="eliminar('<?php echo $r->id; ?>')" > Eliminar</a>

                      <!-- <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Trabajador&a=Eliminar&m=Trabajador&id=< ?php echo $r->id; ?>" class="btn btn-danger"> Eliminar</a> -->
                  </td>
              </tr>
          <?php endforeach; ?>
          </tbody>
      </table>



    </div>
  </div>

</div>
</div>


</div>
