

    <div class="modal fade text-left" id="ModalCreate" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('Create New User') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>                    
                </div>
                <div class="modal-body">
                  <form action="{{route('postregistrasimodal')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <form class="pt-3">
                        <div class="form-group">
                          <input type="text" class="form-control form-control-lg" name = "nama" placeholder="Nama Prodi">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-lg" name = "level" placeholder="Level">
                          </div>
                        <div class="form-group">
                          <input type="username" class="form-control form-control-lg" name="username"  placeholder="Username">
                        </div>
                        <div class="form-group">
                          <input type="password" class="form-control form-control-lg" name="password" placeholder="Password">
                        </div>
                        <div class="mt-3">
                          <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Daftar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</form>