var cliente={
    init:function(){
     cliente.initTable();
     cliente.addEvents();
    },
    addEvents:function(){
        $('.btn-update').click(function(){
            var $object=$(this).data().object;

            var $form=$('#form-update');
            console.log($form);
            $form.find('#nombre').val($object.nombre);
            $form.find('#primer_apellido').val($object.primer_apellido);
            $form.find('#segundo_apellido').val($object.segundo_apellido);


            $("#id").val($object.id);
        })
    },
    initTable:function(){
        $('#tb-clientes').DataTable({

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
     cliente.init();
    })
