@extends('template.app')

@section ('content')

<h1>{{$data->ormawa_id}}</h1>
<h1>{{$data->nama_kegiatan}}</h1>
<h1>{{$data->jenis_kegiatan}}</h1>
<h1>{{$data->tema_kegiatan}}</h1>
<h1>{{$data->tanggal_kegiatan}}</h1>
<h1>{{$data->total_dana}}</h1>
<h1>{{$data->lampiran}}</h1>


@endsection