<div class="modal fade" id="modal-edicao-categoria">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edição de categoria</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="" enctype="multipart/form-data" id="attCategoria">
        <input type="hidden" id="idCategoria" class="form-control" placeholder="E-mail">

        <div style="margin:auto;text-align:center;">
        <img id="imagemCategoria" style="width:5em;height:5em;">
        </div>

        <div class="row">
          <div class="col-sm-12">

            <div class="form-group">
              <label>Nome <span style="color:#ff0000">*</span></label>
              <input type="text" id="nomeCategoria2" class="form-control" placeholder="Nome" maxlength="30" autocomplete="off" required>
            </div>
          </div>
        </div>


        <div class="row">
          <div class="col-sm-12">

            <div class="form-group">
              <label>Imagem</label>
              <input type="text" id="endImagem" class="form-control" placeholder="Nome" disabled><br>
              <label>Selecionar somente se for alterar imagem</label>
              <input type="file" accept="image/*" name="imagem2" id="imagem2">
            </div>
          </div>
        </div>


    
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
          <button type="submit" id="salvarEdicaoCategoria" class="btn btn-success">Salvar alterações</button>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>