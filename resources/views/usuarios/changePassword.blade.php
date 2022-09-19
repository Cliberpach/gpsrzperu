<div class="modal fade" id="changePassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-uppercase" id="exampleModalLabel">Cambiar contraseña</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form>
                @csrf
                <input type="hidden" class="form-control" name="idusuario" id="idusuario">
                <div class="row form-group">
                    <div class="col-md-12">
                        <label for="">Usuario</label>
                        <input type="text" class="form-control" readonly name="usuario" id="usuario">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-12">
                        <label for="">Email</label>
                        <input type="text" class="form-control" readonly name="email" id="email">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-12">
                        <label for="">Nueva contraseña</label>
                        <input type="text" class="form-control" name="newPassword" id="newPassword">
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary " id="btn-actualizar-password">Actualizar</button>
        </div>
      </div>
    </div>
  </div>