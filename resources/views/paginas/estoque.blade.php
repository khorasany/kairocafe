<!DOCTYPE html>
<html>
<title>Gestão | Estoque</title>
@include('includes.head')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
<script type="text/javascript" src="https://rawgit.com/vitmalina/w2ui/master/dist/w2ui.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://rawgit.com/vitmalina/w2ui/master/dist/w2ui.min.css" />
@include('includes.bodyClass')
<div class="wrapper">
  @include('includes.preloader')
  @include('includes.navbar')
  @include('includes.sidebar')

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Estoque</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('inicio') }}">Início</a></li>
              <li class="breadcrumb-item active">Estoque</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">



        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Produtos</h3>
              </div>

              <div class="card-body">
                <table class="table table-bordered table-striped" id="produtos">
                  <thead>
                    <tr>
                      <th>Nome</th>
                      <th>Quantidade</th>
                      <th>Categoria</th>
                      <th>Sub Categoria</th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
@include('includes.footer')
<aside class="control-sidebar control-sidebar-dark">
</aside>
</div>


<script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>



<div class="modal fade" id="modal-vincular-produto">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Cadastrar usuário</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form id="formCriacaoUsuario">

          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label>E-mail <span style="color:#ff0000">*</span></label>
                <input type="email" id="emailCadastroUsuario" class="form-control" maxlength="50" placeholder="E-mail" required="">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label>Senha <span style="color:#ff0000">*</span></label>
                <input type="text" id="senhaCadastroUsuario" class="form-control" maxlength="30" placeholder="Senha" required>
              </div>
            </div>
          </div>


          <div class="row">
            <div class="col-sm-12">

              <div class="form-group">
                <label>Nome <span style="color:#ff0000">*</span></label>
                <input type="text" id="nomeCadastroUsuario" class="form-control" maxlength="70" placeholder="Nome" required>
              </div>
            </div>
          </div>

          <form>
            <div class="row">
              <div class="col-sm-6">
                <p><strong>Módulos permitidos:</strong></p>

                <div class="form-group">
                  <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" id="cadastro_m_administrativo">
                    <label for="cadastro_m_administrativo" class="custom-control-label">Administrativo</label>
                  </div>
                  <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" id="cadastro_m_categorias">
                    <label for="cadastro_m_categorias" class="custom-control-label">Categorias</label>
                  </div>
                  <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" id="cadastro_m_produtos">
                    <label for="cadastro_m_produtos" class="custom-control-label">Produtos</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
              <button type="submit" id="salvarCriacaoUsuario" class="btn btn-success">Cadastrar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>





  <script type="text/javascript">

    $(document).on('click', '#vincularProduto', function(e) { 
      e.stopImmediatePropagation();
      var email = document.getElementById("emailCadastroUsuario").value = '';
      var senha = document.getElementById("senhaCadastroUsuario").value = '';
      var nome = document.getElementById("nomeCadastroUsuario").value = '';
      var m_administrativo = document.getElementById("cadastro_m_administrativo").checked = false;
      var m_categorias = document.getElementById("cadastro_m_categorias").checked = false;
      var m_produtos = document.getElementById("cadastro_m_produtos").checked = false;


      $('#modal-vincular-produto').modal('show');


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
          },
          success: function (response) {
            $('#modal-cadastro-usuario').modal('hide');
            Toast.fire({
              icon: 'success',
              title: 'Notificação<br> Usuário cadastrado com sucesso!',
            })
            contagemUsuarios();
            table.ajax.reload(null, false);
          },
          error: function () {
            Toast.fire({
              icon: 'error',
              title: 'Notificação<br> Erro ao cadastrar usuário!',
            })
            contagemUsuarios();
            table.ajax.reload(null, false);
          }
        });      
      });


    });
  </script>










  <script type="text/javascript">
    $(document).ready(function(){

      // DataTable
      $('#produtos').DataTable({
        order: [[1, 'asc']],
        processing: false,
        serverSide: true,
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,

        ajax: "{{route('getEstoque')}}",
        columns: [
        


        { data: 'nome' },
        { data: 'quantidade' },
        { data: 'categoria_nome' },
        { data: 'subcategoria_nome' },

        /*{data: "id" , render : function ( data, type, row, meta ) {
          return type === 'display'  ?
          `
          <button class="btn btn-warning" id="editarProduto" data-id="`+data+`" ><i class="fas fa-edit"></i></button>
          <button class="btn btn-danger" id="excluirProduto" data-id="`+data+`" ><i class="fas fa-trash"></i></button>

          ` :   
          data;
        }},*/

        ],
        'columnDefs': [



      {
        "targets": 3, // your case first column
        "className": "text-left"
      },

      {
        "targets": 2, // your case first column
        "className": "text-left"
      },

      {
        "targets": 1, // your case first column
        "className": "text-left"
      },

      {
        "targets": 0, // your case first column
        "className": "text-left"
      },

      ]
    });

    });
  </script>




  @include('includes.sweetalerts')
  @include('includes.scripts')


  <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
  <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
  <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
  <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
  <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
  <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

</body>
</html>
