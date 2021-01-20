$().ready(()=>{
  $("#frm-alumno").submit(function(){
    return $(this).validate();
  });


  $("#btn-guardar").on("click",()=>{
    agregar();
  });


  function agregar() {
    $.get("?c=Trabajador&a=Guardar&m=Trabajador&operacion=actualizar", $("#frm-trabajador").serialize()
      )
    .done((resultado)=>{
      resultado=JSON.parse(resultado);
      if (resultado.status) {
        Swal.fire(
        {
          title: 'Guardado',
          html: resultado.mensaje,
          icon: 'success',
          showCancelButton: false,
          confirmButtonColor: '#1B396A',
          confirmButtonText: 'Aceptar',
          allowOutsideClick: true
        }
        ).then(() => {
          window.location.href="?c=Trabajador&a=Index&m=Trabajador";
        });

      }else{
       Swal.fire(
       {
        title: 'Error de validación',
        html: resultado.mensaje,
        icon: 'error',
        showCancelButton: false,
        confirmButtonColor: '#1B396A',
        confirmButtonText: 'Aceptar',
        allowOutsideClick: true
      }
      );
     }
   })
    .fail(()=>{
      notificacion('Hubo un error en la conexión con el servidor','danger');
    });
  }



});


const verModal=()=>{
  $('#modalCumpleaños').modal('show');
}





function eliminar(id){

  Swal.fire({
    title: '¿Estas seguro que quieres eliminar este registro?',
    text: "¡No podras revertirlo!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: 'Cancelar',
    confirmButtonText: 'Si, eliminalo.'
  }).then((result) => {
    if (result.isConfirmed) {

      Swal.fire(
      {
        title: 'Eliminado',
        html: 'El registro ha sido eliminado',
        icon: 'success',
        showCancelButton: false,
        confirmButtonColor: '#1B396A',
        confirmButtonText: 'Aceptar',
        allowOutsideClick: true
      }
      )
      .then(() => {
        window.location.href="?c=Trabajador&a=Eliminar&m=Trabajador&id="+id;
      });


    } else {
      window.location.href="?c=Trabajador&a=Index&m=Trabajador";
    }
  })

}
