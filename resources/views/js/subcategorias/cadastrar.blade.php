<script type="text/javascript">

  $(document).on('click', '#cadastroSubCategoria', function(e) { 
    e.stopImmediatePropagation();
    var nome = document.getElementById("nomeCadastroSubCategoria").value = '';
    document.getElementById("imagemSub").value = null;
    


    $('#modal-cadastro-subcategoria').modal('show');

    carregarCategoriasSub();


    $('#formsub').on('submit',function(e) { 
      e.preventDefault();
      e.stopImmediatePropagation();
      var table = $('#categorias').DataTable();
      var table2 = $('#subcategorias').DataTable();
      var nome = document.getElementById("nomeCadastroSubCategoria").value
      var categoria_pai = document.getElementById("categoriasListaSub").value

      var file_data = $('#imagemSub').prop('files')[0];  
      var fd = new FormData();

      if (file_data == null) {
        fd.append('imagem', 'X');
        fd.append('nova_imagem', 'nao');
      } else {
        fd.append('imagem', file_data);  
        fd.append('nova_imagem', 'sim');
      }

      fd.append('nome', nome); 
      fd.append('categoria_pai', categoria_pai);  

      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });



      $.ajax({
        url: '{{ route("cadastrar.subcategoria") }}',
        type: 'POST',
        data: fd,
        contentType: false,
        processData: false,
        success: function (response) {
          $('#modal-cadastro-subcategoria').modal('hide');
          Toast.fire({
            icon: 'success',
            title: 'Notificação<br>Sub Categoria cadastrada com sucesso!',
          })
          contagemCategorias();
          contagemSubCategorias();
          carregarCategorias();
          table.ajax.reload(null, false);
          //table2.ajax.destroy();
          //table2.ajax.reload(null, false);

        },
        error: function () {
          Toast.fire({
            icon: 'error',
            title: 'Notificação<br> Erro ao cadastrar Sub Categoria!',
          })
          contagemCategorias();
          contagemSubCategorias();
          carregarCategorias();
          table.ajax.reload(null, false);
          //table2.ajax.reload(null, false);
        }
      });      
    });


  });
</script>