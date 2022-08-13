@extends('template.app')
@section('content')

    <h3> Halaman List Pendaftar </h3>
     <br/>
{{-- 
  <form action="{{URL('beasiswa')}}" method="GET">
  <ul class="navbar-nav mr-sm-2">
    <li>Jurusan
      <div class="input-group">
      <select class="form-control-sm" name="cari" id="cari">
       <option disable value> Prodi </option>
      @foreach ($jurusan as $item)
      <option value="{{$item->id}}">{{$item->jurusan}}</option>
      @endforeach
      </select>
      <button type="submit" class="btn btn-primary mr-2">Cari</button>
      </div>
    </li>
  </ul>
  <br/> --}}
  
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
              <a class="btn btn-inverse-primary btn-sm" href="{{ route('ajukan.beasiswa', ['id' => $item->id] ) }}"
                {{-- onclick="event.preventDefault();
                document.getElementById('ajukan-form-{{'id'}}').submit();" > --}}
               > Ajukan
             </a>
             {{-- <form id='ajukan-form-{{'id'}}' action="{{ route('ajukan.beasiswa', ['id' => $item->id] ) }}" method="POST" style="display: none;">
               @csrf
               </form> --}}
              </td>
              <td>
                <form action="/beasiswa/{{$item->id}}" method="POST">
                    @csrf
                    @method('delete')
                    <a href="beasiswa/{{$item->id}}/edit" class="btn btn-info btn-sm">Detail & Edit</a>
                    <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal">
                    Launch demo modal
                  </button>
                  <input type="submit" class="btn btn-warning btn-sm" value="Delete">
                </form>
                
                <div class="modal fade text-left" id="Modal" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h4 class="modal-title">{{ __('Create New User') }}</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>                    
                          </div>
                    <div class="modal-body">
                      <div class="col-12 grid-margin">
                      <div class="card">
                        <div class="card-body">
                          <h4 class="card-title">Horizontal Two column</h4>
                          <form class="form-sample">
                            <p class="card-description">
                              Personal info
                            </p>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group row">
                                  <label class="col-sm-3 col-form-label">First Name</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" />
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group row">
                                  <label class="col-sm-3 col-form-label">Last Name</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" />
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group row">
                                  <label class="col-sm-3 col-form-label">Gender</label>
                                  <div class="col-sm-9">
                                    <select class="form-control">
                                      <option>Male</option>
                                      <option>Female</option>
                                    </select>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group row">
                                  <label class="col-sm-3 col-form-label">Date of Birth</label>
                                  <div class="col-sm-9">
                                    <input class="form-control" placeholder="dd/mm/yyyy"/>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group row">
                                  <label class="col-sm-3 col-form-label">Category</label>
                                  <div class="col-sm-9">
                                    <select class="form-control">
                                      <option>Category1</option>
                                      <option>Category2</option>
                                      <option>Category3</option>
                                      <option>Category4</option>
                                    </select>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group row">
                                  <label class="col-sm-3 col-form-label">Membership</label>
                                  <div class="col-sm-4">
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="membershipRadios" id="membershipRadios1" value="" checked>
                                        Free
                                      </label>
                                    </div>
                                  </div>
                                  <div class="col-sm-5">
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="membershipRadios" id="membershipRadios2" value="option2">
                                        Professional
                                      </label>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <p class="card-description">
                              Address
                            </p>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group row">
                                  <label class="col-sm-3 col-form-label">Address 1</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" />
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group row">
                                  <label class="col-sm-3 col-form-label">State</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" />
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group row">
                                  <label class="col-sm-3 col-form-label">Address 2</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" />
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group row">
                                  <label class="col-sm-3 col-form-label">Postcode</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" />
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group row">
                                  <label class="col-sm-3 col-form-label">City</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" />
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group row">
                                  <label class="col-sm-3 col-form-label">Country</label>
                                  <div class="col-sm-9">
                                    <select class="form-control">
                                      <option>America</option>
                                      <option>Italy</option>
                                      <option>Russia</option>
                                      <option>Britain</option>
                                    </select>
                                  </div>
                                </div>
                              </div>
                              <div class="from-group">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                </div>
              </div>
        </div>
    </div>

                          </div>
                        </div>
                  </div>
              </div>
          
            </td>
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