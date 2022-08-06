@extends('template.app')
@section('content')
     Halaman Dashboard
     
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nim</th>
      <th scope="col">Nama</th>
      <th scope="col">Jurusan</th>
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
                <a class="btn btn-warning btn-sm" href="{{ route('terima.beasiswa', ['id' => $item->id] ) }}"
                    onclick="event.preventDefault();
                    document.getElementById('terima-form').submit();" >
                    Terima
                 </a>
                 <form id="terima-form" action="{{ route('terima.beasiswa', ['id' => $item->id] ) }}" method="POST" style="display: none;">
                   @csrf
                   </form>
                   <a class="btn btn-warning btn-sm" href="{{ route('tolak.beasiswa', ['id' => $item->id] ) }}"
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
<br>

@endsection