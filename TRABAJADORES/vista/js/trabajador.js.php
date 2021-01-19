$().ready(()=>{
  $("#frm-alumno").submit(function(){
      return $(this).validate();
  });
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
