<div class="modal fade" id="modal-cadastro-produto">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Cadastrar Produto</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


        <form method="post" action="" enctype="multipart/form-data" id="formproduto">


          <h4>Informações do Produto</h4><br>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label>Categoria</label>
                <select class="custom-select" id="prodCategorias">
                  <option value="">Selecione a categoria</option>
                </select>
              </div>
            </div>


            <div class="col-sm-6">
              <div class="form-group">
                <label>Sub Categoria</label>
                <select class="custom-select" id="prodSubCategorias" disabled>
                  <option value="sem_subcategoria">Selecione a categoria primeiro</option>
                </select>
              </div>
            </div>

          </div>


          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <label>Nome <span style="color:#ff0000;">*</span></label>
                <input type="text" name="nomeProduto" id="nomeProduto" placeholder="Buscar produto" class="form-control" autocomplete="off" />

                
              </div>
            </div>

            <div class="col-sm-2">
              <div class="form-group">
                <label>Código <span style="color:#ff0000;">*</span></label>
                <input type="text" id="codigoProduto" name="codigoProduto" class="form-control" placeholder="Código" autocomplete="off" required>
              </div>
            </div>



            <div class="col-sm-2">
              <div class="form-group">
                <label>Preço <span style="color:#ff0000;">*</span></label>
                <br>
                <input type="text" id="precoProduto" name="precoProduto" onkeyup="k(this);" class="form-control" placeholder="Preço" autocomplete="off" required>
              </div>
            </div>


            <div class="col-sm-2">
              <div class="form-group">
                <label>Imagem</label>
                <br>
                <input type="file" accept="image/*" name="imagemProduto" id="imagemProduto">
              </div>
            </div>

          </div>

          <br><h4>Informações adicionais</h4><br>


          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                  <input type="checkbox" class="custom-control-input" id="pontos_impressao">
                  <label class="custom-control-label" for="pontos_impressao">Pontos de impressão</label>
                </div>
              </div>
            </div>
          </div>
          <br>

          <div class="row">

            <div class="col-sm-2">
              <div class="form-group">
                <label>Unidade de medida <span style="color:#ff0000;">*</span></label>
                <select class="custom-select" name="unidadeProduto" id="unidadeProduto" required>
                  <option value="un">UN</option>
                  <option value="kg">KG</option>
                </select>
              </div>
            </div>

            <div class="col-sm-2">
              <div class="form-group">
                <label>Tipo Insumo <span style="color:#ff0000;">*</span></label>
                <select class="custom-select" name="insumoProduto" id="insumoProduto" required>
                  <option value="nao">Não</option>
                  <option value="sim">Sim</option>
                </select>
              </div>
            </div>


            <div class="col-sm-2">
              <div class="form-group">
                <label>Perecível <span style="color:#ff0000;">*</span></label>
                <select class="custom-select" name="perecivelProduto" id="perecivelProduto" required>
                  <option value="nao">Não</option>
                  <option value="sim">Sim</option>
                </select>
              </div>
            </div>

            <div class="col-sm-2">
              <div class="form-group">
                <label>Custo com Valor Fixo <span style="color:#ff0000;">*</span></label>
                <select class="custom-select" name="produtoCustoValorFixo" id="produtoCustoValorFixo" required>
                  <option value="nao">Não</option>
                  <option value="sim">Sim</option>
                </select>
              </div>
            </div>

            <div class="col-sm-4">
              <div class="form-group">
                <label>Disponível para venda <span style="color:#ff0000;">*</span></label>
                <select class="custom-select" name="produtoDisponivelVenda" id="produtoDisponivelVenda" required>
                  <option value="sim">Sim</option>
                  <option value="nao">Não</option>
                </select>
              </div>
            </div>

          </div>


          <br><h4>Informações de Estoque</h4><br>
          <div class="row">

            <div class="col-sm-2">
              <div class="form-group">
                <label>Controlar Estoque <span style="color:#ff0000;">*</span></label>
                <select class="custom-select" name="produtoControlarEstoque" id="produtoControlarEstoque" required>
                  <option value="sim">Sim</option>
                  <option value="nao">Não</option>
                </select>
              </div>
            </div>

            <div class="col-sm-2">
              <div class="form-group">
                <label>Notificação de Estoque <span style="color:#ff0000;">*</span></label>
                <select class="custom-select" name="produtoNotificacaoEstoque" id="produtoNotificacaoEstoque" required>
                  <option value="nao">Não</option>
                  <option value="sim">Sim</option>
                </select>
              </div>
            </div>

            <div class="col-sm-4">
              <div class="form-group">
                <label>Estoque mínimo <span style="color:#ff0000;">*</span></label>
                <input type="text" id="produtoEstoqueMinimo" name="produtoEstoqueMinimo" class="form-control" placeholder="Estoque mínimo" autocomplete="off" required>
              </div>
            </div>

            <div class="col-sm-4">
              <div class="form-group">
                <label>Estoque máximo <span style="color:#ff0000;">*</span></label>
                <input type="text" id="produtoEstoqueMaximo" name="produtoEstoqueMaximo" class="form-control" placeholder="Estoque máximo" autocomplete="off" required>
              </div>
            </div>

          </div>


          <br><h4>Informações da nota fiscal</h4><br>
          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <label>NCM <span style="color:#ff0000;">*</span></label>
                <input type="text" id="produtoNCM" name="produtoNCM" class="form-control" placeholder="NCM" autocomplete="off" required>
              
                <ul class="list-group" id="result"></ul>
              </div>
            </div>

            <div class="col-sm-4">
              <div class="form-group">
                <label>CEST <span style="color:#ff0000;">*</span></label>
                <input type="text" id="produtoCEST" name="produtoCEST" class="form-control" placeholder="CEST" autocomplete="off" required>
              </div>
            </div>

            <div class="col-sm-4">
              <div class="form-group">
                <label>Origem <span style="color:#ff0000;">*</span></label>
                <select class="custom-select" id="produtoOrigem" name="produtoOrigem">
                  <option value="0">0 - Nacional, exceto as indicadas nos códigos 3, 4, 5 e 8</option>
                  <option value="1">1 - Estrangeira - Importação direta, exceto a indicada no código 6</option>
                  <option value="2">2 - Estrangeira - Adquirida no mercado interno, exceto a indicada no código 7</option>
                  <option value="3">3 - Nacional, mercadoria ou bem com Conteúdo de Importação superior a 40% e inferior ou igual a 70%</option>
                  <option value="4">4 - Nacional, cuja produção tenha sido feita em conformidade com os processos produtivos básicos de que tratam as legislações citadas nos Ajustes</option>
                  <option value="5">5 - Nacional, mercadoria ou bem com Conteúdo de Importação inferior ou igual a 40%</option>
                  <option value="6">6 - Estrangeira - Importação direta, sem similar nacional, constante em lista da CAMEX e gás natural</option>
                  <option value="7">7 - Estrangeira - Adquirida no mercado interno, sem similar nacional, constante lista CAMEX e gás natural</option>
                  <option value="8">8 - Nacional, mercadoria ou bem com Conteúdo de Importação superior a 70%</option>
                </select>
              </div>
            </div>
          </div>



          <div class="row">
            <div class="col-sm-2">
              <div class="form-group">
                <label>CFOP</label>
                <select class="custom-select" id="produtoCFOP" name="produtoCFOP">
                  <option value="5101">5.101 - Venda de produção do estabelecimento</option>
                  <option value="5102">5.102 - Venda de mercadoria adquirida ou recebida de terceiros</option>
                  <option value="5103">5.103 - Venda de produção do estabelecimento, efetuada fora do estabelecimento</option>
                  <option value="5104">5.104 - Venda de mercadoria adquirida ou recebida de terceiros, efetuada fora do estabelecimento</option>
                  <option value="5106">5106 - Venda de mercadoria adquirida ou recebida de terceiros, que não deva por ele transitar</option>
                  <option value="5403">5403 - Venda de mercadoria adquirida ou recebida de terceiros em operação com mercadoria sujeita ao regime de substituição tributária, na condição de contribuinte substituto</option>
                  <option value="5405">5405 - Venda de mercadoria adquirida ou recebida de terceiros em operação com mercadoria sujeita ao regime de substituição tributária, na condição de contribuinte substituído</option>
                  <option value="5415">5415 - Remessa de mercadoria adquirida ou recebida de terceiros para venda fora do estabelecimento, em operação com mercadoria sujeita ao regime de substituição tributária</option>
                  <option value="5603">5603 - Ressarcimento de ICMS retido por substituição tributária</option>
                  <option value="5908">5908 - Remessa de bem por conta de contrato de comodato</option>
                  <option value="5913">5913 - Retorno de mercadoria ou bem recebido para demonstração</option>
                  <option value="5933">5.933 - Prestação de serviço tributado pelo ISSQN.</option>
                  <option value="5949">5.949 - Outra saída de mercadoria ou prestação de serviço não especificado</option>
                </select>
              </div>
            </div>

            <div class="col-sm-2">
              <div class="form-group">
                <label>ICMS</label>
                <input type="text" id="produtoICMS" name="produtoICMS" class="form-control" placeholder="ICMS" autocomplete="off">
              </div>
            </div>

            <div class="col-sm-2">
              <div class="form-group">
                <label>IPI</label>
                <input type="text" id="produtoIPI" name="produtoIPI" class="form-control" placeholder="IPI" autocomplete="off">
              </div>
            </div>

            <div class="col-sm-2">
              <div class="form-group">
                <label>PIS</label>
                <input type="text" id="produtoPIS" name="produtoPIS" class="form-control" placeholder="PIS" autocomplete="off">
              </div>
            </div>

            <div class="col-sm-2">
              <div class="form-group">
                <label>COFINS</label>
                <input type="text" id="produtoCOFINS" name="produtoCOFINS" class="form-control" placeholder="COFINS" autocomplete="off">
              </div>
            </div>

          </div>



          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            <button type="submit" id="salvarCadastroProduto" class="btn btn-success">Cadastrar</button>
          </div>
        </form>
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

