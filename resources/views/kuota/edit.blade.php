<form action="{{ route('update_kuota', $data->id) }}" method="post" enctype="multipart/form-data">
    {{ method_field('patch') }}
    {{ csrf_field() }}
    <div class="modal fade text-left" id="ModalEdit{{$user->id}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('Edit User') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <div class="forms-sample">
                            <label for="exampleInputName1">Jurusan</label>
                            <input type="text" class="form-control" name="jurusan" value="{{$data->jurusan}}" id="jurusan" placeholder="Prodi">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName3">Kuota</label>
                            <input type="text" class="form-control" name="kuota" value="{{$data->kuota}}" id="kuota" placeholder="Kuota">
                        </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <button type="submit" class="btn btn-warning">{{ __('Edit') }}</button>
                </div>
            </div>
        </div>
    </form>