@extends('template.app')
@section('content')

    <h3> Halaman List Pendaftar </h3>
     <br/>

  {{-- <form action="{{ route('cariprodi') }}" method="GET">
  <ul class="navbar-nav mr-sm-2">
    <li>Jurusan
      <div class="input-group">
      <select class="form-control-sm" name="cari" id="cari">
       <option disable value> Prodi </option>
      @foreach ($jurusan as $item)
      <option value="{{$item->id}}">{{$item->jurusan}}</option>
      @endforeach
      </select>
      <button type="submit" class="btn btn-primary mr-2">Cari</button>
      </div>
    </li>
  </ul>
  </form> --}}
  <br/>
  
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nim</th>
      <th scope="col">Nama</th>
      <th scope="col">Jurusan</th>
      <th scope="col"> Action </th>
      <th cscope="col" >Status</th>
      {{-- <th cscope="col" >Action</th> --}}
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
              <a href="beasiswa/{{$item->id}}/edit" class="btn btn-info btn-sm">Detail</a>
            </td>
              <td>
              <a class="btn btn-inverse-primary btn-sm" href="{{ route('ajukan.beasiswa', ['id' => $item->id] ) }}"
               > Ajukan
             </a>
            </form>
            <a class="btn btn-inverse-danger btn-sm" href="{{ route('tolak.beasiswa', ['id' => $item->id] ) }}"
             onclick="event.preventDefault();
             document.getElementById('tolak-form').submit();" >
             Tolak
          </a>
          <form id="tolak-form" action="{{ route('tolak.beasiswa', ['id' => $item->id] ) }}" method="POST" style="display: none;">
            @csrf
            </form>
              </td>
    @empty
    @endforelse
  </tbody>
</table>
<br>
<div>
  {{-- Halaman : {{ $data->currentPage() }} <br/>
	Jumlah Data : {{ $data->total() }} <br/>
	Data Per Halaman : {{ $data->perPage() }} <br/> --}}
  {{$data->links() }}
 
</div>
@endsection
 {{-- <form id='ajukan-form-{{'id'}}' action="{{ route('ajukan.beasiswa', ['id' => $item->id] ) }}" method="POST" style="display: none;">
               @csrf
               </form> --}}
               {{-- onclick="event.preventDefault();
                document.getElementById('ajukan-form-{{'id'}}').submit();" > --}}