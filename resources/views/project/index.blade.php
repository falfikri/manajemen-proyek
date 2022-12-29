@extends('layouts.masterpage')

@section('title', 'List Kerja')

@section('pagetitle', 'Pabrik Ikan / ToDo List')

@section('breadOld', 'List')

@section('breadNow', 'List Kerja')

@section('content')
    <div class="pace"></div>
    <div class="row">
      <div class="col-md-12">
        <div class="tab-content tab-transparent-content">
          <div class="tab-pane fade show active" id="business-1" role="tabpanel" aria-labelledby="business-tab">
            <div class="row">
              <div class="col-lg-4 col-lg-3 col-sm-6 grid-margin stretch-card">
                <div class="card" style="border-radius: 10px">
                  <div class="card-body text-center">
                    <h5 class="mb-2 text-dark font-weight-normal">List Pekerjaan</h5>
                    <h2 class="mb-4 text-dark font-weight-bold">Selesai</h2> </br>
                    <h3 class="mb-0 font-weight-bold mt-2 text-dark">{{ $listselesai }} Pekerjaan</h3>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-lg-3 col-sm-6 grid-margin stretch-card">
                <div class="card"  style="border-radius: 10px">
                  <div class="card-body text-center">
                    <h5 class="mb-2 text-dark font-weight-normal">List Pekerjaan</h5>
                    <h2 class="mb-4 text-dark font-weight-bold">Dalam Progres</h2> </br>
                    <h3 class="mb-0 font-weight-bold mt-2 text-dark">{{ $listprogres }} Pekerjaan</h3>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-lg-3 col-sm-6 grid-margin stretch-card">
                <div class="card" style="border-radius: 10px">
                  <div class="card-body text-center"  style="border-radius: 10px">
                    <h5 class="mb-2 text-dark font-weight-normal">List Pekerjaan</h5>
                    <h2 class="mb-4 text-dark font-weight-bold">Tertunda</h2> </br>
                    <h3 class="mb-0 font-weight-bold mt-2 text-dark">{{ $listtertunda }} Pekerjaan</h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      </div>
        @if ($message = Session::get('message'))
          <div class="alert alert-success alert-dismissible show" role="alert">
              <i class="mdi mdi-check"></i>
              <strong>{{ $message }}</strong>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card" style="border-radius: 10px">
              <div class="card-body">
                <div class="row">
                    <div class="col" style="display: flex; justify-content: space-between;">

                      <a href="{{ route('report') }}">
                        <button class="btn btn-outline-danger btn-md">
                          <i class="mdi mdi-printer"></i>
                          Print (Laporan)
                        </button>
                      </a>

                      <a href="{{ route('todo.create') }}">
                        <button class="btn btn-outline-success btn-md">
                          <i class="mdi mdi-plus"></i>
                          Tambah Data
                        </button>
                      </a>

                    </div>
                  </div>
                  <br>

                  <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                          <th>#</th>
                          <th>Nama Pekerjaan</th>
                          <th>Deskripsi</th>
                          <th style="width: 15%">Progress</th>
                          <th>Status</th>
                          <th>Tanggal Mulai</th>
                          <th>Target Selesai</th>
                          <th style="text-align: center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($todo as $dt)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ Str::limit($dt->name, 15) }}</td>
                                <td>{{ Str::limit($dt->description, 20) }}</td>
                                
                                <td style="text-align: center">
                                  {{ $dt->progres }}%
                                  <div class="progress" style="height: 8px">
                                      <div class="progress-bar bg-gradient" role="progressbar"
                                          style="width: {{ $dt->progres }}%; height: 8px"
                                          aria-valuenow="{!! $dt->progres !!}"
                                          aria-valuemin="0"
                                          aria-valuemax="100"></div>
                                  </div>
                                </td>
                                
                                <td style="text-align: center">
                                  @if($dt->status == 'on progres')
                                    <label class="badge badge-warning">
                                      {{ $dt->status }}
                                    </label>

                                  @elseif($dt->status == 'finish')
                                    <label class="badge badge-success">
                                      {{ $dt->status }}
                                    </label>

                                  @else
                                    <label class="badge badge-danger">
                                      {{ $dt->status }}
                                    </label>
                                  @endif
                                </td>
                                
                                <td>
                                  {{ date('d-m-Y', strtotime($dt->start)) }}
                                </td>
                                <td>
                                  {{ date('d-m-Y', strtotime($dt->finish)) }}
                                </td>
                                
                                <td style="text-align: center">
                                  <div class="dropdown">
                                    <button type="button" class="btn" data-bs-toggle="dropdown"><i class="mdi mdi-alert-circle" style="font-size: 16px; color: orange"></i></button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton1" style="cursor: pointer;">

                                      <a class="dropdown-item" href="{{ route('todo.show', $dt->id) }}" style="width: 100%">
                                        <button class="btn btn-warning btn-icon-text" style="width: 100%"><i class="mdi mdi-alert-circle-outline btn-icon-prepend"></i>Details</button>
                                      </a>

                                      <a class="dropdown-item" href="{{ route('todo.edit', $dt->id) }}" style="width: 100%">
                                        <button class="btn btn-info btn-icon-text" style="width: 100%"><i class="mdi mdi-pencil btn-icon-prepend"></i>Edit</button>
                                      </a>

                                      <form action="{{ route('todo.destroy', $dt->id) }}" method="post" class="dropdown-item" style="cursor: pointer">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-icon-text" style="width: 100%"><i class="mdi mdi-cup btn-icon-prepend"></i>Hapus</button>
                                      </form>
                                    </div>
                                  </div>
                                </td>
                            </tr>
                        @empty
                          <div class="alert alert-warning alert-dismissible show" role="alert">
                            <i class="mdi mdi-alert-circle-outline"></i>
                            <strong>Data Pekerjaan Masih Kosong</strong>
                          </div>
                        @endforelse
                    </tbody>
                  </table>
              </div>
              {{ $todo->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>

@endsection