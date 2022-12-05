@extends('layouts.masterpage')

@section('title', 'List Tertunda')

@section('pagetitle', 'List Tertunda')

@section('breadOld', 'List')

@section('breadNow', 'List Tertunda')

@section('content')

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card" style="border-radius: 10px">
              <div class="card-body">
                  <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Pekerjaan</th>
                            <th>Deskripsi</th>
                            <th style="width: 18%">Progress</th>
                            <th>Status</th>
                            <th>Tanggal Mulai</th>
                            <th>Target Selesai</th>
                            <th style="text-align: center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($delay as $dt)
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
                                  @if ($dt->status == 'on progres')
                                    <label class="badge badge-warning">
                                      {{ $dt->status }}
                                    </label>
                                  @endif
                                  @if($dt->status == 'finish')
                                    <label class="badge badge-success">
                                      {{ $dt->status }}
                                    </label>
                                  @endif
                                  @if($dt->status == 'delay')
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
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton1" style="justify-content: space-between; cursor: pointer;">

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
                            <strong>Tidak Ada Progres Terhenti</strong>
                          </div>
                        @endforelse
                    </tbody>
                  </table>
              </div>
              {{ $delay->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>

@endsection

{{-- on progres, stop, finish --}}