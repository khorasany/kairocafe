  <script type="text/javascript">

    contagemCategorias();
    

    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    $(document).on('click', '#excluirCategoria', function() {
      $('#exclurCategoria').off().click(function(){});
      var table = $('#categorias').DataTable();
      var id = $(this).data("id");
      var tr = $(this).closest('tr');
      var tr2 = $(this).parents('tr');


      $.ajax({
        url: '{{ route("dados.categorias") }}/'+id,
        type: "GET",
        dataType: "json",
        async: false,
        success: function (data) {

          $('#modal-excluir-categoria').modal('show');
          document.getElementById("nomeExCategoria").innerHTML = data[0]['nome'];         


          
        },

        error: function(data) {
          Toast.fire({
            icon: 'error',
            title: 'Notificação<br> Erro ao consultar dados da categoria!',
          })
        }

      });


      $('#salvar').on("click", function (){
        $('#salvar').off().click(function(){});
        $('#modal-excluir-categoria').modal('hide'); 

        $.ajax(
        {
          url: "{{ route('excluir.categoria') }}/"+id,
          type: 'GET',
          async: false,
          success: function (){
            Toast.fire({
              icon: 'success',
              title: 'Notificação<br> Categoria excluída com sucesso!',
            })
            tr.fadeOut(200, function(){
              table.ajax.reload( null, false )
              contagemCategorias();
              contagemSubCategorias();
              carregarCategorias();
              $(this).remove();
            });
          },

          error: function(data) {
            Toast.fire({
              icon: 'error',
              title: 'Notificação<br> Erro ao excluir categoria!',
            })
          }

        });
      });


    });



  </script>
