@extends('template.app')
@section('content')
<div class="container">
<h3> Pengumuman Beasiswa</h3>
        <!-- Start kode untuk form pencarian -->
        {{-- <div class="col-md-6 mb-4">
        <form class="form" method="get" action="{{ route('search') }}">
        <form class="form-inline md-form mr-auto">
        <input type="text" name="search" class="form-control  mr-sm-2" id="search" placeholder="Masukkan keyword">
        <button type="submit" class="btn btn-primary mb-1">Cari Nim</button>
         </form>
        </form>
        </div> --}}
      
     {{-- <br>
     @if ($data->count())   --}}
     <div class="card-body">
      <div class="table-responsive text-nowrap">
      <table id="example" class="table table-striped table-primary " style="width:100%">
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
                <tr>
                    <td>{{$key + 1}} </td>
                    <td>{{$item->nim}} </td>
                    <td>{{$item->nama_mhs}} </td>
                    <td>{{$item->jurusan->jurusan}} </td>
                    <td>{{$item->status}} </td>
                    <td>{{$item->tanggal_proses}} </td>
                </tr>
            @empty
            Tidak Ada Data
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