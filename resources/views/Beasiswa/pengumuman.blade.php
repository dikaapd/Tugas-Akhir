@extends('template.app')
@section('content')
<div class="container">
<h3> Pengumuman Beasiswa</h3>
     <div class="card-body">
      <div class="table-responsive text-nowrap">
      <table  class="table table-hover " style="width:100%">
          <thead>
            <tr>
              <th>No</th>
              <th>Nim</th>
              <th>Nama</th>
              <th>Jurusan</th>
              <th>Status</th>
              <th>Tanggal Ditetapkan</th>
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
                    <td>{{$item->status}} </td>
                    <td>{{$item->tanggal_proses}} </td>
                </tr>
                @else
                @endif
            @empty
            @endforelse
  </tbody>
</table>
</div>
</div>
</div>
{{-- @else
<p class="text-center">data tidak ada</p>
@endif --}}
{{-- <div>
  {{ $data->links() }}
  </div> --}}
@endsection