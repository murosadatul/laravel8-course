{{-- exxtends adalah blade helper digunakan untuk menggunakan kode program lain sebagai kerangka --}}
@extends('admin.layouts.app')
{{-- section adalah blade helper yang digunakan untuk mengisi yield yang sebelumnya di buat di layouts/app.blade --}}
{{-- start section content --}}
@section('content')
    <div class="page-header">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Master</a></li>
        <li class="breadcrumb-item"><a href="/tag">Tags</a></li>
        <li class="breadcrumb-item active" aria-current="page">List Data</li>
      </ol>
    </nav>
    <a href="/tag/create" >
        <button type="button" class="btn btn-outline-success btn-icon-text"> Add Data <i class="mdi mdi-plus-circle"></i></button>
    </a>
  </div>
  <div class="row">


    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            @include('admin.layouts.error')
            <h4 class="card-title">Data Tag</h4>
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th width="20">ID</th>
                    <th>Tag</th>
                    <th width="100">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($rs_id as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>
                                <a href="/tag/{{ $item->id }}/edit" >
                                    <button type="button" class="btn btn-outline-warning btn-icon-text"> Edit <i class="mdi mdi-file-check btn-icon-append"></i></button>
                                </a>

                                <button type="button" id="delete" data_id="{{ $item->id }}" data_title="{{ $item->name }}" token="{{ session()->get('_token') }}" class="btn btn-outline-danger btn-icon-text"> Delete <i class="mdi mdi-delete-forever"></i></button>
                            </td>
                        </tr>
                    @empty
                    <tr>
                        <td colspan="3"><i class="fa fa-folder-open"></i> Data tidak ada.</td>
                    </tr>

                    @endforelse
                </tbody>
              </table>
                {{-- information & pagination --}}
                @if(empty(!$rs_id->firstItem()))
                <div class="row col-md-12">
                    <div class="col-md-6">
                        Showing {{ $rs_id->firstItem() }} to {{ $rs_id->lastItem() }} from {{ $rs_id->total() }}
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        {!! $rs_id->links() !!}
                    </div>
                </div>
                @endif
            </div>
          </div>
        </div>
      </div>
  </div>
  @endsection
  {{-- end section content --}}

  @push('js')

  <!-- Custom js for this page -->
  <script>

    // form delete with validation
    $(document).on('click','#delete',function(){
        var title = $(this).attr('data_title');
        var id    = $(this).attr('data_id');
        var token = $(this).attr('token');
        if(confirm('Apakah Anda akan menghapus data '+title+' .?'))
        {
            $("<form method='POST' action='/tag/"+id+"'>\n\
                <input type='hidden' value='"+token+"' name='_token'/>\n\
                <input type='hidden' value='DELETE' name='_method'/>\n\
                </form>\n\
            ").appendTo('body').submit();
        }
    });
  </script>
  <!-- End custom js for this page -->
  @endpush



