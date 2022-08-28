@extends('template.app')
@section('content')

    <h3> Halaman List Pendaftar </h3>
     <br/>
  <br/>
  
  <table id="example" class="table table-striped table-bordered " style="width:100%">
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
              {{-- <a href="beasiswa/{{$item->id}}/edit" class="btn btn-outline-dark">
                <i class='fas fa-user-check'></i>
                Show</a> --}}
                <button  type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$item->id}}">
                  <i class='fas fa-user'></i>
                  Show
                </button>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detail Mahasiswa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="row">
                          <div class="col-md-6">
                            {{-- <small class="text-muted text-uppercase">Detail Mahasiswa</small> --}}
                      
                          <li class="d-flex align-items-center mb-3"><i class="bx bx-user"></i><span class="fw-semibold mx-2"><h6>NIM :</h6></span> <br> <span>{{{$item->nim}}}</span></li>
                          <li class="d-flex align-items-center mb-3"><i class="bx bx-user"></i><span class="fw-semibold mx-2"><h6>Nama :</h6></span> <span>{{{$item->nama_mhs}}}</span></li>
                          <li class="d-flex align-items-center mb-3"><i class="bx bx-user"></i><span class="fw-semibold mx-2"><h6>Jurusan :</h6></span> <span>{{{$item->jurusan->jurusan}}}</span></li>
                          <li class="d-flex align-items-center mb-3"><i class="bx bx-user"></i><span class="fw-semibold mx-2"><h6>Jenis Kelamim :</h6></span> <span>{{{$item->jenkel}}}</span></li>
                          <li class="d-flex align-items-center mb-3"><i class="bx bx-user"></i><span class="fw-semibold mx-2"><h6>Tempat Tanggal Lahir :</h6></span> <span>{{{$item->ttl}}}</span></li>
                          <li class="d-flex align-items-center mb-3"><i class="bx bx-user"></i><span class="fw-semibold mx-2"><h6>Alamat :</h6></span> <span>{{{$item->alamat}}}</span></li>
                          <li class="d-flex align-items-center mb-3"><i class="bx bx-user"></i><span class="fw-semibold mx-2"><h6>No Hp :</h6></span> <span>{{{$item->nohp}}}</span></li>
                          
                          <li class="d-flex align-items-center mb-3"><i class="bx bx-user"></i><span class="fw-semibold mx-2"><h6>IPK :</h6></span> <span>{{{$item->ipk}}}</span></li>
                          <li class="d-flex align-items-center mb-3"><i class="bx bx-user"></i><span class="fw-semibold mx-2"><h6>Tahun Ajaran :</h6></span> <span>{{{$item->thn_ajaran}}}</span></li>
                          <li class="d-flex align-items-center mb-3"><i class="bx bx-user"></i><span class="fw-semibold mx-2"><h6>Nama Orang Tua :</h6></span> <span>{{{$item->nama_ortu}}}</span></li>
                          <li class="d-flex align-items-center mb-3"><i class="bx bx-user"></i><span class="fw-semibold mx-2"><h6>NIK :</h6></span> <span>{{{$item->nik}}}</span></li>
                          <li class="d-flex align-items-center mb-3"><i class="bx bx-user"></i><span class="fw-semibold mx-2"><h6>Gaji Orang Tua :</h6></span> <span>{{{$item->gaji_ortu}}}</span></li>
                          <li class="d-flex align-items-center mb-3"><i class="bx bx-user"></i><span class="fw-semibold mx-2"><h6>Tanggungan :</h6></span> <span>{{{$item->tanggungan}}}</span></li>
                          <li class="d-flex align-items-center mb-3"><i class="bx bx-user"></i><span class="fw-semibold mx-2"><h6>Struk Gaji :</h6></span></li>
                       
                         <img src="{{ asset('data-slip-gaji/'.$item->slip_gaji)}}"  style="width: 300px;height: 300px">
                      </div>
                     
                     
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
            </td>
              <td>
              <a class="btn btn-primary btn-md" href="{{ route('ajukan.beasiswa', ['id' => $item->id] ) }}"
               > 
               <i class='fas fa-user-check'></i> Ajukan
             </a>
            {{-- </form> --}}
            <a class="btn btn-danger btn-md" href="{{ route('tolak.beasiswa', ['id' => $item->id] ) }}" >
            <i class='fas fa-user-times'></i>
            Tolak
          </a>
          {{-- <form id="tolak-form" action="{{ route('tolak.beasiswa', ['id' => $item->id] ) }}" method="POST" style="display: none;">
            @csrf
            </form> --}}
              </td>
    @empty
    @endforelse
  </tbody>
</table>
<br>

@endsection
 {{-- <form id='ajukan-form-{{'id'}}' action="{{ route('ajukan.beasiswa', ['id' => $item->id] ) }}" method="POST" style="display: none;">
               @csrf
               </form> --}}
               {{-- onclick="event.preventDefault();
                document.getElementById('ajukan-form-{{'id'}}').submit();" > --}}