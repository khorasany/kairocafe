<div class="modal fade" id="modal-edicao-usuario">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edição de usuário</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="idUsuario" class="form-control" placeholder="E-mail" autocomplete="off">

        <form id="formEdicaoUsuario">
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label>E-mail <span style="color:#ff0000">*</span></label>
              <input type="email" id="emailUsuario" class="form-control" placeholder="E-mail" maxlength="50" autocomplete="off" required>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label>Senha <span style="color:#ff0000">*</span></label>
              <input type="text" id="senhaUsuario" class="form-control" placeholder="Senha" maxlength="30" autocomplete="off" required>
            </div>
          </div>
        </div>


        <div class="row">
          <div class="col-sm-12">

            <div class="form-group">
              <label>Nome <span style="color:#ff0000">*</span></label>
              <input type="text" id="nomeUsuario" class="form-control" placeholder="Nome" maxlength="70" autocomplete="off" required>
            </div>
          </div>
        </div>


        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label>Data de criação</label>
              <input type="text" id="criadoUsuario" class="form-control" placeholder="" autocomplete="off" disabled>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label>Última atualização de dados</label>
              <input type="text" id="atualizadoUsuario" class="form-control" placeholder="" autocomplete="off" disabled>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-6">
            <p><strong>Módulos permitidos:</strong></p>

            <div class="form-group">
              <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" id="m_administrativo">
                <label for="m_administrativo" class="custom-control-label">Administrativo</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" id="m_categorias">
                <label for="m_categorias" class="custom-control-label">Categorias</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" id="m_estoque">
                <label for="m_estoque" class="custom-control-label">Estoque</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" id="m_produtos">
                <label for="m_produtos" class="custom-control-label">Produtos</label>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
          <button type="submit" id="salvarEdicaoUsuario" class="btn btn-success">Salvar alterações</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>