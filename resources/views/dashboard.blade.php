@section('content')
@extends('template.app')
           <h3 class="font-weight-bold">Welcome {{ Auth::user()->nama }}</h3>
          <h6 class="font-weight-normal mb-0">Selamat Datang Di SIM KEMAHASISWAAN....</span></h6>
    <br>
      <div class="col-md-6 grid-margin stretch-card">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="..." class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="..." class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="..." class="d-block w-100" alt="...">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
      <div class="col-md-6 grid-margin transparent">
        <div class="row">
          <div class="col-md-6 mb-4 stretch-card transparent">
            <div class="card card-tale">
              <div class="card-body">
                <p></p>
                <p class="mb-4">Total Pendaftar Beasiswa</p>
                <p class="fs-30 mb-2"> <i class='fas fa-users' style='font-size:36px'></i> {{$total}}</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 mb-4 stretch-card transparent">
            <div class="card card-dark-blue">
              <div class="card-body">
                <p class="mb-4">Total Kuota</p>
                <p class="fs-30 mb-2"> <i class='fas fa-users' style='font-size:36px'></i>  {{$jumlahkuota->total_kuota}}</p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
            <div class="card card-light-blue">
              <div class="card-body">
                <p class="mb-4">Number of Meetings</p>
                <p class="fs-30 mb-2">34040</p>
                <p>2.00% (30 days)</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 stretch-card transparent">
            <div class="card card-light-danger">
              <div class="card-body">
                <p class="mb-4">Number of Clients</p>
                <p class="fs-30 mb-2">47033</p>
                <p>0.22% (30 days)</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Total Daftar Perjurusan</h4>
          <p class="card-description">
          </p>
          <div class="table-responsive pt-3">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>No</th>
                  <th> Jurusan </th>
                  <th>Total Daftar </th>
                  <th>Sisa Kuota</th>
                </tr>
              </thead>
              <tbody>
               
                <tr>
                  @forelse ($sisakuota as $key => $item )
                  {{-- <td> {{$kuotaprodi}}</td> --}}
                  <td> {{$key + 1}} </td>
                  <td> {{$item->jurusan}}</td>
                  <td> {{$item->total_daftar}} </td>
                  <td>{{$item->sisa_kuota}}</td>
                </tr>
                @empty
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
      <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <p class="card-title mb-0">Kuota Perjurusan</p>
            <div class="table-responsive">
              <table class="table table-borderless">
                <thead>
                  <tr>
                    <th class="pl-0  pb-2 border-bottom">Jurusan</th>
                    <th class="border-bottom pb-2">Kuota</th>
                  </tr>
                </thead>
                <tbody>
                @forelse ($kuota as $key => $item )
                <tr>
                <td>{{$item->jurusan}} </td>
                <td>{{$item->kuota}} </td>
                </tr>
                 @empty
                 @endforelse
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4 stretch-card grid-margin">
      </div>
    </div>
  
@endsection