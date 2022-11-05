{{-- exxtends adalah blade helper digunakan untuk menggunakan kode program lain sebagai kerangka --}}
@extends('admin.layouts.app')
{{-- section adalah blade helper yang digunakan untuk mengisi yield yang sebelumnya di buat di layouts/app.blade --}}
{{-- start section content --}}
@section('content')
    <div class="page-header">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Report</a></li>
        <li class="breadcrumb-item"><a href="/report/revenue">Revenue</a></li>
        <li class="breadcrumb-item active" aria-current="page">List Data</li>
      </ol>
    </nav>

    <div class="pull-right">
    </div>
  </div>
  <div class="row">


    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            @include('admin.layouts.error')
            <h4 class="card-title">Sales Rekap Data</h4>
            <div class="table-responsive" id="chart_body">
                {!! $chart->container() !!}
            </div>
          </div>
        </div>
      </div>
  </div>
  @endsection
  {{-- end section content --}}

  @push('js')
  <!-- Plugin js for this page -->
  <script src="{{ asset('admin/vendors/chart.js/Chart.min.js') }}"></script>
  {!! $chart->script() !!}
  @endpush



