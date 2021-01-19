<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Softura Solutions</title>

        <meta charset="utf-8" />

				<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
				<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

				<!-- <script src="TRABAJADORES/vista/js/trabajador.js.php" type="text/javascript" charset="utf-8" async defer></script> -->

	</head>
    <body>


			<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
		<a class="navbar-brand" href="#">
			<img src="includes/img/logo_2_softura.png" alt="" width="120" height="50">
		</a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a href="?c=Trabajador&a=Index&m=Trabajador" class="navbar-brand">Trabajadores</a>
        </li>
				<li class="nav-item">
          <!-- <a href="?c=Trabajador&a=Cumpleaños&m=Trabajador" class="navbar-brand" data-toggle="modal" data-target="#myModal">Cumpleaños</a> -->
					<a href="#" onclick="verModal()" class="navbar-brand" >Cumpleaños</a>
        </li>
			</ul>
    </div>
  </div>
</nav>


<!-- Modal -->
<div class="modal fade" id="modalCumpleaños" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalCumpleañosLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalCumpleañosLabel">Cumpleañeros del mes</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h1><span class="badge bg-warning">¡FELIZ CUMPLEAÑOS</span></h1>
        <?php foreach($this->model->ObtenerCumpleaños() as $r): ?>
        <ul class="list-group list-group-flush">
          <li class="list-group-item h5">* <?php echo $r->nombre." ".$r->apellidoPaterno." ".$r->apellidoMaterno ." / ".$r->fechaNacimiento ;  ?></li>
        </ul>
        <?php endforeach; ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

      </div>
    </div>
  </div>
</div>
