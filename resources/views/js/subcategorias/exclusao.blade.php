  <script type="text/javascript">

    contagemCategorias();
    contagemSubCategorias();

    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    $(document).on('click', '#excluirSubCategoria', function() {
      $('#exclurSubCategoria').off().click(function(){});
      var table = $('#subcategorias').DataTable();
      var id = $(this).data("id");
      var tr = $(this).closest('tr');
      var tr2 = $(this).parents('tr');


      $.ajax({
        url: '{{ route("dados.subcategorias") }}/'+id,
        type: "GET",
        dataType: "json",
        async: false,
        success: function (data) {

          $('#modal-excluir-subcategoria').modal('show');
          document.getElementById("nomeExSubCategoria").innerHTML = data[0]['nome'];         


          
        },

        error: function(data) {
          Toast.fire({
            icon: 'error',
            title: 'Notificação<br> Erro ao consultar dados da Sub categoria!',
          })
        }

      });


      $('#salvarExclusaoSub').on("click", function (e){
        e.stopImmediatePropagation();
        $('#salvarExclusaoSub').off().click(function(){});
        $('#modal-excluir-subcategoria').modal('hide'); 

        $.ajax(
        {
          url: "{{ route('excluir.subcategoria') }}/"+id,
          type: 'GET',
          async: false,
          success: function (){
            Toast.fire({
              icon: 'success',
              title: 'Notificação<br> Sub Categoria excluída com sucesso!',
            })
            tr.fadeOut(200, function(){
              table.ajax.reload(null, false);
              contagemCategorias();
              $(this).remove();
            });
          },

          error: function(data) {
            Toast.fire({
              icon: 'error',
              title: 'Notificação<br> Erro ao excluir Sub categoria!',
            })
          }

        });
      });


    });



  </script>
