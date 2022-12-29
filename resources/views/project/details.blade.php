@extends('layouts.masterpage')

@section('title', 'Details Pekerjaan')

@section('pagetitle', 'Details Pekerjaan')

@section('breadOld', 'Details Pekerjaan')

@section('breadNow', 'Details Pekerjaan')

@section('content')
<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Details Pekerjaan {{ $details->name }}</h4>
        <form class="forms-sample">
          <div class="form-group">
            <label>Progres Pengerjaan</label>
            <input type="text" class="form-control" disabled @if($details->status == "finish") value="Pekerjaan Telah Selesai Dilakukan" @else value="{{ $details->progres }} % Pengerjaan" @endif style="font-weight: bold;">
          </div>
          <div class="form-group">
            <label>Status Pengerjaan</label>
            <input type="text" class="form-control" disabled value="{{ $details->status }}" style="font-weight: bold;">
          </div>
          <div class="form-group">
            <label>Tanggal Mulai Pengerjaan</label>
            <input type="text" class="form-control" disabled value="{{ date('d-m-Y', strtotime($details->start)) }}" style="font-weight: bold;">
          </div>
          <div class="form-group">
            <label>Target Selesai Pengerjaan</label>
            <input type="text" class="form-control" disabled value="{{ date('d-m-Y', strtotime($details->finish)) }}" style="font-weight: bold;">
          </div>
          <div class="form-group">
            <label>Deskripsi Pekerjaan</label>
            <input type="text" class="form-control" disabled value="{{ $details->description }}" style="font-weight: bold;">
          </div>
          <div class="form-group">
            <label>Tanggal Data Di Buat</label>
            <input type="text" class="form-control" disabled value="{{ $details->created_at }}" style="font-weight: bold;">
          </div>
          <div class="form-group">
            <label>Tanggall Data Di Update</label>
            <input type="text" class="form-control" disabled value="{{ $details->updated_at }}" style="font-weight: bold;">
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection