<!DOCTYPE html>
<html>
<title>Gestão | Entradas/Estoque</title>
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
            <h1>Entradas</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('inicio') }}">Início</a></li>
              <li class="breadcrumb-item active">Estoque / Entradas</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">


        <div class="row">
          <div class="col-6">
            <button type="button" class="btn btn-success" id="novaEntrada" name="button">Nova entrada</button>
          </div>
        </div>

        <br>

        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Entradas</h3>
              </div>

              <div class="card-body">
                <table class="table table-bordered table-striped" id="entradas">
                  <thead>
                    <tr>
                      <th>Produto</th>
                      <th>Quantidade</th>
                      <th>Valor</th>
                      <th>Data e Hora</th>
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

<script type="text/javascript">  
  var Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
  });
</script>

<div class="modal fade" id="modal-nova-entrada">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Nova entrada</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">



        <form id="formEntrada">
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label>Produto <span style="color:#ff0000">*</span></label>

                <input type="text" name="search" id="search" placeholder="Buscar produto" class="form-control" autocomplete="off" />

                <ul class="list-group" id="result"></ul>

              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label>ID <span style="color:#ff0000">*</span></label>
                <input type="text" id="idProduto" class="form-control" placeholder="" maxlength="4" disabled>
              </div>
            </div>
          </div>


          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label>Valor <span style="color:#ff0000">*</span></label>
                <input type="tel" id="valor" class="form-control" onkeyup="k(this);" placeholder="Valor" maxlength="15" autocomplete="off" required>
              </div>
            </div>


            <div class="col-sm-6">
              <div class="form-group">
                <label>Quantidade <span style="color:#ff0000">*</span></label>
                <input type="tel" id="quantidade" class="form-control" placeholder="Quantidade" maxlength="10" autocomplete="off" required>
              </div>
            </div>
          </div>



          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            <button type="submit" id="salvarEntrada" class="btn btn-success">Registrar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>




<div class="modal fade" id="modal-excluir-entrada">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Confirme a ação</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p><strong>Ao excluir a entrada, o estoque também será alterado para a quantidade anterior</strong></p>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        <button type="button" id="salvarExclusaoEntrada" class="btn btn-danger">Excluir</button>
      </div>
    </div>

  </div>

</div>




<script type="text/javascript">
 function k(i) {
  var v = i.value.replace(/\D/g,'');
  v = (v/100).toFixed(2) + '';
  v = v.replace(".", ",");
  v = v.replace(/(\d)(\d{3})(\d{3}),/g, "$1.$2.$3,");
  v = v.replace(/(\d)(\d{3}),/g, "$1.$2,");
  i.value = v;
}
</script>

<script src="{{ asset('jquery.mask.js') }}"></script>




<script type="text/javascript">
  $(document).on('click', '#novaEntrada', function(e) {
    e.stopImmediatePropagation(); 

    $('#modal-nova-entrada').modal('show');
    $('#result').empty();
    $('#idProduto').val("");
    $('#valor').val("");
    $('#quantidade').val("");
    $('#search').val("");
    $("#salvarEntrada").prop("disabled",true);



    $(document).ready(function(){
     $.ajaxSetup({ cache: false });
     $('#search').keyup(function(event){




      if($(this).val().length <= 2) {
        $('#result').html('');
        return;
      }

      $('#result').html('');
      $('#state').val('');
      var searchField = $('#search').val();
      var expression = new RegExp(searchField, "i");



      $.getJSON('{{ route("autocomplete") }}', function(data) {
       $('#result').empty();
       $.each(data, function(key, value){
        if (value.nome.search(expression) != -1 )
        {

          $('#result').append('<li class="list-group-item link-class"><img src="/imagens/produtos/'+value.imagem+'" height="25" width="25" class="img-thumbnail" />  '+value.nome+' | '+value.preco+' | '+value.id+'</li>');
        }
      });   
     });
    });

     $('#result').on('click', 'li', function() {
      var click_text = $(this).text().split('|');
      $('#search').val($.trim(click_text[0]));
      $('#idProduto').val($.trim(click_text[2]));
      $("#salvarEntrada").prop("disabled",false);
      $("#result").html('');
    });
   });



  });



  $('#formEntrada').on('submit',function(e) {
    e.preventDefault();
    e.stopImmediatePropagation();
    var table = $('#entradas').DataTable();
    var produto_id = document.getElementById("idProduto").value
    var quantidade = document.getElementById("quantidade").value
    var valor = document.getElementById("valor").value

    $.ajax({
      url: '{{ route("cadastrar.entrada") }}',
      type: 'POST',
      async: true,
      data: {
        "_token":"{{ csrf_token() }}",
        "produto_id": produto_id,
        "quantidade": quantidade,
        "valor": valor,
      },
      success: function (response) {
        $('#modal-nova-entrada').modal('hide');
        Toast.fire({
          icon: 'success',
          title: 'Notificação<br> Entrada registrada com sucesso!',
        })
        table.ajax.reload(null, false);
      },
      error: function () {
        Toast.fire({
          icon: 'error',
          title: 'Notificação<br> Erro ao cadastrar entrada!',
        })
        table.ajax.reload(null, false);
      }
    });      
  });




</script>






  <script type="text/javascript">


    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    $(document).on('click', '#excluirEntrada', function() {
      $('#excluirEntrada').off().click(function(){});
      $('#modal-excluir-entrada').modal('show');
      var table = $('#entradas').DataTable();
      var id = $(this).data("id");
      var tr = $(this).closest('tr');
      var tr2 = $(this).parents('tr');


      

      $('#salvarExclusaoEntrada').on("click", function (){
        $('#salvarExclusaoEntrada').off().click(function(){});
        $('#modal-excluir-entrada').modal('hide'); 

        $.ajax(
        {
          url: "{{ route('excluir.entrada') }}/"+id,
          type: 'GET',
          async: false,
          success: function (){
            Toast.fire({
              icon: 'success',
              title: 'Notificação<br> Entrada excluída com sucesso!',
            })
            tr.fadeOut(200, function(){
              table.ajax.reload( null, false );
              $(this).remove();
            });
          },

          error: function(data) {
            Toast.fire({
              icon: 'error',
              title: 'Notificação<br> Erro ao excluir entrada!',
            })
          }

        });
      });


    });



  </script>






<script type="text/javascript">
  $(document).ready(function(){

      // DataTable
      $('#entradas').DataTable({
        order: [[4, 'desc']],
        processing: false,
        serverSide: true,
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,

        ajax: "{{route('getEntradas')}}",
        columns: [



        { data: 'produto_nome' },
        { data: 'quantidade' },
        { data: 'valor' },
        { data: 'datahora' },
        {data: "id" , render : function ( data, type, row, meta ) {
          return type === 'display'  ?
          `
          <button class="btn btn-danger" id="excluirEntrada" data-id="`+data+`" ><i class="fas fa-trash"></i></button>


          ` :   
          data;
        }},



        ],
        'columnDefs': [




      {
        "targets": 4, // your case first column
        "className": "text-right"
      },


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

