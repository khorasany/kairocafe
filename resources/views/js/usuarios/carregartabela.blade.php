<script type="text/javascript">
  $(document).ready(function(){

      // DataTable
      $('#usuarios').DataTable({
        order: [[2, 'asc']],
        processing: false,
        serverSide: false,
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,

        ajax: "{{route('getUsuarios')}}",
        columns: [
        { data: 'nome' },
        { data: 'email' },
        { data: 'criado' },
        { data: 'atualizado' },
        {data: "id" , render : function ( data, type, row, meta ) {
          return type === 'display'  ?
          `
          <button class="btn btn-warning" id="editarUsuario" data-id="`+data+`" ><i class="fas fa-edit"></i></button>
          <button class="btn btn-danger" id="excluirUsuario" data-id="`+data+`" ><i class="fas fa-trash"></i></button>


          ` :   
          data;
        }},

        ],
        
        'columnDefs': [
        {
        "targets": 4, // your case first column
        "className": "text-right"
      }

      ]
    });

    });
  </script>