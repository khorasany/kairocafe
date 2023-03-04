  <script type="text/javascript">

    contagemUsuarios();

    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    $(document).on('click', '#excluirUsuario', function() {
      $('#exclurUsuario').off().click(function(){});
      var table = $('#usuarios').DataTable();
      var id = $(this).data("id");
      var tr = $(this).closest('tr');
      var tr2 = $(this).parents('tr');


      $.ajax({
        url: '{{ route("dados.usuario") }}/'+id,
        type: "GET",
        dataType: "json",
        async: false,
        success: function (data) {

          $('#modal-excluir-usuario').modal('show');
          document.getElementById("nomeExUsuario").innerHTML = data[0]['nome'];         


          
        },

        error: function(data) {
          Toast.fire({
            icon: 'error',
            title: 'Notificação<br> Erro ao consultar dados do usuário!',
          })
        }

      });


      $('#salvar').on("click", function (){
        $('#salvar').off().click(function(){});
        $('#modal-excluir-usuario').modal('hide'); 

        $.ajax(
        {
          url: "{{ route('excluir.usuario') }}/"+id,
          type: 'GET',
          async: false,
          success: function (){
            Toast.fire({
              icon: 'success',
              title: 'Notificação<br> Usuário excluído com sucesso!',
            })
            tr.fadeOut(200, function(){
              table.ajax.reload();
              contagemUsuarios();
              $(this).remove();
            });
          },

          error: function(data) {
            Toast.fire({
              icon: 'error',
              title: 'Notificação<br> Erro ao excluir usuário!',
            })
          }

        });
      });


    });



  </script>
