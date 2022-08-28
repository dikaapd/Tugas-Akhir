@extends('template.app')
@section('content')

<h3> Pengumuman Beasiswa</h3>
<br>

<form action="{{route('export')}}">
  <button type="submit" class="btn btn-info ">
    <i class='fas fa-file-download'></i>
    EXPORT</button>
  </form>
  <br>
      <table id="example" class="table table-bordered " style="width:100%">
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
            @endforelse
  </tbody>
</table>
@endsection