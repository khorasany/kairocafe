<script type="text/javascript">
  $(document).on('click', '#visualizarProduto', function(e) {
    e.stopImmediatePropagation(); 
    var id = $(this).data("id");
    $.ajax({
      url: '{{ route("dados.produto") }}/'+id,
      type: "GET",
      dataType: "json",
      async: false,
      success: function (data) {


        $('#modal-visualizar-produto').modal('show');
        document.getElementById("vCategoriaProduto").value = data[0]['categoria_nome'];
        document.getElementById("vSubCategoriaProduto").value = data[0]['subcategoria_nome'];
        document.getElementById("vNomeProduto").value = data[0]['nome'];
        document.getElementById("vCodigoProduto").value = data[0]['codigo'];
        document.getElementById("vPrecoProduto").value = data[0]['preco'];
        document.getElementById("vUnidadeProduto").value = data[0]['unidade'];

        if (data[0]['tipo_insumo'] == 'nao') {
          document.getElementById("vInsumoProduto").value = "Não";
        } else if (data[0]['tipo_insumo'] == 'sim') {
          document.getElementById("vInsumoProduto").value = "Sim";
        }


        if (data[0]['perecivel'] == 'nao') {
          document.getElementById("vPerecivelProduto").value = "Não";
        } else if (data[0]['perecivel'] == 'sim') {
          document.getElementById("vPerecivelProduto").value = "Sim";
        }


        if (data[0]['custo_com_valor_fixo'] == 'nao') {
          document.getElementById("vProdutoCustoValorFixo").value = "Não";
        } else if (data[0]['custo_com_valor_fixo'] == 'sim') {
          document.getElementById("vProdutoCustoValorFixo").value = "Sim";
        }


        if (data[0]['disponivel_para_venda'] == 'nao') {
          document.getElementById("vProdutoDisponivelVenda").value = "Não";
        } else if (data[0]['disponivel_para_venda'] == 'sim') {
          document.getElementById("vProdutoDisponivelVenda").value = "Sim";
        }


        if (data[0]['controlar_estoque'] == 'nao') {
          document.getElementById("vProdutoControlarEstoque").value = "Não";
        } else if (data[0]['controlar_estoque'] == 'sim') {
          document.getElementById("vProdutoControlarEstoque").value = "Sim";
        }


        if (data[0]['notificacao_estoque'] == 'nao') {
          document.getElementById("vProdutoNotificacaoEstoque").value = "Não";
        } else if (data[0]['notificacao_estoque'] == 'sim') {
          document.getElementById("vProdutoNotificacaoEstoque").value = "Sim";
        }


        document.getElementById("vProdutoEstoqueMinimo").value = data[0]['estoque_minimo'];
        document.getElementById("vProdutoEstoqueMaximo").value = data[0]['estoque_maximo'];
        document.getElementById("vProdutoNCM").value = data[0]['ncm'];
        document.getElementById("vProdutoCEST").value = data[0]['cest'];
        document.getElementById("vProdutoOrigem").value = data[0]['origem'];
        document.getElementById("vProdutoCFOP").value = data[0]['cfop'];
        document.getElementById("vProdutoICMS").value = data[0]['icms'];
        document.getElementById("vProdutoIPI").value = data[0]['ipi'];
        document.getElementById("vProdutoPIS").value = data[0]['pis'];
        document.getElementById("vProdutoCOFINS").value = data[0]['cofins'];
        $('#vImagemProduto').attr('src','imagens/produtos/'+data[0]['imagem']+'');        


      },

      error: function(data) {
        Toast.fire({
          icon: 'error',
          title: 'Notificação<br> Erro ao consultar dados do produto!',
        })

      }
    });



  });
</script>