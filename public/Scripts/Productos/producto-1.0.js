var produto={
init:function(){
 produto.initTable();
 produto.addEvents();
},
addEvents:function(){
    $('.btn-update').click(function(){
        var $object=$(this).data().object;

        var $form=$('#form-update');
        console.log($form);
        $form.find('#nombre').val($object.nombre);
        $form.find('#descripcion').val($object.descripcion);
        $form.find('#precio').val($object.precio);
        $form.find('#contenido').val($object.contenido);
        $form.find('#cantidad').val($object.cantidad);

        $("#id").val($object.id);
    })
},
initTable:function(){
    $('#tb-productos').DataTable({

        "lengthMenu": [[10, 15, 20, -1], [10, 15, 20, "Todos"]],
        "language": {
      "url":"//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
        },
        "paging":   true,
        "ordering": true,
        "info":     false,
        "lengthChange": false,
        "searching": true,
    }
    );
}

}

$(document).ready(function() {
 produto.init();
})
