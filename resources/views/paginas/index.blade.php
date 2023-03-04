<!DOCTYPE html>
<html>
<title>Gestão | Início</title>
@include('includes.head')
@include('includes.bodyClass')
<div class="wrapper">
  @include('includes.preloader')
  @include('includes.navbar')
  @include('includes.sidebar')

  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Início</a></li>
            </ol>
          </div>
        </div>
      </div>
    </div>
   </div>
  
  @include('includes.footer')
  
  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>

<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>

@include('includes.scripts')

</body>
</html>
