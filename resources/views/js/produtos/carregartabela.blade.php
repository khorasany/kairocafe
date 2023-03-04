<script type="text/javascript">
  $(document).ready(function(){

      // DataTable
      $('#produtos').DataTable({
        order: [[2, 'asc']],
        processing: false,
        serverSide: true,
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,

        ajax: "{{route('getProdutos')}}",
        columns: [
        

        {data: "imagem" , render : function ( data, type, row, meta ) {
          return type === 'display'  ?
          `
          <img src='imagens/produtos/`+data+`' style='width:3em;height:3em;'> 

          ` :   
          data;
        }},
        { data: 'nome' },
        { data: 'categoria_nome' },
        { data: 'subcategoria_nome' },

        {data: "id" , render : function ( data, type, row, meta ) {
          return type === 'display'  ?
          `
          <button class="btn btn-primary" id="visualizarProduto" data-id="`+data+`" ><i class="fas fa-eye"></i></button>
          <button class="btn btn-warning" id="editarProduto" data-id="`+data+`" ><i class="fas fa-edit"></i></button>
          <button class="btn btn-danger" id="excluirProduto" data-id="`+data+`" ><i class="fas fa-trash"></i></button>

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