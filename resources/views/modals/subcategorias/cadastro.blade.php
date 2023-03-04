<div class="modal fade" id="modal-cadastro-subcategoria">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Criar Sub Categoria</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


        <form method="post" action="" enctype="multipart/form-data" id="formsub">


        <div class="row">
          <div class="col-sm-12">

            <div class="form-group">
              <label>Categoria Base <span style="color:#ff0000;">*</span></label>
              <select class="custom-select" id="categoriasListaSub">
                <option>Selecione a categoria</option>
              </select>
            </div>
          </div>
        </div>


        <div class="row">
          <div class="col-sm-12">

            <div class="form-group">
              <label>Nome <span style="color:#ff0000;">*</span></label>
              <input type="text" id="nomeCadastroSubCategoria" name="nomecat" class="form-control" placeholder="Nome" maxlength="30" autocomplete="off" required>
            </div>
          </div>
        </div>



        <div class="row">
          <div class="col-sm-12">

            <div class="form-group">
              <label>Imagem</label>
              <br>
              <input type="file" accept="image/*" name="imagemSub" id="imagemSub">
            </div>
          </div>
        </div>


        
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
          <button type="submit" id="salvarCriacaoSubCategoria" class="btn btn-success">Criar</button>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>