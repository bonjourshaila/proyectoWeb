
var idGlobal = null;

$().ready(()=>{
  $("#frm-alumno").submit(function(){
    return $(this).validate();
  });


  $("#btn-guardar").on("click",()=>{
    agregar();
  });


  $("#btn-editar-tel").on("click",()=>{
    editarTel();
  });


  $("#btn-nuevo-tel").on("click",()=>{
    nuevoTel();
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


  function editarTel() {
    $.get("?c=Trabajador&a=EditarTel&m=Trabajador", $("#frm-editar-telefono").serialize()
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


  function nuevoTel() {
    $.get("?c=Trabajador&a=NuevoTel&m=Trabajador", $("#frm-nuevo-telefono").serialize()
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

// Modal de cumpleaños
const verModal=()=>{
  $('#modalCumpleaños').modal('show');
}

//Modal de crud de tel
const verModalTel=(nombre, id)=>{
  $('#span-nombre').html( nombre);
  $('#modalTel').modal('show');
  verTablaTel(id);
  ;
}

//Modal de form de tel
const verFormTel=(telefono, tipoTEl, idTelefono)=>{
  $('#modalFormEditarTel').modal('show');
  $('#input-editar-tel').val(telefono);
  $('#select-editar-tipo-tel').val(tipoTEl);
  $('#hidden-idTel').val(idTelefono);


}

// Modal del formulario de un nuevo telefono
const verFormTelNuevo=()=>{
  $('#modalFormNuevoTel').modal('show');
}




function verTablaTel(id) {
  $.get("?c=Trabajador&a=ListarTelefonos&m=Trabajador", {id: id}
    )
  .done((resultado)=>{
    resultado=JSON.parse(resultado);
    if (resultado.status) {

      $("#tbody-tels").html("")
      $('#hidden-idTrabajador').val(id);


      $.each(resultado.datos, function( index, valor ) {




        $("#tbody-tels").append("<tr>"+
          "<td>"+valor.telefono+"</td>"+
          "<td>"+valor.tipoTEl+"</td>"+
          "<td>"+
            "<a  onclick=\"verFormTel('"+valor.telefono+"','"+valor.idTipoTel+"','"+valor.idTelefono+"')\" class='btn btn-warning'> Editar</a>"+
          "</td>"+
          "<td>"+
            "<a class='btn btn-danger' onclick=\"eliminarTel('"+valor.idTelefono+"')\" > Eliminar</a>"+
           "</td>"+
        "</tr>");
      });

    }else{

   }
 })
  .fail(()=>{
    notificacion('Hubo un error en la conexión con el servidor','danger');
  });
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



function eliminarTel(idTelefono){

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
        window.location.href="?c=Trabajador&a=EliminarTel&m=Trabajador&id="+idTelefono;
      });


    } else {
      window.location.href="?c=Trabajador&a=Index&m=Trabajador";
    }
  })

}
