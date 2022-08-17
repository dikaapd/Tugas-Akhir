@extends('template.app')
@section('content')
     <h3>Halaman List Diajukan Prodi</h3>
     <br>
     <div class="card-body">
      <div class="table-responsive text-nowrap">
      <table id="example" class="table table-striped table-secondary " style="width:100%">
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
                <a class="btn btn-inverse-success btn-sm" href="{{ route('terima.beasiswa', ['id' => $item->id] ) }}"
                    onclick="event.preventDefault();
                    document.getElementById('terima-form').submit();" >
                    Terima
                 </a>
                 <form id="terima-form" action="{{ route('terima.beasiswa', ['id' => $item->id] ) }}" method="POST" style="display: none;">
                   @csrf
                   </form>
                   <a class="btn btn-inverse-danger btn-sm" href="{{ route('tolak.beasiswa', ['id' => $item->id] ) }}"
                    onclick="event.preventDefault();
                    document.getElementById('tolak-form').submit();" >
                    Tolak
                 </a>
                 <form id="tolak-form" action="{{ route('tolak.beasiswa', ['id' => $item->id] ) }}" method="POST" style="display: none;">
                   @csrf
                   </form>
                    
                    
                </form>
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