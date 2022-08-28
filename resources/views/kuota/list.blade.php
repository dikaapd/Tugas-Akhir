@extends('template.app')
@section('content')

    <h3> Halaman Kuota Prodi </h3>
     <br/>

  <table id="example" class="table table-bordered " style="width:100%">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Prodi</th>
      <th scope="col">Kuota</th>
      <th cscope="col" >Action</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($data as $key => $item )
        <tr>
            <td>{{$key + 1}} </td>
            <td>{{$item->jurusan}} </td>
            <td>{{$item->kuota}} </td>
            <td>
                {{-- <button href="#" class="btn btn-success mr-2" data-toggle="modal" data-target="#ModalEdit">Edit</button> --}}
        <!-- Button trigger modal -->
          <button href="/kuota/{id}/edit" type="button" class="btn btn-outline-success btn-md" data-toggle="modal" data-target="#edit{{$item->id}}">
            <i style='font-size:18px' class='far'>&#xf044;</i>
            Edit
          </button>
          <!-- Modal -->
          <div class="modal fade" id="edit{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Ubah Kuota Beasiswa Per Prodi</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="{{ route('update_kuota', $item->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                  <form>
                    <div class="form-group">
                      <label for="formGroupExampleInput">Jurusan</label>
                      <input type="text" class="form-control" name="jurusan" value="{{$item->jurusan}}"id="formGroupExampleInput" placeholder="Example input">
                    </div>
                    <div class="form-group">
                      <label for="formGroupExampleInput2">Kuota</label>
                      <input type="text" class="form-control" name="kuota" value="{{$item->kuota}}" id="formGroupExampleInput2" placeholder="Another input">
                    </div>
                    <div class="from-group">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                  </form>
                  </form>
                </div>
              </div>
            </div>
          </div>
       
        </td>
      </tr>
<!-- Modal -->
    @empty
    @endforelse
  </tbody>
</table>
<br>
@endsection