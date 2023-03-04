<!DOCTYPE html>
<html>
<title>Gestão | Produtos</title>
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
            <h1>Produtos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('inicio') }}">Início</a></li>
              <li class="breadcrumb-item active">Produtos</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">

        <div class="row">
          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <h3 id="produtosContagem"></h3>
                <p>Produtos</p>
              </div>
              <div class="icon">
                <i class="ion ion-beer"></i>
              </div>
              <a href="#" id="cadastrarProduto" class="small-box-footer">Cadastrar novo <i class="fas fa-plus"></i></a>
            </div>
          </div>
        </div>

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
                      <th>Imagem</th>
                      <th>Nome</th>
                      <th>Categoria</th>
                      <th>Sub Categoria</th>
                      <th>Ação</th>
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

@include('modals.produtos.cadastro')
@include('modals.produtos.visualizar')
@include('modals.produtos.edicao')
@include('modals.produtos.exclusao')


@include('js.produtos.carregartabela')
@include('js.produtos.carregarselect1')
@include('js.produtos.carregarselect2')
@include('js.produtos.contagem')
@include('js.produtos.cadastrar')
@include('js.produtos.visualizar')
@include('js.produtos.edicao')
@include('js.produtos.exclusao')



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
