  <script type="text/javascript">

    contagemProdutos();

    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    $(document).on('click', '#excluirProduto', function() {
      $('#exclurProduto').off().click(function(){});
      var table = $('#produtos').DataTable();
      var id = $(this).data("id");
      var tr = $(this).closest('tr');
      var tr2 = $(this).parents('tr');


      $.ajax({
        url: '{{ route("dados.produto") }}/'+id,
        type: "GET",
        dataType: "json",
        async: false,
        success: function (data) {

          $('#modal-excluir-produto').modal('show');
          document.getElementById("nomeExProduto").innerHTML = data[0]['nome'];         


          
        },

        error: function(data) {
          Toast.fire({
            icon: 'error',
            title: 'Notificação<br> Erro ao consultar dados do produto!',
          })
        }

      });


      $('#salvarExclusaoProduto').on("click", function (e){
        e.stopImmediatePropagation();
        $('#salvarExclusaoProduto').off().click(function(){});
        $('#modal-excluir-produto').modal('hide'); 

        $.ajax(
        {
          url: "{{ route('excluir.produto') }}/"+id,
          type: 'GET',
          async: false,
          success: function (){
            Toast.fire({
              icon: 'success',
              title: 'Notificação<br> Produto excluído com sucesso!',
            })
            tr.fadeOut(200, function(){
              table.ajax.reload( null, false );
              contagemProdutos();
              $(this).remove();
            });
          },

          error: function(data) {
            Toast.fire({
              icon: 'error',
              title: 'Notificação<br> Erro ao excluir produto!',
            })
          }

        });
      });


    });



  </script>
