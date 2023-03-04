<aside class="main-sidebar sidebar-dark-danger elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <!--<img src="{{ asset('imagens/logo1.png') }}" alt="" class="brand-image img-circle elevation-3">-->
    <span class="brand-text font-weight-light">Gerenciar</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
       <li class="nav-item">
        <a href="{{ route('home') }}" class="nav-link @if (Request::is('home')) active @endif">
          <i class="nav-icon fas fa-home"></i>
          <p>
            Início                
          </p>
        </a>
      </li>

      @if (session()->get('m_administrativo') == 'sim')
      <li class="nav-item @if (Request::is('admin/*')) menu-open @endif">
        <a href="#" class="nav-link @if (Request::is('admin/*')) active @endif">
          <i class="nav-icon fas fa-bars"></i>
          <p>
            Administrativo
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{ route('usuarios') }}" class="nav-link @if (Request::is('admin/usuarios')) active @endif">
              <i class="fa fa-users nav-icon"></i>
              <p>Usuários</p>
            </a>
          </li>
        
         



        </ul>
      </li>
      @endif


      <li class="nav-header">SISTEMA</li>

      @if (session()->get('m_categorias') == 'sim')
      <li class="nav-item">
        <a href="{{ route('categorias') }}" class="nav-link  @if (Request::is('categorias')) active @endif">
          <i class="nav-icon fa fa-archive"></i>
          <p>
            Categorias/Sub
          </p>
        </a>
      </li>

      

      @endif
      @if (session()->get('m_estoque') == 'sim')
      <li class="nav-item @if (Request::is('estoque/*')) menu-open @endif">
        <a href="#" class="nav-link @if (Request::is('estoque/*')) active @endif">
          <i class="nav-icon fa fa-box nav-icon"></i>
          <p>
            Estoque
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{ route('estoque') }}" class="nav-link @if (Request::is('estoque/visualizar')) active @endif">
              <i class="fas fa-arrow-right"></i>
              <p>Visualizar</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('estoque.entradas') }}" class="nav-link @if (Request::is('estoque/entradas')) active @endif">
              <i class="fas fa-arrow-right"></i>
              <p>Entradas</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('estoque.saidas') }}" class="nav-link @if (Request::is('estoque/saidas')) active @endif">
              <i class="fas fa-arrow-right"></i>
              <p>Saídas</p>
            </a>
          </li>
        </ul>
      </li>
      @endif
      @if (session()->get('m_produtos') == 'sim')
      <li class="nav-item">
        <a href="{{ route('produtos') }}" class="nav-link @if (Request::is('produtos')) active @endif">
          <i class="nav-icon fa fa-beer"></i>
          <p>
            Produtos
          </p>
        </a>
      </li>
      @endif
    </ul>
  </li>
</ul>
</nav>
<!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>