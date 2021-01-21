<!-- <script src="TRABAJADORES/vista/js/trabajador.js.php" type="text/javascript" charset="utf-8" async defer></script> -->


<div class="container-fluid p-4">
  <div class="row">
    <div class="col-md-10 mx-auto">
      <div class="card" id="carta">
        <h1 class="card-header">Trabajadores</h1>
        <div class="card-body">
          <div >
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
              <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                      <a class="btn btn-primary" href="?c=Trabajador&a=EditarAgregar&m=Trabajador">Nuevo trabajador</a>
                    </li>
                  </ul>
                  <form class="d-flex" id="frm-filtro" action="?c=Trabajador&a=ListarFiltro&m=Trabajador" method="post">
                    <input name="filtro" class="form-control" type="search" placeholder="Buscar" aria-label="Search">
                    <button class="btn btn-outline-primary" type="submit">Buscar</button>
                  </form>
                  <a class="btn btn-outline-primary " style="margin-left: 10px" href="?c=Trabajador&a=Index&m=Trabajador"> Mostrar todos</a>
                </div>
              </div>
            </nav>
            <hr>
            <hr>
          </div>
          <table class="table table-striped">
            <thead>
              <tr>
                <th style="width:400px;">Nombre</th>
                <th>Correo</th>
                <th>Telefono 1</th>
                <th>Telefono 2</th>
                <th style="width:120px;">Nacimiento</th>
                <th style="width:60px;"></th>
                <th style="width:60px;"></th>
                <th style="width:60px;"></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($datosLista as $r): ?>
                <tr>
                  <td><?php echo $r->nombre." ".$r->apellidoPaterno." ".$r->apellidoMaterno ;  ?></td>
                  <td><?php echo $r->correo; ?></td>
                  <td><?php echo $r->telefono1; ?></td>
                  <td><?php echo $r->telefono2; ?></td>
                  <td><?php echo $r->fechaNacimiento; ?></td>
                  <td>

                    <!-- <a  href="?c=Trabajador&a=ListarTelefonos&m=Trabajador&id=< ?php echo $r->id; ?>&nombre=< ?php echo $r->nombre . ' ' . $r->apellidoPaterno . ' ' . $r->apellidoMaterno; ?>"  class="btn btn-primary"> Telefonos</a> -->

                    <a  onclick="verModalTel('<?php echo $r->nombre . ' ' . $r->apellidoPaterno . ' ' . $r->apellidoMaterno; ?>', '<?php echo $r->id; ?>')" class="btn btn-primary"> Telefonos</a>
                  </td>
                  <td>
                    <a href="?c=Trabajador&a=EditarAgregar&m=Trabajador&id=<?php echo $r->id; ?>" class="btn btn-warning"> Editar</a>
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

<!-- MODAL TELEFONO -->

<div class="modal fade example-modal-lg" id="modalTel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xxx modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">TELEFONOS - <span id="span-nombre"></span></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <a class="btn btn-primary" href="?c=Trabajador&a=EditarAgregar&m=Trabajador">Nuevo telefono</a>
        <hr>
        <hr>
        <table class="table table-striped">
          <thead>
            <tr>
              <th style="width:400px;">Telefono</th>
              <th>Tipo</th>
              <th style="width:60px;"></th>
              <th style="width:60px;"></th>
            </tr>
          </thead>
          <tbody id="tbody-tels">

              <!-- <tr>
                <td></td>
                <td></td>
                <td>
                  <a  onclick="verFormTel()" class="btn btn-warning"> Editar</a>
                </td>
                <td>
                  <a class="btn btn-danger" onclick="eliminar('< ?php echo $r->id; ?>')" > Eliminar</a>

                  <! - - <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Trabajador&a=Eliminar&m=Trabajador&id=< ?php echo $r->id; ?>" class="btn btn-danger"> Eliminar</a> -->
                <!-- </td>
              </tr> -->

          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

      </div>
    </div>
  </div>
</div>


<!-- Modal EDITAR telefono -->

<div class="modal fade example-modal-lg" id="modalFormEditarTel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xxx modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form id="frm-editar-telefono" action="?c=Trabajador&a=Guardar&m=Trabajador" method="post" enctype="multipart/form-data">


          <input type="hidden" name="idTelefono" value="" id="hidden-idTel">


          <div class="form-group mb-3">
            <label>Telefono</label>
            <input type="text" id="input-editar-tel" name="telefono" value="" class="form-control" placeholder="Ingrese telefono" data-validacion-tipo="requerido|min:3" />
          </div>

          <div class="form-group mb-3">
            <label>Tipo telefono</label>




            <select class="form-select" id="select-editar-tipo-tel" name="idTipoTel" >
                <option value="" selected>Elige el tipo de telefono</option>
                <?php foreach($tipoTelefono as $r):
                  ?>
                  <option value="<?php echo $r->idTipo ?>"><?php echo $r->tipoTelefono?></option>
                <?php endforeach;?>

              </select>
          </div>
          <hr />
        </form>

        <div class="text-center">
          <button class="btn btn-primary" id="btn-editar-tel">Guardar</button>
        </div>



      </div>
      <div  class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

      </div>
    </div>
  </div>
</div>



<!-- Modal NUEVO telefono -->

<div class="modal fade example-modal-lg" id="modalFormNuevoTel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xxx modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo telefono </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form id="frm-telefono" action="?c=Trabajador&a=Guardar&m=Trabajador" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id" value="" />

          <div class="form-group mb-3">
            <label>Telefono</label>
            <input type="text" id="input-tel" name="nombre" value="" class="form-control" placeholder="Ingrese telefono" data-validacion-tipo="requerido|min:3" />
          </div>

          <div class="form-group mb-3">
            <label>Tipo telefono</label>




            <select class="form-select" id="select-tipo-tel" >
                <option value="" selected>Elige el tipo de telefono</option>
                <?php foreach($tipoTelefono as $r):
                  ?>
                  <option value="<?php echo $r->idTipo ?>"><?php echo $r->tipoTelefono?></option>
                <?php endforeach;?>

              </select>
          </div>
          <hr />
        </form>

        <div class="text-center">
          <button class="btn btn-primary" id="btn-guardar">Guardar</button>
        </div>



      </div>
      <div  class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

      </div>
    </div>
  </div>
</div>
