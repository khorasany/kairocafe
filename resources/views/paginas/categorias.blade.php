<!DOCTYPE html>
<html>
<title>Gestão | Categorias e Sub categorias</title>
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
            <h1>Categorias e Sub-Categorias</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('inicio') }}">Início</a></li>
              <li class="breadcrumb-item active">Categorias e Sub-categorias</li>
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
                <h3 id="categoriasContagem"></h3>
                <p>Categorias</p>
              </div>
              <div class="icon">
                <i class="ion ion-archive"></i>
              </div>
              <a href="#" id="cadastroCategoria" class="small-box-footer">Criar nova <i class="fas fa-plus"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <h3 id="subcategoriasContagem"></h3>
                <p>Sub Categorias</p>
              </div>
              <div class="icon">
                <i class="ion ion-archive"></i>
              </div>
              <a href="#" id="cadastroSubCategoria" class="small-box-footer">Criar nova <i class="fas fa-plus"></i></a>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Categorias</h3>
              </div>

              <div class="card-body">
                <table class="table table-bordered table-striped" id="categorias">
                  <thead>
                    <tr>
                      <th>Nome</th>
                      <th>Imagem</th>
                      <th>Produtos (Qt)</th>
                      <th>Sub Categorias (Qt)</th>
                      <th>Ação</th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Sub-Categorias</h3>
                <br><br>
                <select class="custom-select" id="categoriasLista">
                  <option>Selecione a categoria</option>
                </select>
              </div>

              <div class="card-body">
                <table class="table table-bordered table-striped" id="subcategorias">
                  <thead>
                    <tr>
                      <th>Nome</th>
                      <th>Imagem</th>
                      <th>Produtos (Qt)</th>
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

@include('js.categorias.contagem')
@include('js.categorias.cadastrar')
@include('js.categorias.exclusao')
@include('js.categorias.edicao')
@include('js.categorias.carregartabela')
@include('js.categorias.carregarcategorias')

@include('js.subcategorias.contagem')
@include('js.subcategorias.carregarcategorias')
@include('js.subcategorias.carregartabelasub')
@include('js.subcategorias.cadastrar')
@include('js.subcategorias.edicao')
@include('js.subcategorias.exclusao')

@include('modals.categorias.cadastro')
@include('modals.categorias.exclusao')
@include('modals.categorias.edicao')

@include('modals.subcategorias.edicao')
@include('modals.subcategorias.exclusao')
@include('modals.subcategorias.cadastro')

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
