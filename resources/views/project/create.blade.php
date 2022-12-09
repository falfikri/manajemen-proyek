@extends('layouts.masterpage')

@section('title', 'List Kerja')

@section('pagetitle', 'ToDo List')

@section('breadOld', 'List')

@section('breadNow', 'List Kerja')


@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('todo.store') }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Nama Pekerjaan</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nama Pekerjaan">
                                value="{{ old('name') }}">
                                @error('name')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Persentase progres</label>
                            <div class="col-sm-9">
                                <input type="text" name="progres" class="form-control @error('progres') is-invalid @enderror" placeholder="Persentase Progres">
                                value="{{ old('progres') }}">
                                @error('progres')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Status Pengerjaan</label>
                            <div class="col-sm-9">
                                <select name="status" class="form-select form-select-md" placeholder="Status Pengerjaan">
                                        <option>delay</option>
                                        <option>on progres</option>
                                        <option>finish</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Tanggal Mulai</label>
                            <div class="col-sm-9">
                                <input type="date" name="start" class="form-control @error('start') is-invalid @enderror">
                                @error('start')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Tanggal Target Selesai</label>
                            <div class="col-sm-9">
                                <input type="date" name="finish" class="form-control @error('finish') is-invalid @enderror">
                                @error('finish')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Description</label>
                            <div class="col-sm-9">
                                <textarea name="description" id="" cols="30" rows="4" class="form-control @error('description') is-infalid @enderror" placeholder="Deskripsi Pekerjaan"></textarea>
                                @error('description')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
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