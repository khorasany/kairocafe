<script type="text/javascript">
  $('#categoriasLista').on('change', function() {


    var catID = this.value;
    var table = $('#subcategorias').DataTable();




    $.ajax({
      url: "{{route('getSubCategorias2')}}/"+catID,
      type: "GET",
      dataType: "json",
      async: false,
      success: function (data) {
        console.log(data['resultados']);
        if (data['resultados'] >= 1) {
          Toast.fire({
            icon: 'success',
            title: 'Notificação<br> Sub Categorias carregadas com sucesso!',
          })

          
          
          table.destroy();
          carregarSubCat();
          
        } else {
          Toast.fire({
            icon: 'error',
            title: 'Notificação<br> Não existem sub categorias!',
          })
          table.clear();
          table.destroy();
        }
      },

      error: function(data) {
        Toast.fire({
          icon: 'error',
          title: 'Notificação<br> Erro ao carregar sub categorias!',
        })
        table.destroy();

      }

    });

    function carregarSubCat() {



      // DataTable
      $('#subcategorias').DataTable({
        order: [[0, 'asc']],
        processing: false,
        serverSide: false,
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,

        ajax: "{{route('getSubCategorias2')}}/"+catID,
        columns: [
        { data: 'nome' },

        {data: "endereco_imagem" , render : function ( data, type, row, meta ) {
          return type === 'display'  ?
          `
          <img src='imagens/categorias/`+data+`' style='width:3em;height:3em;'> 

          ` :   
          data;
        }},

        { data: 'produtos_quant' },


        {data: "id" , render : function ( data, type, row, meta ) {
          return type === 'display'  ?
          `
          <button class="btn btn-warning" id="editarSubCategoria" data-id="`+data+`" ><i class="fas fa-edit"></i></button>
          <button class="btn btn-danger" id="excluirSubCategoria" data-id="`+data+`" ><i class="fas fa-trash"></i></button>


          ` :   
          data;
        }},

        ],
        'columnDefs': [
        
        {
        "targets": 3, // your case first column
        "className": "text-right"
      },
      {
        "targets": 2, // your case first column
        "className": "text-left"
      },

      {
        "targets": 1, // your case first column
        "className": "text-left"
      },

      {
        "targets": 0, // your case first column
        "className": "text-left"
      },

      ]
    });
    }

  });
</script>