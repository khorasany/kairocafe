<div class="modal fade" id="modal-visualizar-produto">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Dados do produto</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

          <div id="imgProduto" style="text-align:center;">
            <img src="" id="vImagemProduto" style="width:10em;">
          </div>


          <h4>Informações do Produto</h4><br>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label>Categoria</label>
                <input type="text" id="vCategoriaProduto" name="vCategoriaProduto" class="form-control" placeholder="Categoria" disabled>
              </div>
            </div>


            <div class="col-sm-6">
              <div class="form-group">
                <label>Sub Categoria</label>
                <input type="text" id="vSubCategoriaProduto" name="vSubCategoriaProduto" class="form-control" placeholder="Sub Categoria" disabled>
              </div>
            </div>

          </div>


          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <label>Nome <span style="color:#ff0000;">*</span></label>
                <input type="text" id="vNomeProduto" name="vNomeProduto" class="form-control" placeholder="Nome" disabled>
              </div>
            </div>

            <div class="col-sm-2">
              <div class="form-group">
                <label>Código <span style="color:#ff0000;">*</span></label>
                <input type="text" id="vCodigoProduto" name="vCodigoProduto" class="form-control" placeholder="Código" disabled>
              </div>
            </div>



            <div class="col-sm-2">
              <div class="form-group">
                <label>Preço <span style="color:#ff0000;">*</span></label>
                <br>
                <input type="text" id="vPrecoProduto" name="vPrecoProduto" class="form-control" placeholder="Preço" disabled>
              </div>
            </div>

          </div>

          <br><h4>Informações adicionais</h4><br>


          <div class="row">

            <div class="col-sm-2">
              <div class="form-group">
                <label>Unidade de medida <span style="color:#ff0000;">*</span></label>
                <input class="form-control" name="vUnidadeProduto" id="vUnidadeProduto" disabled>      
              </div>
            </div>

            <div class="col-sm-2">
              <div class="form-group">
                <label>Tipo Insumo <span style="color:#ff0000;">*</span></label>
                <input class="form-control" name="vInsumoProduto" id="vInsumoProduto" disabled>
              </div>
            </div>


            <div class="col-sm-2">
              <div class="form-group">
                <label>Perecível <span style="color:#ff0000;">*</span></label>
                <input class="form-control" name="vPerecivelProduto" id="vPerecivelProduto" disabled>
              </div>
            </div>

            <div class="col-sm-2">
              <div class="form-group">
                <label>Custo com Valor Fixo <span style="color:#ff0000;">*</span></label>
                <input class="form-control" name="vProdutoCustoValorFixo" id="vProdutoCustoValorFixo" disabled>
              </div>
            </div>

            <div class="col-sm-4">
              <div class="form-group">
                <label>Disponível para venda <span style="color:#ff0000;">*</span></label>
                <input class="form-control" name="vProdutoDisponivelVenda" id="vProdutoDisponivelVenda" disabled>
              </div>
            </div>

          </div>


          <br><h4>Informações de Estoque</h4><br>
          <div class="row">

            <div class="col-sm-2">
              <div class="form-group">
                <label>Controlar Estoque <span style="color:#ff0000;">*</span></label>
                <input class="form-control" name="vProdutoControlarEstoque" id="vProdutoControlarEstoque" disabled>
              </div>
            </div>

            <div class="col-sm-2">
              <div class="form-group">
                <label>Notificação de Estoque <span style="color:#ff0000;">*</span></label>
                <input class="form-control" name="vProdutoNotificacaoEstoque" id="vProdutoNotificacaoEstoque" disabled>
              </div>
            </div>

            <div class="col-sm-4">
              <div class="form-group">
                <label>Estoque mínimo <span style="color:#ff0000;">*</span></label>
                <input type="text" id="vProdutoEstoqueMinimo" name="vProdutoEstoqueMinimo" class="form-control" placeholder="Estoque mínimo" disabled>
              </div>
            </div>

            <div class="col-sm-4">
              <div class="form-group">
                <label>Estoque máximo <span style="color:#ff0000;">*</span></label>
                <input type="text" id="vProdutoEstoqueMaximo" name="vProdutoEstoqueMaximo" class="form-control" placeholder="Estoque máximo" disabled>
              </div>
            </div>

          </div>


          <br><h4>Informações da nota fiscal</h4><br>
          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <label>NCM <span style="color:#ff0000;">*</span></label>
                <input type="text" id="vProdutoNCM" name="vProdutoNCM" class="form-control" placeholder="NCM" disabled>
              </div>
            </div>

            <div class="col-sm-4">
              <div class="form-group">
                <label>CEST <span style="color:#ff0000;">*</span></label>
                <input type="text" id="vProdutoCEST" name="vProdutoCEST" class="form-control" placeholder="CEST" disabled>
              </div>
            </div>

            <div class="col-sm-4">
              <div class="form-group">
                <label>Origem <span style="color:#ff0000;">*</span></label>
                <input type="text" id="vProdutoOrigem" name="vProdutoOrigem" class="form-control" placeholder="Origem" disabled>
              </div>
            </div>
          </div>



          <div class="row">
            <div class="col-sm-2">
              <div class="form-group">
                <label>CFOP</label>
                <input type="text" id="vProdutoCFOP" name="vProdutoCFOP" class="form-control" placeholder="CFOP" disabled>
              </div>
            </div>

            <div class="col-sm-2">
              <div class="form-group">
                <label>ICMS</label>
                <input type="text" id="vProdutoICMS" name="vProdutoICMS" class="form-control" placeholder="ICMS" disabled>
              </div>
            </div>

            <div class="col-sm-2">
              <div class="form-group">
                <label>IPI</label>
                <input type="text" id="vProdutoIPI" name="vProdutoIPI" class="form-control" placeholder="IPI" disabled>
              </div>
            </div>

            <div class="col-sm-2">
              <div class="form-group">
                <label>PIS</label>
                <input type="text" id="vProdutoPIS" name="vProdutoPIS" class="form-control" placeholder="PIS" disabled>
              </div>
            </div>

            <div class="col-sm-2">
              <div class="form-group">
                <label>COFINS</label>
                <input type="text" id="vProdutoCOFINS" name="vProdutoCOFINS" class="form-control" placeholder="COFINS" disabled>
              </div>
            </div>

          </div>



          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
          </div>
      </div>
    </div>
  </div>
</div>