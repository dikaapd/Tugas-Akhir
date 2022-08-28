@extends('template.app')
@section('content')
     <h3>Halaman List Diajukan Prodi</h3>
     <br>
     <div class="card-body">
      <div class="table-responsive text-nowrap">
      <table id="example" class="table table-bordered " style="width:100%">
  <thead>
    <tr>
      <th>No</th>
      <th>Nim</th>
      <th>Nama</th>
      <th>Jurusan</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($data as $key => $item )
        <tr>
            <td>{{$key + 1}} </td>
            <td>{{$item->nim}} </td>
            <td>{{$item->nama_mhs}} </td>
            <td>{{$item->jurusan->jurusan}} </td>
            <td>
              @if(auth()->user()->level == 'admin')
                <a class="btn btn btn-info btn-sm" href="{{ route('terima.beasiswa', ['id' => $item->id] ) }}"
                    onclick="event.preventDefault();
                    document.getElementById('terima-form').submit();" >
                    Terima
                 </a>
                 <form id="terima-form" action="{{ route('terima.beasiswa', ['id' => $item->id] ) }}" method="POST" style="display: none;">
                   @csrf
                   </form> 
                </form>
                @else
                <a class="btn btn btn-info btn-sm" href="{{ route('daftar.beasiswa', ['id' => $item->id] ) }}">
                  Revisi
               </a>
               
              </form>
                @endif
            </td>
        </tr>
    @empty
    @endforelse
  </tbody>
</table>
      </div>
     </div>
<br>

@endsection