

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

  window.location.href="?c=Trabajador&a=Eliminar&m=Trabajador&id="+id;
    return
    if (result.isConfirmed) {
      Swal.fire(
        'Eliminado',
        'El registro ha sido eliminado',
        'success'
      )
    }
  })

}
