<script type="text/javascript">

  $(document).on('click', '#cadastroCategoria', function(e) { 
    e.stopImmediatePropagation();
    var nome = document.getElementById("nomeCadastroCategoria").value = '';
    document.getElementById("imagem").value = null;


    $('#modal-cadastro-categoria').modal('show');


    $('#myform').on('submit',function(e) { 
      e.preventDefault();
      e.stopImmediatePropagation();
      var table = $('#categorias').DataTable();
      var nome = document.getElementById("nomeCadastroCategoria").value

      var file_data = $('#imagem').prop('files')[0];  
      var fd = new FormData();

      if (file_data == null) {
        fd.append('imagem', 'X');
        fd.append('nova_imagem', 'nao');
      } else {
        fd.append('imagem', file_data);  
        fd.append('nova_imagem', 'sim');
      }
 
      fd.append('nome', nome);  


      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      $.ajax({
        url: '{{ route("cadastrar.categoria") }}',
        type: 'POST',
        data: fd,
        contentType: false,
        processData: false,
        success: function (response) {
          $('#modal-cadastro-categoria').modal('hide');
          Toast.fire({
            icon: 'success',
            title: 'Notificação<br> Categoria cadastrada com sucesso!',
          })
          contagemCategorias();
          carregarCategorias();
          table.ajax.reload(null, false);
        },
        error: function () {
          Toast.fire({
            icon: 'error',
            title: 'Notificação<br> Erro ao cadastrar categoria!',
          })
          carregarCategorias();
          contagemCategorias();
          table.ajax.reload(null, false);
        }
      });      
    });


  });
</script>