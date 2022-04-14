<!-- PROCESS MODAL -->
<div class="modal" id="processModal" tabindex="-1" role="dialog"
  arial-labelledby="myModalLabel">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content" >
        <div class="modal-header" style="background-color:turquoise; color:white;">
          <h4 class="priv-modal-title">İşlem sonucu</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <!-- progress bar -->
          <div class="form-group" id="form_process" style="display:none;">
            <div class="progress">
              <div class="progress-bar progress-bar-striped active" id="form_progessbar" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="height:60px;">
              </div>
            </div>
          </div>
          <div class="table-responsive" id="request_result" style="with:100%;">

          </div>
          </div>
          <div class="modal-footer">
            <button type="button" id="kapat_process" class="btn btn-default" data-dismiss="modal">Tamam</button>
          </div>
        </div>
      </div>
    </div>
  </div>

<!-- IZIN FORMU GOSTERME MODALI -->
<div class="modal fade" id="izin_goster_modal" tabindex="-1" role="dialog" arial-labelledby="myModalLabel">
    <div class="modal-dialog modal-md">
      <!-- Modal content-->
      <div class="modal-content" style=" width:700px;">
        <div class="modal-header " style="background-color:turquoise; color:white; width:700px;">
          <h5 class="priv-modal-title">İzin Kayıt bilgileri</h4>
          <button class="close" data-dismiss="modal"><span>&times;</span>
            </button>
        </div>
        <div class="modal-body">
          <div class="form-group" id="modal_process" style="display:none;">
            <div class="progress">
              <div class="progress-bar progress-bar-striped active" id="modal_progessbar" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="">

              </div>
            </div>
          </div>
          <div class="table-responsive" id="izin_sonucu" style="with:100%;">
            Izin bilgileri
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
        </div>
      </div>

    </div>
  </div>

<!-- UYARI VE BILGILENDIRME -->
<div class="modal" id="uyari_modal">
        <div class="modal-dialog modal-md">
          <!-- Modal content-->
          <div class="modal-content" >
            <div class="modal-header w3-panel w3-yellow" style="background-color:red; color:white;">
              <h5 class="priv-modal-title">
                <i class="fa fa-exclamation-triangle" aria-hidden="true">
                </i>DİKKAT !!!</h4>
              <button class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <div class="table" id="warning_msg" style="with:100%;">

              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Tamam</button>
            </div>
          </div>

        </div>
      </div>
