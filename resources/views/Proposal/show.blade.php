@extends('template.app')

@section ('content')

<h1>{{$data->id_kegiatan}}</h1>
<h1>{{$data->nama_kegiatan}}</h1>
<h1>{{$data->jenis_kegiatan}}</h1>
<h1>{{$data->tema_kegiatan}}</h1>
<h1>{{$data->tgl_kegiatan}}</h1>
<h1>{{$data->total_dana}}</h1>
<h1>{{$data->file}}</h1>


@endsection