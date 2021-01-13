<div class="container-fluid p-4">
  <div class="row">
    <div class="col-md-6 mx-auto">
      <div class="card" >

        <div class="card-body">
          <h1 class="card-title text-center">Cumpleañeros de <?php echo date("F") ?> </h1>

        </div>
        <img src="TRABAJADORES/vista/img/cumple.png" class="card-img-top" alt="..." width="100" height="300">
        <?php foreach($this->model->ObtenerCumpleaños() as $r): ?>
        <ul class="list-group list-group-flush">
          <li class="list-group-item display-6">* <?php echo $r->nombre." ".$r->apellidoPaterno." ".$r->apellidoMaterno ." / ".$r->fechaNacimiento ;  ?></li>
        </ul>
        <?php endforeach; ?>

      </div>
    </div>
  </div>
</div>
