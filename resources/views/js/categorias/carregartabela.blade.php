<script type="text/javascript">
  $(document).ready(function(){

      // DataTable
      $('#categorias').DataTable({
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

        ajax: "{{route('getCategorias')}}",
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
        { data: 'subcategorias_quant' },

        {data: "id" , render : function ( data, type, row, meta ) {
          return type === 'display'  ?
          `
          <button class="btn btn-warning" id="editarCategoria" data-id="`+data+`" ><i class="fas fa-edit"></i></button>
          <button class="btn btn-danger" id="excluirCategoria" data-id="`+data+`" ><i class="fas fa-trash"></i></button>


          ` :   
          data;
        }},

        ],
        'columnDefs': [
        
        {
        "targets": 4, // your case first column
        "className": "text-right"
      },

      {
        "targets": 3, // your case first column
        "className": "text-left"
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

    });
  </script>