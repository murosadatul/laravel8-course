{{-- exxtends adalah blade helper digunakan untuk menggunakan kode program lain sebagai kerangka --}}
@extends('admin.layouts.app')
{{-- section adalah blade helper yang digunakan untuk mengisi yield yang sebelumnya di buat di layouts/app.blade --}}
{{-- start section content --}}
@section('content')
    <div class="page-header">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Report</a></li>
        <li class="breadcrumb-item"><a href="/report/sale">Sales</a></li>
        <li class="breadcrumb-item active" aria-current="page">List Data</li>
      </ol>
    </nav>

    <div class="pull-right">
        <a href="/report/sale_excel" >
            <button type="button" class="btn btn-outline-warning btn-icon-text"> Reload <i class="mdi mdi-refresh"></i></button>
        </a>
        &nbsp;
        <a href="/report/sale_excel" >
            <button type="button" class="btn btn-outline-success btn-icon-text"> Excel <i class="mdi mdi-file-excel"></i></button>
        </a>
        <a href="/report/sale_pdf" >
            <button type="button" class="btn btn-outline-danger btn-icon-text"> PDF <i class="mdi mdi-file-pdf"></i></button>
        </a>
    </div>
  </div>
  <div class="row">


    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            @include('admin.layouts.error')
            <h4 class="card-title">Sales Rekap Data</h4>
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th width="20">No</th>
                    <th>Order Date</th>
                    <th>Region</th>
                    <th>Item</th>
                    <th>Sales Man</th>
                    <th>Unit</th>
                  </tr>
                </thead>
                <tbody>

                    @php
                        $no = $rs_id->firstItem();
                    @endphp
                    @forelse ($rs_id as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->order_date }}</td>
                            <td>{{ $item->region }}</td>
                            <td>{{ $item->item }}</td>
                            <td>{{ $item->sales_man }}</td>
                            <td>{{ $item->unit }}</td>
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
            $("<form method='POST' action='/masterpost/"+id+"'>\n\
                <input type='hidden' value='"+token+"' name='_token'/>\n\
                <input type='hidden' value='DELETE' name='_method'/>\n\
                </form>\n\
            ").appendTo('body').submit();
        }
    });
  </script>
  <!-- End custom js for this page -->
  @endpush



