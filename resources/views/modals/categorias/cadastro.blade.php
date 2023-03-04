<div class="modal fade" id="modal-cadastro-categoria">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Cadastrar categoria</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


        <form method="post" action="" enctype="multipart/form-data" id="myform">

        <div class="row">
          <div class="col-sm-12">

            <div class="form-group">
              <label>Nome <span style="color:#ff0000">*</span></label>
              <input type="text" id="nomeCadastroCategoria" name="nomecat" class="form-control" maxlength="30" placeholder="Nome" autocomplete="off" required>
            </div>
          </div>
        </div>



        <div class="row">
          <div class="col-sm-12">

            <div class="form-group">
              <label>Imagem</label>
              <br>
              <input type="file" accept="image/*" name="imagem" id="imagem">
            </div>
          </div>
        </div>


        
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
          <button type="submit" id="salvarCriacaoCategoria" class="btn btn-success">Cadastrar</button>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>