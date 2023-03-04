<script type="text/javascript">
  $(document).on('click', '#editarCategoria', function(e) {
    e.stopImmediatePropagation(); 
    var id = $(this).data("id");
    $.ajax({
      url: '{{ route("dados.categorias") }}/'+id,
      type: "GET",
      dataType: "json",
      async: false,
      success: function (data) {


        $('#modal-edicao-categoria').modal('show');
        document.getElementById("idCategoria").value = data[0]['id'];
        document.getElementById("nomeCategoria2").value = data[0]['nome'];
        document.getElementById("endImagem").value = 'imagens/categorias/'+data[0]['endereco_imagem'];
        $('#imagemCategoria').attr('src','imagens/categorias/'+data[0]['endereco_imagem']+'');


      },

      error: function(data) {
        Toast.fire({
          icon: 'error',
          title: 'Notificação<br> Erro ao consultar dados da categoria!',
        })

      }
    });







    $('#attCategoria').on('submit',function(e) {
      e.preventDefault();
      e.stopImmediatePropagation();
      var table = $('#categorias').DataTable();
      var id = document.getElementById("idCategoria").value
      var nome = document.getElementById("nomeCategoria2").value
      var end_imagem = document.getElementById("endImagem").value



      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      var file_data = $('#imagem2').prop('files')[0];  
      var fd = new FormData();
      console.log(file_data);

      if (file_data == null) {
        fd.append('imagem', end_imagem);
        fd.append('nova_imagem', 'nao');
      } else {
        fd.append('imagem', file_data);  
        fd.append('nova_imagem', 'sim');
      }

      fd.append('nome', nome);  


      $.ajax({
        url: '{{ route("alterar.dados.categoria") }}/'+id,
        type: 'POST',
        data: fd,
        contentType: false,
        processData: false,
        success: function (response) {
          $('#modal-edicao-categoria').modal('hide');
          Toast.fire({
            icon: 'success',
            title: 'Notificação<br> Categoria alterada com sucesso!',
          })
          table.ajax.reload( null, false );
          carregarCategorias();
        },
        error: function () {
          $('#modal-edicao-categoria').modal('hide');
          Toast.fire({
            icon: 'success',
            title: 'Notificação<br> Categoria alterada com sucesso!',
          })
          table.ajax.reload( null, false );
          carregarCategorias();
        }
      });      
    });








  });
</script>