<div class="modal fade" id="modal-cadastro-usuario">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Cadastrar usuário</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form id="formCriacaoUsuario">

        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label>E-mail <span style="color:#ff0000">*</span></label>
              <input type="email" id="emailCadastroUsuario" class="form-control" maxlength="50" placeholder="E-mail" autocomplete="off" required="">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label>Senha <span style="color:#ff0000">*</span></label>
              <input type="text" id="senhaCadastroUsuario" class="form-control" maxlength="30" placeholder="Senha" autocomplete="off" required>
            </div>
          </div>
        </div>


        <div class="row">
          <div class="col-sm-12">

            <div class="form-group">
              <label>Nome <span style="color:#ff0000">*</span></label>
              <input type="text" id="nomeCadastroUsuario" class="form-control" maxlength="70" placeholder="Nome" autocomplete="off" required>
            </div>
          </div>
        </div>

        <form>
        <div class="row">
          <div class="col-sm-6">
            <p><strong>Módulos permitidos:</strong></p>

            <div class="form-group">
              <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" id="cadastro_m_administrativo">
                <label for="cadastro_m_administrativo" class="custom-control-label">Administrativo</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" id="cadastro_m_categorias">
                <label for="cadastro_m_categorias" class="custom-control-label">Categorias</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" id="cadastro_m_estoque">
                <label for="cadastro_m_estoque" class="custom-control-label">Estoque</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" id="cadastro_m_produtos">
                <label for="cadastro_m_produtos" class="custom-control-label">Produtos</label>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
          <button type="submit" id="salvarCriacaoUsuario" class="btn btn-success">Cadastrar</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>