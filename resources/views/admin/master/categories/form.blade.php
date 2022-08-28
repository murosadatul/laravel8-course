{{-- exxtends adalah blade helper digunakan untuk menggunakan kode program lain sebagai kerangka --}}
@extends('admin.layouts.app')
{{-- section adalah blade helper yang digunakan untuk mengisi yield yang sebelumnya di buat di layouts/app.blade --}}
{{-- start section content --}}
@section('content')
    <div class="page-header">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Master</a></li>
        <li class="breadcrumb-item"><a href="/category">Categories</a></li>
        <li class="breadcrumb-item active" aria-current="page"> {{ ucwords($mode_page) }} Data</li>
      </ol>
    </nav>
    <a href="/category" >
        <button type="button" class="btn btn-outline-warning btn-icon-text"> Back <i class="mdi mdi-skip-backward"></i></button>
    </a>
  </div>
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            @include('admin.layouts.error')
            <h4 class="card-title">{{ $mode_page }} Category</h4>
            <form class="forms-sample" method="POST" action="/category">
                <input type="hidden" name="id" value="{{ isset($rs_id) ? $rs_id->id : '' }}">
                @csrf
              <div class="form-group row">
                <label for="categoryId" class="col-sm-3 col-form-label">ID</label>
                <div class="col-sm-6"> {{ isset($rs_id) ? $rs_id->id : '*otomatis' }}
                </div>
              </div>
              <div class="form-group row">
                <label for="category" class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-7">
                  <input type="text" name="name" value="{{ isset($rs_id) ? $rs_id->name : '' }}" class="form-control" id="category" placeholder="input category name" autocomplete="off">
                </div>
              </div>
              <button type="submit" class="btn btn-primary mr-2">Submit</button>
              <button class="btn btn-dark">Cancel</button>
            </form>
          </div>
        </div>
      </div>
  </div>
  @endsection
  {{-- end section content --}}


