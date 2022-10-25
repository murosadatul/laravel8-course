{{-- exxtends adalah blade helper digunakan untuk menggunakan kode program lain sebagai kerangka --}}
@extends('admin.layouts.app')
{{-- section adalah blade helper yang digunakan untuk mengisi yield yang sebelumnya di buat di layouts/app.blade --}}
{{-- start section content --}}
@section('content')
  <div class="row">
    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-9">
              <div class="d-flex align-items-center align-self-start">
                <h3 class="mb-0">${{ number_format($potential_growth,2) }}</h3>
                <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p>
              </div>
            </div>
            <div class="col-3">
              <div class="icon icon-box-success ">
                <span class="mdi mdi-arrow-top-right icon-item"></span>
              </div>
            </div>
          </div>
          <h6 class="text-muted font-weight-normal">Potential growth</h6>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-9">
              <div class="d-flex align-items-center align-self-start">
                <h3 class="mb-0">${{ number_format($revenue_current,2) }}</h3>
                <p class="text-success ml-2 mb-0 font-weight-medium">+11%</p>
              </div>
            </div>
            <div class="col-3">
              <div class="icon icon-box-success">
                <span class="mdi mdi-arrow-top-right icon-item"></span>
              </div>
            </div>
          </div>
          <h6 class="text-muted font-weight-normal">Revenue current</h6>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-9">
              <div class="d-flex align-items-center align-self-start">
                <h3 class="mb-0">${{ number_format($daily_income,2) }}</h3>
                <p class="text-danger ml-2 mb-0 font-weight-medium">-2.4%</p>
              </div>
            </div>
            <div class="col-3">
              <div class="icon icon-box-danger">
                <span class="mdi mdi-arrow-bottom-left icon-item"></span>
              </div>
            </div>
          </div>
          <h6 class="text-muted font-weight-normal">Daily Income</h6>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-9">
              <div class="d-flex align-items-center align-self-start">
                <h3 class="mb-0">${{ number_format($expense_current,2) }}</h3>
                <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p>
              </div>
            </div>
            <div class="col-3">
              <div class="icon icon-box-success ">
                <span class="mdi mdi-arrow-top-right icon-item"></span>
              </div>
            </div>
          </div>
          <h6 class="text-muted font-weight-normal">Expense current</h6>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Transaction History</h4>
          <canvas id="transaction-history" class="transaction-chart"></canvas>
          <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
            <div class="text-md-center text-xl-left">
              <h6 class="mb-1">Transfer to Paypal</h6>
              <p class="text-muted mb-0">{{ changeDateTimeFormat($transfer_paypal['time'],'d M Y, H:i:A') }}</p>
            </div>
            <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
              <h6 class="font-weight-bold mb-0">${{ number_format($transfer_paypal['nominal'],2) }}</h6>
            </div>
          </div>
          <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
            <div class="text-md-center text-xl-left">
              <h6 class="mb-1">Tranfer to Stripe</h6>
              <p class="text-muted mb-0">{{ changeDateTimeFormat($transfer_stripe['time'],'d M Y, H:i:A') }}</p>
            </div>
            <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
              <h6 class="font-weight-bold mb-0">${{ number_format($transfer_stripe['nominal'],2) }}</h6>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-8 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="d-flex flex-row justify-content-between">
            <h4 class="card-title mb-1">Open Projects</h4>
            <p class="text-muted mb-1">Your data status</p>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="preview-list">
                <div class="preview-item border-bottom">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-primary">
                      <i class="mdi mdi-file-document"></i>
                    </div>
                  </div>
                  <div class="preview-item-content d-sm-flex flex-grow">
                    <div class="flex-grow">
                      <h6 class="preview-subject">Admin dashboard design</h6>
                      <p class="text-muted mb-0">Broadcast web app mockup</p>
                    </div>
                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                      <p class="text-muted">15 minutes ago</p>
                      <p class="text-muted mb-0">30 tasks, 5 issues </p>
                    </div>
                  </div>
                </div>
                <div class="preview-item border-bottom">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-success">
                      <i class="mdi mdi-cloud-download"></i>
                    </div>
                  </div>
                  <div class="preview-item-content d-sm-flex flex-grow">
                    <div class="flex-grow">
                      <h6 class="preview-subject">Wordpress Development</h6>
                      <p class="text-muted mb-0">Upload new design</p>
                    </div>
                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                      <p class="text-muted">1 hour ago</p>
                      <p class="text-muted mb-0">23 tasks, 5 issues </p>
                    </div>
                  </div>
                </div>
                <div class="preview-item border-bottom">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-info">
                      <i class="mdi mdi-clock"></i>
                    </div>
                  </div>
                  <div class="preview-item-content d-sm-flex flex-grow">
                    <div class="flex-grow">
                      <h6 class="preview-subject">Project meeting</h6>
                      <p class="text-muted mb-0">New project discussion</p>
                    </div>
                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                      <p class="text-muted">35 minutes ago</p>
                      <p class="text-muted mb-0">15 tasks, 2 issues</p>
                    </div>
                  </div>
                </div>
                <div class="preview-item border-bottom">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-danger">
                      <i class="mdi mdi-email-open"></i>
                    </div>
                  </div>
                  <div class="preview-item-content d-sm-flex flex-grow">
                    <div class="flex-grow">
                      <h6 class="preview-subject">Broadcast Mail</h6>
                      <p class="text-muted mb-0">Sent release details to team</p>
                    </div>
                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                      <p class="text-muted">55 minutes ago</p>
                      <p class="text-muted mb-0">35 tasks, 7 issues </p>
                    </div>
                  </div>
                </div>
                <div class="preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-warning">
                      <i class="mdi mdi-chart-pie"></i>
                    </div>
                  </div>
                  <div class="preview-item-content d-sm-flex flex-grow">
                    <div class="flex-grow">
                      <h6 class="preview-subject">UI Design</h6>
                      <p class="text-muted mb-0">New application planning</p>
                    </div>
                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                      <p class="text-muted">50 minutes ago</p>
                      <p class="text-muted mb-0">27 tasks, 4 issues </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-4 grid-margin">
      <div class="card">
        <div class="card-body">
          <h5>Revenue</h5>
          <div class="row">
            <div class="col-8 col-sm-12 col-xl-8 my-auto">
              <div class="d-flex d-sm-block d-md-flex align-items-center">
                <h2 class="mb-0">${{ number_format($revenue,2) }}</h2>
                <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p>
              </div>
              <h6 class="text-muted font-weight-normal">11.38% Since last month</h6>
            </div>
            <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
              <i class="icon-lg mdi mdi-codepen text-primary ml-auto"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-4 grid-margin">
      <div class="card">
        <div class="card-body">
          <h5>Sales</h5>
          <div class="row">
            <div class="col-8 col-sm-12 col-xl-8 my-auto">
              <div class="d-flex d-sm-block d-md-flex align-items-center">
                <h2 class="mb-0">${{ number_format($sales,2) }}</h2>
                <p class="text-success ml-2 mb-0 font-weight-medium">+8.3%</p>
              </div>
              <h6 class="text-muted font-weight-normal"> 9.61% Since last month</h6>
            </div>
            <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
              <i class="icon-lg mdi mdi-wallet-travel text-danger ml-auto"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-4 grid-margin">
      <div class="card">
        <div class="card-body">
          <h5>Purchase</h5>
          <div class="row">
            <div class="col-8 col-sm-12 col-xl-8 my-auto">
              <div class="d-flex d-sm-block d-md-flex align-items-center">
                <h2 class="mb-0">${{ number_format($purchase,2) }}</h2>
                <p class="text-danger ml-2 mb-0 font-weight-medium">-2.1% </p>
              </div>
              <h6 class="text-muted font-weight-normal">2.27% Since last month</h6>
            </div>
            <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
              <i class="icon-lg mdi mdi-monitor text-success ml-auto"></i>
            </div>
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
  <script src="{{ asset('admin/vendors/progressbar.js/progressbar.min.js') }}"></script>
  <script src="{{ asset('admin/vendors/jvectormap/jquery-jvectormap.min.js') }}"></script>
  <script src="{{ asset('admin/vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
  <script src="{{ asset('admin/vendors/owl-carousel-2/owl.carousel.min.js') }}"></script>
  <!-- End plugin js for this page -->

  <!-- Custom js for this page -->
  <script>
    if ($("#transaction-history").length) {
      var areaData = {
        labels: ["Paypal", "Stripe","Cash"],
        datasets: [{
            data: {{ json_encode($chartdata) }},
            backgroundColor: [
              "#111111","#00d25b","#ffab00"
            ]
          }
        ]
      };
      var areaOptions = {
        responsive: true,
        maintainAspectRatio: true,
        segmentShowStroke: false,
        cutoutPercentage: 70,
        elements: {
          arc: {
              borderWidth: 0
          }
        },
        legend: {
          display: false
        },
        tooltips: {
          enabled: true
        }
      }
      var transactionhistoryChartPlugins = {
        beforeDraw: function(chart) {
          var width = chart.chart.width,
              height = chart.chart.height,
              ctx = chart.chart.ctx;

          ctx.restore();
          var fontSize = 1;
          ctx.font = fontSize + "rem sans-serif";
          ctx.textAlign = 'left';
          ctx.textBaseline = "middle";
          ctx.fillStyle = "#ffffff";

          var text = "$1200",
              textX = Math.round((width - ctx.measureText(text).width) / 2),
              textY = height / 2.4;

          ctx.fillText(text, textX, textY);

          ctx.restore();
          var fontSize = 0.75;
          ctx.font = fontSize + "rem sans-serif";
          ctx.textAlign = 'left';
          ctx.textBaseline = "middle";
          ctx.fillStyle = "#6c7293";

          var texts = "Total",
              textsX = Math.round((width - ctx.measureText(text).width) / 1.93),
              textsY = height / 1.7;

          ctx.fillText(texts, textsX, textsY);
          ctx.save();
        }
      }
      var transactionhistoryChartCanvas = $("#transaction-history").get(0).getContext("2d");
      var transactionhistoryChart = new Chart(transactionhistoryChartCanvas, {
        type: 'doughnut',
        data: areaData,
        options: areaOptions,
        plugins: transactionhistoryChartPlugins
      });
    }
  </script>
  <!-- End custom js for this page -->
  @endpush


