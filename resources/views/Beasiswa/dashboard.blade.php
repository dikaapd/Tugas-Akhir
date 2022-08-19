@extends('template.app')
@section('content')

    <h3> Selamat Datang,</h3>
    <h4> {{ Auth::user()->nama }}  </h4>
     <br/>

 
  <br/>
  
<table class="table table-hover " style="width:100%">
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
    @if(auth()->user()->nim == $item->nim)
        <tr>
            <td>{{$key + 1}} </td>
            <td>{{$item->nim}} </td>
            <td>{{$item->nama_mhs}} </td>
            <td>{{$item->jurusan->jurusan}} </td>
            <td>
              {{-- <a class="btn btn-inverse-primary btn-sm" href="{{ route('ajukan.beasiswa', ['id' => $item->id] ) }}"
               > Ajukan
             </a> --}}
             {{$item->status}}
              </td>
              <td>
                {{-- <form action="/beasiswa/{{$item->id}}" method="POST">
                    @csrf
                    @method('delete') --}}
                    <a href="beasiswa/{{$item->id}}/edit" class="btn btn-info btn-md">
                      <i class='fas fa-user-cog'></i>
                      </a>
                    {{-- <input type="submit" class="btn btn-warning btn-sm" value="Delete"> --}}
                {{-- </form> --}}
                </td>
        </tr>
        @else
        
        @endif
    @empty
    @endforelse
   
  </tbody>
</table>
<br>
<div>
</div>
@endsection
