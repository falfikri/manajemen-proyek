@extends('layouts.masterpage')

@section('title', 'Edit Data')

@section('pagetitle', 'Edit Data')

@section('breadOld', 'List')

@section('breadNow', 'Edit Data')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit Data {{ $todo->name }}</h4>

                  
                    <form action="{{ route('todo.update', $todo->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Nama Pekerjaan</label>
                          <div class="col-sm-9">
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror " placeholder="Nama Pekerjaan" value="{{ $todo->name }}">
                              @error('name')
                                <div class="text-danger">
                                  {{ $message }}
                                </div>
                              @enderror
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Status Pengerjaan</label>
                          <div class="col-sm-9">
                              <select name="status" class="form-select form-select-md" placeholder="Status Pengerjaan">
                                      <option>delay</option>
                                      <option>on progres</option>
                                      <option>finish</option>
                              </select>
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Persentase Progres</label>
                          <div class="col-sm-9">
                            <input type="number" name="progres" class="form-control @error('progres') is-invalid @enderror " placeholder="Persentase Progres">
                            @error('progres')
                                <div class="text-danger">
                                  {{ $message }}
                                </div>
                            @enderror
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Tanggal Mulai</label>
                          <div class="col-sm-9">
                            <input type="date" name="start" class="form-control @error('start') is-invalid @enderror ">
                            @error('start')
                                <div class="text-danger">
                                  {{ $message }}
                                </div>
                            @enderror
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Target Selesai</label>
                          <div class="col-sm-9">
                            <input type="date" name="finish" class="form-control @error('finish') is-invalid @enderror ">
                            @error('finish')
                                <div class="text-danger">
                                  {{ $message }}
                                </div>
                            @enderror
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Deskripsi Pekerjaan</label>
                          <div class="col-sm-9">
                            <textarea name="description" cols="30" rows="5" class="form-control @error('description') is-invalid @enderror"></textarea>
                          </div>
                        </div>

                        <div class="d-flex justify-content-around" style="margin: 10px">
                          <a href="{{ route('todo.index') }}" class="btn btn-rounded btn-danger btn-fw" style="margin-right: 50px">Kembali</a>
                          <div>
                              <button type="reset" class="btn btn-rounded btn-info btn-fw" style="margin-right: 25px">reset</button>
                              <button type="submit" class="btn btn-rounded btn-success btn-fw">Submit</button>
                          </div>
                      </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection