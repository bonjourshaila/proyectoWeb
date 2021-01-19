

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
      window.location.href="?c=Trabajador&a=Eliminar&m=Trabajador&id="+id;
      Swal.fire(
        'Eliminado',
        'El registro ha sido eliminado',
        'success'
      )
    } else {
      window.location.href="?c=Trabajador&a=Index&m=Trabajador";
    }
  })

}
