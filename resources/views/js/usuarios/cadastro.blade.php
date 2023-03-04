<script type="text/javascript">

  $(document).on('click', '#cadastroUsuario', function(e) { 
    e.stopImmediatePropagation();
    var email = document.getElementById("emailCadastroUsuario").value = '';
    var senha = document.getElementById("senhaCadastroUsuario").value = '';
    var nome = document.getElementById("nomeCadastroUsuario").value = '';
    var m_administrativo = document.getElementById("cadastro_m_administrativo").checked = false;
    var m_categorias = document.getElementById("cadastro_m_categorias").checked = false;
    var m_produtos = document.getElementById("cadastro_m_produtos").checked = false;
    var m_estoque = document.getElementById("cadastro_m_estoque").checked = false;


    $('#modal-cadastro-usuario').modal('show');


    $('#formCriacaoUsuario').on('submit',function(e) {

      e.preventDefault();
      e.stopImmediatePropagation();
      
      var table = $('#usuarios').DataTable();
      var email = document.getElementById("emailCadastroUsuario").value
      var senha = document.getElementById("senhaCadastroUsuario").value
      var nome = document.getElementById("nomeCadastroUsuario").value
      var m_administrativo = document.getElementById("cadastro_m_administrativo").checked
      var m_categorias = document.getElementById("cadastro_m_categorias").checked
      var m_produtos = document.getElementById("cadastro_m_produtos").checked
      var m_estoque = document.getElementById("cadastro_m_estoque").checked


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
        url: '{{ route("cadastrar.usuario") }}',
        type: 'POST',
        async: true,
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
          $('#modal-cadastro-usuario').modal('hide');
          Toast.fire({
            icon: 'success',
            title: 'Notificação<br> Usuário cadastrado com sucesso!',
          })
          contagemUsuarios();
          table.ajax.reload();
        },
        error: function () {
          Toast.fire({
            icon: 'error',
            title: 'Notificação<br> Erro ao cadastrar usuário!',
          })
          contagemUsuarios();
          table.ajax.reload();
        }
      });      
    });


  });
</script>