<script type="text/javascript">
  $(document).on('click', '#editarSubCategoria', function(e) {
    e.stopImmediatePropagation(); 
    var id = $(this).data("id");
    $.ajax({
      url: '{{ route("dados.subcategorias") }}/'+id,
      type: "GET",
      dataType: "json",
      async: false,
      success: function (data) {


        $('#modal-edicao-subcategoria').modal('show');
        document.getElementById("idSubCategoria").value = data[0]['id'];
        document.getElementById("nomeSubCategoria").value = data[0]['nome'];
        document.getElementById("endImagemSub").value = 'imagens/categorias/'+data[0]['endereco_imagem'];
        $('#imagemSubCategoria').attr('src','imagens/categorias/'+data[0]['endereco_imagem']+'');


      },

      error: function(data) {
        Toast.fire({
          icon: 'error',
          title: 'Notificação<br> Erro ao consultar dados da sub categoria!',
        })

      }
    });







    $('#attCategoria2').on('submit',function(e) { 
      e.preventDefault();
      e.stopImmediatePropagation();
      var table = $('#subcategorias').DataTable();
      var id = document.getElementById("idSubCategoria").value
      var nome = document.getElementById("nomeSubCategoria").value
      var end_imagem = document.getElementById("endImagemSub").value



      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      var file_data = $('#imagem3').prop('files')[0];  
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
        url: '{{ route("alterar.dados.subcategoria") }}/'+id,
        type: 'POST',
        data: fd,
        contentType: false,
        processData: false,
        success: function (response) {
          $('#modal-edicao-subcategoria').modal('hide');
          Toast.fire({
            icon: 'success',
            title: 'Notificação<br> Sub Categoria alterada com sucesso!',
          })
          table.ajax.reload(null, false);
        },
        error: function () {
          $('#modal-edicao-subcategoria').modal('hide');
          Toast.fire({
            icon: 'success',
            title: 'Notificação<br> Sub Categoria alterada com sucesso!',
          })
          table.ajax.reload(null, false);
        }
      });      
    });








  });
</script>