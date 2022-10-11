{{-- exxtends adalah blade helper digunakan untuk menggunakan kode program lain sebagai kerangka --}}
@extends('admin.layouts.app')
{{-- section adalah blade helper yang digunakan untuk mengisi yield yang sebelumnya di buat di layouts/app.blade --}}

@push('css')
<style>
    .ck.ck-editor{
        color:#000;
    }
</style>

@endpush

{{-- start section content --}}
@section('content')
    <div class="page-header">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Master</a></li>
        <li class="breadcrumb-item"><a href="/masterpost">Posts</a></li>
        <li class="breadcrumb-item active" aria-current="page"> {{ ucwords($mode_page) }} Data</li>
      </ol>
    </nav>
    <a href="#!" onclick="window.history.go(-1)">
        <button type="button" class="btn btn-outline-warning btn-icon-text"> Back <i class="mdi mdi-skip-backward"></i></button>
    </a>
  </div>
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            @include('admin.layouts.error')
            <h4 class="card-title">{{ $mode_page }} Posts</h4>
            <form class="forms-sample" method="POST" action="/masterpost" enctype="multipart/form-data">
                <input type="hidden" name="id" value="{{ isset($rs_id) ? $rs_id->id : '' }}">
                @csrf
              <div class="form-group row">
                <label for="categoryId" class="col-sm-3 col-form-label">ID</label>
                <div class="col-sm-6"> {{ isset($rs_id) ? $rs_id->id : '*otomatis' }}
                </div>
              </div>
              <div class="form-group row">
                <label for="title" class="col-sm-3 col-form-label">Title</label>
                <div class="col-sm-7">
                  <input type="text" name="title" value="{{ isset($rs_id) ? $rs_id->title : '' }}" class="form-control" placeholder="input title" autocomplete="off">
                </div>
              </div>
              <div class="form-group row">
                <label for="title" class="col-sm-3 col-form-label">Category</label>
                <div class="col-sm-7">
                    <select class="form-control" name="category_id">
                        <option value="" disabled selected>Choose..</option>
                        @foreach ($rs_category as $item)
                            <option value="{{ $item->id }}" {{ (( isset($rs_id) && $item->id == $rs_id->category_id) ? "selected" : "" ) }} >{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="title" class="col-sm-3 col-form-label">Image</label>
                <div class="col-sm-7">
                    <input type="file" id="image" name="image" class="form-control"/>
                    <input type="hidden" name="image_old" value="{{ isset($rs_id) ? $rs_id->image : '' }}" />
                    {{-- display image --}}
                    <img id="show_image" src="{{ asset($rs_id->image)}}" class="img-thumbnail" />
                </div>
              </div>
              <div class="form-group row">
                <label for="title" class="col-sm-3 col-form-label">Body</label>
                <div class="col-sm-7">
                    <textarea name="body" id="editor" style="color:#000;">{{ isset($rs_id) ? $rs_id->body : '' }}</textarea>
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

  @push('js')
  <!-- Plugin js for this page -->
  <script src="{{ asset('plugins/ckeditor5-build-classic/ckeditor.js') }}"></script>
  <script>
    ClassicEditor
		.create( document.querySelector( '#editor' ), {
			// toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
		} )
		.then( editor => {
			window.editor = editor;
		} )
		.catch( err => {
			console.error( err.stack );
		} );
  </script>
  @endpush


