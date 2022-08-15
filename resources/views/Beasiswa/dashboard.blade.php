@extends('template.app')
@section('content')

    <h3> Halaman List Pendaftar </h3>
     <br/>

 
  <br/>
  
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
              {{-- <a class="btn btn-inverse-primary btn-sm" href="{{ route('ajukan.beasiswa', ['id' => $item->id] ) }}"
               > Ajukan
             </a> --}}
             {{$item->status}}
              </td>
              @if(auth()->user()->nim == $item->nim)
              <td>
                <form action="/beasiswa/{{$item->id}}" method="POST">
                    @csrf
                    @method('delete')
                    <a href="beasiswa/{{$item->id}}/edit" class="btn btn-info btn-sm">Detail & Edit</a>
                    <input type="submit" class="btn btn-warning btn-sm" value="Delete">
                </form>
                </td>
                @else
                <td></td>
                @endif
            
        </tr>
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