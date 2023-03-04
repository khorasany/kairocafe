<script type="text/javascript">
  $(document).on('click', '#editarUsuario', function(e) {
    e.stopImmediatePropagation(); 
    var id = $(this).data("id");
    $.ajax({
      url: '{{ route("dados.usuario") }}/'+id,
      type: "GET",
      dataType: "json",
      async: false,
      success: function (data) {

        const criado = moment(data[0]['criado']).format('DD/MM/YYYY HH:mm');
        const atualizado = moment(data[0]['atualizado']).format('DD/MM/YYYY HH:mm');


        $('#modal-edicao-usuario').modal('show');
        document.getElementById("idUsuario").value = data[0]['id'];
        document.getElementById("emailUsuario").value = data[0]['email'];
        document.getElementById("senhaUsuario").value = data[0]['password'];
        document.getElementById("nomeUsuario").value = data[0]['nome'];
        document.getElementById("criadoUsuario").value = criado;
        document.getElementById("atualizadoUsuario").value = atualizado;

        if (data[0]['m_administrativo'] == 'sim') {
          document.getElementById("m_administrativo").checked = true;
        } else {
          document.getElementById("m_administrativo").checked = false;
        }


        if (data[0]['m_categorias'] == 'sim') {
          document.getElementById("m_categorias").checked = true;
        } else {
          document.getElementById("m_categorias").checked = false;
        }


        if (data[0]['m_produtos'] == 'sim') {
          document.getElementById("m_produtos").checked = true;
        } else {
          document.getElementById("m_produtos").checked = false;
        }


        if (data[0]['m_estoque'] == 'sim') {
          document.getElementById("m_estoque").checked = true;
        } else {
          document.getElementById("m_estoque").checked = false;
        }


      },

      error: function(data) {
        Toast.fire({
          icon: 'error',
          title: 'Notificação<br> Erro ao consultar dados do usuário!',
        })

      }
    });







    $('#formEdicaoUsuario').on('submit',function(e) { 
      e.preventDefault();
      e.stopImmediatePropagation();
      var table = $('#usuarios').DataTable();
      var id = document.getElementById("idUsuario").value
      var email = document.getElementById("emailUsuario").value
      var senha = document.getElementById("senhaUsuario").value
      var nome = document.getElementById("nomeUsuario").value
      var m_administrativo = document.getElementById("m_administrativo").checked
      var m_categorias = document.getElementById("m_categorias").checked
      var m_produtos = document.getElementById("m_produtos").checked
      var m_estoque = document.getElementById("m_estoque").checked


      if (m_administrativo == true) {
        m_administrativo = 'sim';
      } else {
        m_administrativo = 'nao';
      }


      if (m_categorias == true) {
        m_categorias = 'sim';
      } else {
        m_categorias = 'nao';
      }


      if (m_produtos == true) {
        m_produtos = 'sim';
      } else {
        m_produtos = 'nao';
      }


      if (m_estoque == true) {
        m_estoque = 'sim';
      } else {
        m_estoque = 'nao';
      }


      $.ajax({
        url: '{{ route("alterar.dados.usuario") }}/'+id,
        type: 'POST',
        data: {
          "_token":"{{ csrf_token() }}",
          "email": email,
          "senha": senha,
          "nome": nome,
          "m_administrativo": m_administrativo,
          "m_categorias": m_categorias,
          "m_produtos": m_produtos,
          "m_estoque": m_estoque,
        },
        success: function (response) {
          $('#modal-edicao-usuario').modal('hide');
          Toast.fire({
            icon: 'success',
            title: 'Notificação<br> Usuário alterado com sucesso!',
          })
          table.ajax.reload();
        },
        error: function () {
          Toast.fire({
            icon: 'error',
            title: 'Notificação<br> Erro ao alterar dados do usuário!',
          })
          table.ajax.reload();
        }
      });      
    });








  });
</script>