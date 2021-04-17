var pedido={
    init:function(){
     pedido.initTable();
     pedido.addEvents();
    },
    addEvents:function(){

    },
    initTable:function(){
        $('#tb-pedidos').DataTable({

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
     pedido.init();
    })
