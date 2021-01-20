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
                    <input name="filtro" class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                    <button class="btn btn-outline-primary pl-1" type="submit">Buscar</button>
                  </form>
                  <a class="btn btn-outline-primary pl-1" href="?c=Trabajador&a=Index&m=Trabajador"> Mostrar todos</a>
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
