@extends('template.app')
@section('content')
    <h3> Halaman List Pendaftar </h3>
     <br/>
{{-- 
  <form action="{{URL('beasiswa')}}" method="GET">
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
  <br/> --}}
  
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nim</th>
      <th scope="col">Nama</th>
      <th scope="col">Jurusan</th>
      <th cscope="col" >Status</th>
      <th cscope="col" >Action</th>
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
              <a class="btn btn-inverse-primary btn-sm" href="{{ route('ajukan.beasiswa', ['id' => $item->id] ) }}"
                onclick="event.preventDefault();
                document.getElementById('ajukan-form').submit();" >
                Ajukan
             </a>
             <form id="ajukan-form" action="{{ route('ajukan.beasiswa', ['id' => $item->id] ) }}" method="POST" style="display: none;">
               @csrf
               </form>
              </td>
              <td>
                <form action="/beasiswa/{{$item->id}}" method="POST">
                    @csrf
                    @method('delete')
                    <a href="beasiswa/{{$item->id}}/edit" class="btn btn-info btn-sm">Detail & Edit</a>
                    <input type="submit" class="btn btn-warning btn-sm" value="Delete">
                </form>
            </td>
        </tr>
    @empty
    @endforelse
  </tbody>
</table>
<br>

@endsection