<!DOCTYPE html>
<html>
@include('includes.headLogin')
<body class="hold-transition login-page">
<div class="login-box">
  <div class="card card-outline card-danger">
    <div class="card-header text-center">
      <!--<img src="imagens/logo1.png" style="width:30%">-->
      <br>
      <a href="" class="h1"><b>R</b>estaurante</a>
    </div>
    <div class="card-body">

      @if (isset($_GET['retorno']))

      @if ($_GET['retorno'] == '1')

      <div class="callout callout-danger">
          <p>E-mail ou senha incorretos!</p>
      </div>

      @elseif ($_GET['retorno'] == '2')

      <div class="callout callout-warning">
          <p>Senha incorreta!</p>
      </div>

      @elseif ($_GET['retorno'] == '3')

      <div class="callout callout-danger">
          <p>E-mail não registrado!</p>
      </div>

      @elseif ($_GET['retorno'] == '4')

      <div class="callout callout-danger">
          <p>Erro desconhecido!</p>
      </div>

      @elseif ($_GET['retorno'] == '5')

      <div class="callout callout-primary">
          <p>Você não está autenticado!</p>
      </div>

      @endif

      @endif

      <form action="{{ route('loginApi') }}" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="E-mail">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Senha">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <input type="submit" class="btn btn-danger btn-block" value="Login">
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center mt-2 mb-3">
        
        
      </div>
      
    </div>
  </div>
</div>

@include('includes.scriptsLogin')

</body>
</html>
