<script type="text/javascript">

  var Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
  });

  


  function resetarSelectSubCad() {
    $('#prodSubCategorias').empty()
    $('#prodSubCategorias').attr('disabled', "disabled");
    $('#prodSubCategorias').append($('<option>').text("Selecione a categoria primeiro").attr('value', "sem_subcategoria"));

  }


  $(document).on('click', '#cadastrarProduto', function(e) { 
    e.stopImmediatePropagation();
    carregarSelect1();
    resetarSelectSubCad();

    $('#nomeProduto').val("");





    document.getElementById("imagemProduto").value = null;
    //document.getElementById("nomeProduto").value = null;
    document.getElementById("precoProduto").value = null;
    document.getElementById("codigoProduto").value = null;
    document.getElementById("produtoEstoqueMinimo").value = null;
    document.getElementById("produtoEstoqueMaximo").value = null;
    document.getElementById("produtoNCM").value = null;
    document.getElementById("produtoCEST").value = null;
    document.getElementById("produtoOrigem").value = null;
    document.getElementById("produtoCFOP").value = null;
    document.getElementById("produtoICMS").value = null;
    document.getElementById("produtoIPI").value = null;
    document.getElementById("produtoPIS").value = null;
    document.getElementById("produtoCOFINS").value = null;

    //var nome = document.getElementById("nomeCadastroCategoria").value = '';


    $('#modal-cadastro-produto').modal('show');


    $('#formproduto').on('submit',function(e) { 
      e.preventDefault();
      e.stopImmediatePropagation();
      var table = $('#produtos').DataTable();
      var nome = document.getElementById("nomeProduto").value
      var prodCategorias = document.getElementById("prodCategorias").value
      var prodSubCategorias = document.getElementById("prodSubCategorias").value
      var nomeProduto = document.getElementById("nomeProduto").value
      var codigoProduto = document.getElementById("codigoProduto").value
      var precoProduto = document.getElementById("precoProduto").value
      var unidadeProduto = document.getElementById("unidadeProduto").value
      var insumoProduto = document.getElementById("insumoProduto").value
      var perecivelProduto = document.getElementById("perecivelProduto").value
      var produtoCustoValorFixo = document.getElementById("produtoCustoValorFixo").value
      var produtoDisponivelVenda = document.getElementById("produtoDisponivelVenda").value
      var produtoControlarEstoque = document.getElementById("produtoControlarEstoque").value
      var produtoNotificacaoEstoque = document.getElementById("produtoNotificacaoEstoque").value
      var produtoEstoqueMinimo = document.getElementById("produtoEstoqueMinimo").value
      var produtoEstoqueMaximo = document.getElementById("produtoEstoqueMaximo").value
      var produtoNCM = document.getElementById("produtoNCM").value
      var produtoCEST = document.getElementById("produtoCEST").value
      var produtoOrigem = document.getElementById("produtoOrigem").value
      var produtoCFOP = document.getElementById("produtoCFOP").value
      var produtoICMS = document.getElementById("produtoICMS").value
      var produtoIPI = document.getElementById("produtoIPI").value
      var produtoPIS = document.getElementById("produtoPIS").value
      var produtoCOFINS = document.getElementById("produtoCOFINS").value



      var file_data = $('#imagemProduto').prop('files')[0];  
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
        url: '{{ route("cadastrar.produto") }}',
        type: 'POST',
        data: fd,
        contentType: false,
        processData: false,
        success: function (response) {
          console.log(response);
          $('#modal-cadastro-produto').modal('hide');
          Toast.fire({
            icon: 'success',
            title: 'Notificação<br> Produto cadastrado com sucesso!',
          })
          contagemProdutos();
          table.ajax.reload(null, false);
        },
        error: function () {
          Toast.fire({
            icon: 'error',
            title: 'Notificação<br> Erro ao cadastrar produto!',
          })
          contagemProdutos();
          table.ajax.reload(null, false);
        }
      });      
    });


});




$(document).ready(function(){
 $.ajaxSetup({ cache: false });
 $('#produtoNCM').keyup(function(event){




  if($(this).val().length <= 1) {
    $('#result').html('');
    return;
  }

  $('#result').html('');
  $('#state').val('');
  var searchField = $('#produtoNCM').val();
  var expression = new RegExp(searchField, "i");



  $.getJSON('{{ route("autocomplete2") }}', function(data) {
   $('#result').empty();
   $.each(data['Nomenclaturas'], function(key, value){
    if (value.Descricao.search(expression) != -1 )
    {

      $('#result').append('<li class="list-group-item link-class">'+value.Codigo+' | '+value.Descricao+'</li>');
    }
  });   
 });
});

 $('#result').on('click', 'li', function() {
  var click_text = $(this).text().split('|');
  $('#produtoNCM').val($.trim(click_text[0]));
  $("#result").html('');
});
});

</script>