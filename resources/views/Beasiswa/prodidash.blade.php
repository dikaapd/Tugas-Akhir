@extends('template.app')
@section('content')

    <h3> Halaman List Pendaftar </h3>
     <br/>
  <br/>
  
  <table id="example" class="table table-striped t " style="width:100%">
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
              <a href="beasiswa/{{$item->id}}/edit" class="btn btn-outline-dark">
                <i class='fas fa-user-check'></i>
                Show</a>
            </td>
              <td>
              <a class="btn btn-primary btn-sm" href="{{ route('ajukan.beasiswa', ['id' => $item->id] ) }}"
               > 
               <i class='fas fa-user-check'></i> Ajukan
             </a>
            </form>
            <a class="btn btn-danger btn-sm" href="{{ route('tolak.beasiswa', ['id' => $item->id] ) }}"
             onclick="event.preventDefault();
             document.getElementById('tolak-form').submit();" >
            <i class='fas fa-user-times'></i>
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