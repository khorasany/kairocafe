<script type="text/javascript">



  function carregarSelectCat() {
    $('#eprodCategorias').append($('<option>').text("Carregando...").attr('value', "0"));
    $('#eprodCategorias').removeAttr('disabled');

    $.ajax({
      url: '{{ route("getCategorias") }}',
      type: 'GET',
      dataType: 'json',
      success: function( data ) {
        $('#eprodCategorias').empty()
        $('#eprodCategorias').append($('<option>').text("Selecione a categoria").attr('value', "sem_categoria"));
        $.each(data['aaData'], function(index, value) {
         $('#eprodCategorias').append($('<option>').text(value.nome).attr('value', value.id));
       });
      }
    });
  }


  function resetarSelectSub() {
    $('#eprodSubCategorias').empty()
    $('#eprodSubCategorias').attr('disabled', "disabled");
    $('#eprodSubCategorias').append($('<option>').text("Selecione a categoria primeiro").attr('value', "sem_subcategoria"));

  }


  

  $(document).on('click', '#editarProduto', function(e) {
    carregarSelectCat();
    resetarSelectSub();
    e.stopImmediatePropagation(); 
    var id = $(this).data("id");
    $.ajax({
      url: '{{ route("dados.produto") }}/'+id,
      type: "GET",
      dataType: "json",
      async: false,
      success: function (data) {


        $('#modal-edicao-produto').modal('show');
        //document.getElementById("idSubCategoria").value = data[0]['id'];
        //document.getElementById("nomeSubCategoria").value = data[0]['nome'];
        //document.getElementById("endImagemSub").value = 'imagens/categorias/'+data[0]['endereco_imagem'];
        //$('#imagemSubCategoria').attr('src','imagens/categorias/'+data[0]['endereco_imagem']+'');

        $('#eCategoria').text(data[0]['categoria_nome']);
        $('#eSubCategoria').text(data[0]['subcategoria_nome']);

        setTimeout(function(){
          document.getElementById("eprodCategorias").value = data[0]['categoria'];


          $.ajax({
            url: '{{ route("getSubCategorias") }}/'+data[0]['categoria'],
            type: 'GET',
            dataType: 'json',
            success: function( data ) {
              if (data['resultados'] >= 1) {
                $('#eprodSubCategorias').removeAttr('disabled');
                $('#eprodSubCategorias').empty()
                $('#eprodSubCategorias').append($('<option>').text("Selecione a sub categoria").attr('value', "sem_subcategoria"));
                $.each(data['aaData'], function(index, value) {
                 $('#eprodSubCategorias').append($('<option>').text(value.nome).attr('value', value.id));
               });
              } else {
                $('#eprodSubCategorias').empty()
                $('#eprodSubCategorias').attr('disabled', 'disabled');
                $('#eprodSubCategorias').append($('<option>').text("Não existem sub categorias").attr('value', "sem_subcategoria"));
              }
            }
          });


          


        }, 100);


        setTimeout(function(){
          document.getElementById("eprodSubCategorias").value = data[0]['subcategoria'];
          }, 200);

        document.getElementById("eimagemProduto").value = null;
        document.getElementById("idProduto").value = data[0]['id'];
        document.getElementById("enomeProduto").value = data[0]['nome'];
        document.getElementById("ecodigoProduto").value = data[0]['codigo'];
        document.getElementById("eprecoProduto").value = data[0]['preco'];
        document.getElementById("eunidadeProduto").value = data[0]['unidade'];
        document.getElementById("einsumoProduto").value = data[0]['tipo_insumo'];
        document.getElementById("eperecivelProduto").value = data[0]['perecivel'];
        document.getElementById("eprodutoCustoValorFixo").value = data[0]['custo_com_valor_fixo'];
        document.getElementById("eprodutoDisponivelVenda").value = data[0]['disponivel_para_venda'];
        document.getElementById("eprodutoControlarEstoque").value = data[0]['controlar_estoque'];
        document.getElementById("eprodutoNotificacaoEstoque").value = data[0]['notificacao_estoque'];
        document.getElementById("eprodutoEstoqueMinimo").value = data[0]['estoque_minimo'];
        document.getElementById("eprodutoEstoqueMaximo").value = data[0]['estoque_maximo'];
        document.getElementById("eprodutoNCM").value = data[0]['ncm'];
        document.getElementById("eprodutoCEST").value = data[0]['cest'];
        document.getElementById("eprodutoOrigem").value = data[0]['origem'];
        document.getElementById("eprodutoCFOP").value = data[0]['cfop'];
        document.getElementById("eprodutoICMS").value = data[0]['icms'];
        document.getElementById("eprodutoIPI").value = data[0]['ipi'];
        document.getElementById("eprodutoPIS").value = data[0]['pis'];
        document.getElementById("eprodutoCOFINS").value = data[0]['cofins'];


      },

      error: function(data) {
        Toast.fire({
          icon: 'error',
          title: 'Notificação<br> Erro ao consultar dados do produto!',
        })

      }
    });







    $('#formprodutoedit').on('submit',function(e) { 

      e.preventDefault();
      e.stopImmediatePropagation();
      var table = $('#produtos').DataTable();
      var id2 = document.getElementById("idProduto").value
      //var nome = document.getElementById("nomeSubCategoria").value
      //var end_imagem = document.getElementById("endImagemSub").value
      var prodCategorias = document.getElementById("eprodCategorias").value
      var prodSubCategorias = document.getElementById("eprodSubCategorias").value
      var nomeProduto = document.getElementById("enomeProduto").value
      var codigoProduto = document.getElementById("ecodigoProduto").value
      var precoProduto = document.getElementById("eprecoProduto").value
      var unidadeProduto = document.getElementById("eunidadeProduto").value
      var insumoProduto = document.getElementById("einsumoProduto").value
      var perecivelProduto = document.getElementById("eperecivelProduto").value
      var produtoCustoValorFixo = document.getElementById("eprodutoCustoValorFixo").value
      var produtoDisponivelVenda = document.getElementById("eprodutoDisponivelVenda").value
      var produtoControlarEstoque = document.getElementById("eprodutoControlarEstoque").value
      var produtoNotificacaoEstoque = document.getElementById("eprodutoNotificacaoEstoque").value
      var produtoEstoqueMinimo = document.getElementById("eprodutoEstoqueMinimo").value
      var produtoEstoqueMaximo = document.getElementById("eprodutoEstoqueMaximo").value
      var produtoNCM = document.getElementById("eprodutoNCM").value
      var produtoCEST = document.getElementById("eprodutoCEST").value
      var produtoOrigem = document.getElementById("eprodutoOrigem").value
      var produtoCFOP = document.getElementById("eprodutoCFOP").value
      var produtoICMS = document.getElementById("eprodutoICMS").value
      var produtoIPI = document.getElementById("eprodutoIPI").value
      var produtoPIS = document.getElementById("eprodutoPIS").value
      var produtoCOFINS = document.getElementById("eprodutoCOFINS").value

      var file_data = $('#eimagemProduto').prop('files')[0];  
      var fd = new FormData();

      if (file_data == null) {
        fd.append('imagem', 'X');
        fd.append('nova_imagem', 'nao');
      } else {
        fd.append('imagem', file_data);  
        fd.append('nova_imagem', 'sim');
      }


      fd.append('prodCategorias', prodCategorias); 
      fd.append('prodSubCategorias', prodSubCategorias); 
      fd.append('nomeProduto', nomeProduto); 
      fd.append('codigoProduto', codigoProduto); 
      fd.append('precoProduto', precoProduto); 
      fd.append('unidadeProduto', unidadeProduto); 
      fd.append('insumoProduto', insumoProduto); 
      fd.append('perecivelProduto', perecivelProduto); 
      fd.append('produtoCustoValorFixo', produtoCustoValorFixo); 
      fd.append('produtoDisponivelVenda', produtoDisponivelVenda); 
      fd.append('produtoControlarEstoque', produtoControlarEstoque); 
      fd.append('produtoNotificacaoEstoque', produtoNotificacaoEstoque); 
      fd.append('produtoEstoqueMinimo', produtoEstoqueMinimo); 
      fd.append('produtoEstoqueMaximo', produtoEstoqueMaximo); 
      fd.append('produtoNCM', produtoNCM); 
      fd.append('produtoCEST', produtoCEST); 
      fd.append('produtoOrigem', produtoOrigem); 
      fd.append('produtoCFOP', produtoCFOP); 
      fd.append('produtoICMS', produtoICMS); 
      fd.append('produtoIPI', produtoIPI); 
      fd.append('produtoPIS', produtoPIS);
      fd.append('produtoCOFINS', produtoCOFINS); 



      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });


      $.ajax({
        url: '{{ route("alterar.dados.produto") }}/'+id2,
        type: 'POST',
        data: fd,
        contentType: false,
        processData: false,
        success: function (response) {
          $('#modal-edicao-produto').modal('hide');
          Toast.fire({
            icon: 'success',
            title: 'Notificação<br> Produto alterado com sucesso!',
          })
          table.ajax.reload(null, false);
        },
        error: function () {
          Toast.fire({
            icon: 'error',
            title: 'Notificação<br> Erro ao alterar dados do produto!',
          })
          table.ajax.reload(null, false);
        }
      });      
    });








});










$(document).ready(function(){
 $.ajaxSetup({ cache: false });
 $('#eprodutoNCM').keyup(function(event){



  if($(this).val().length <= 1) {
    $('#result2').html('');
    return;
  }

  $('#result2').html('');
  $('#state').val('');
  var searchField = $('#eprodutoNCM').val();
  var expression = new RegExp(searchField, "i");



  $.getJSON('{{ route("autocomplete2") }}', function(data) {
   $('#result2').empty();
   $.each(data['Nomenclaturas'], function(key, value){
    if (value.Descricao.search(expression) != -1 )
    {

      $('#result2').append('<li class="list-group-item link-class">'+value.Codigo+' | '+value.Descricao+'</li>');
    }
  });   
 });
});

 $('#result2').on('click', 'li', function() {
  var click_text = $(this).text().split('|');
  $('#eprodutoNCM').val($.trim(click_text[0]));
  $("#result2").html('');
});
});


</script>