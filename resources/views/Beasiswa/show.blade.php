@extends('template.app')

@section ('content')

<h1>{{$data->nim}}</h1>
<h1>{{$data->nama_mhs}}</h1>
<h1>{{$data->jurusan_id}}</h1>
<h1>{{$data->gaji_ortu}}</h1>
<h1>{{$data->tanggungan}}</h1>
<img src="{{ asset('upload/'.$data->slip_gaji)}}" width="200px" alt="">


@endsection