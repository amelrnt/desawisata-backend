@extends('admin.layouts2.master')
@section('title', 'Admin Wisata Page')
{{-- @section('page', 'Dashboard ') --}}


@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/toastr.min.css') }}">
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/toastr.min.js') }}"></script>

{!! Toastr::message() !!}
@foreach ($errors->all() as $error)
{!!  Toastr::error($error, 'Error', ['options']) !!}
@endforeach
<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>

<div class="page-heading">
    <h3>Wisata Data Statistics </h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-12">
            <div class="row">

                <div class="col-6 col-lg-5 col-md-6">
                    <a href="{{ route('dana.index') }}" >
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon blue">
                                        <i class="fas fa-dollar-sign"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Dana</h6>
                                    <h6 class="font-extrabold mb-0">Rp. {{ number_format($tempatt->dana) }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <a href="{{ route('order.index') }}">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon red">
                                        <i class="fas fa-inbox"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Total Pesanan</h6>
                                    <h6 class="font-extrabold mb-0">{{App\Models\Detail_transaksi::where('tempat_id',$tempatt->id)->count()}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <a href="{{ route('checkw.index') }}">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon purple">
                                        <i class="fas fa-search"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Check</h6>

                                    <h6 class="font-extrabold mb-0"> Pesanan </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>
                <?php $wahana = App\Models\Wahana::where('tempat_id',$tempatt->id)->get(); ?>
                @if(count($wahana)>0)
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <a href="{{ route('wahana.index') }}" >
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon purple">
                                        <i class="fas fa-gamepad"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Wahana</h6>
                                    <h6 class="font-extrabold mb-0"> {{App\Models\Wahana::where('tempat_id', $tempatt->id)->count()}} </h6>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
                @endif
                <?php $camp = App\Models\Camp::where('tempat_id',$tempatt->id)->get(); ?>
                @if(count($camp)>0)
                <div class="col-6 col-lg-3 col-md-6">
                    <a href="{{ route('camping.index') }}" >
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon green">
                                        <i class="fas fa-campground"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Camp</h6>
                                    <h6 class="font-extrabold mb-0"> {{App\Models\Camp::where('tempat_id', $tempatt->id)->count()}} </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>
                @endif
                <div class="col-6 col-lg-3 col-md-6">
                    <a href="{{ route('rekapw.index')}}" >
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon green">
                                        <i class="far fa-calendar-alt"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Rekap Data</h6>
                                    <h6 class="font-extrabold mb-0"> Pesanan</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <a href="{{ route('kegiatan.index')}}" >
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon red">
                                        <i class="fas fa-child"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Kegiatan</h6>
                                    <h6 class="font-extrabold mb-0"> Event</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>
                {{-- <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon green">
                                        <i class="far fa-building"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Tempat</h6>
                                    <h6 class="font-extrabold mb-0">{{App\Models\Tempat::where('induk_id',$tempatt->id)->count()}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}

            </div>
            <div class="row">

            </div>


        </div>
        <div class="col-12 col-lg-6">
            <div class="card" data-bs-toggle="modal" data-bs-target="#default">
                <div class="card-body py-4 px-5">
                    <div class="d-flex align-items-center">
                        <div class="avatar avatar-xl">

                            <img alt="Face 1" class="mr-3 rounded-circle" width="50" src="{{asset('images')}}/{{ Auth::user()->image}}">

                        </div>
                        <div class="ms-3 name">
                            <h5 class="font-bold">{{ Auth::user()->name }}</h5>
                        {{-- {{ $tempattt->name }} --}}
                        {{-- <a data-bs-toggle="modal" data-bs-target="#default"> Edit Info Admin</a>
                        <a data-bs-toggle="modal" data-bs-target="#password"> Edit Password</a> --}}
                         {{-- <a > Edit Info Admin</a> || <a data-bs-toggle="modal" data-bs-target="#password">Password</a> --}}
                            <h6 class="font-extrabold mb-0"> Petugas</h6>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <a href="{{ route('wisata.index') }}">
            <div class="card" >
                <div class="card-body py-4 px-5">
                    <div class="d-flex align-items-center">
                        <div class="avatar avatar-xl">
                            {{-- <img src="{{ URL::to('/images/'. Auth::user()->avatar) }}" alt="{{ Auth::user()->avatar }}"> --}}
                            <img alt="Face 1" class="mr-3 rounded-circle" width="50" src="{{asset('images')}}/{{ $tempat->image }}">
                            {{-- <img src="assets/images/faces/1.jpg" alt="Face 1"> --}}
                        </div>
                        <div class="ms-3 name">
                            <h5 > {{ $tempat->name }}</h5>


                            {{  $tempat->kategori  }},  {{  $tempat->name  }}
                            {{-- <h6 class="font-extrabold mb-0">  <a href=""></h6> --}}
                            {{-- <h6 class="font-extrabold mb-0"> Check</a></h6> --}}
                            {{-- <h6 class="text-muted mb-0">{{ Auth::user()->email }}</h6> --}}
                        </div>
                    </div>
                </div>
            </div>
        </a>
        </div>

        <!--Basic Modal -->
        <div class="modal fade text-left" id="default" tabindex="-1" aria-labelledby="myModalLabel1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel1">Update Profile</h5>
                        <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form class="form form-horizontal" action="{{route('profile.update',[Auth::user()->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Name</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" >
                                            <div class="form-control-icon">
                                                <i class="bi bi-person"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Email</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" >
                                            <div class="form-control-icon">
                                                <i class="bi bi-envelope"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Jenis Kelamin</label>
                                </div>

                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <fieldset class="form-group">

                                                <select class="form-select"  name="jk" required>
                                                    <option value=""    @if (Auth::user()->jk== null) selected @endif >Please select jk</option>
                                                    <option value="pria"  @if (Auth::user()->jk== "pria") selected @endif >Pria</option>
                                                    <option value="wanita"  @if (Auth::user()->jk== "wanita") selected @endif>Wanita</option>

                                                </select>
                                            </fieldset>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Photo</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-lefts">
                                        <div class="position-relative">
                                            <div class="form-control-icon avatar avatar.avatar-im">
                                                <img src="{{asset('images')}}/{{ Auth::user()->image }}">
                                            </div>
                                            <input type="file" class="form-control file-upload-info @error('image') is-invalid @enderror"  " placeholder="Upload Image" name="image">
                                            <span class="input-group-append">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Mobile</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="number" class="form-control" name="telp" value="{{ Auth::user()->telp }}" >
                                            <div class="form-control-icon">
                                                <i class="bi bi-phone"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label>Status</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">

                                            @if (auth()->user()->status == 1)
                                            <input type="text" class="form-control" value="Active"  readonly >
                                            @else
                                            <input type="text" class="form-control" value="Inactive"  readonly >
                                            @endif

                                            <div class="form-control-icon">
                                                <i class="fas fa-user-cog"></i>
                                                {{-- <i class="bi bi-bag-check"></i> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label>Alamat</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="text" class="form-control" name="alamat" value="{{ Auth::user()->alamat }}" >
                                            <div class="form-control-icon">

                                                <i class="far fa-map"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 d-flex justify-content-end">

                                    <a data-bs-toggle="modal" data-bs-target="#password"> <button class="btn btn-outline-secondary me-1 mb-1">Ganti Password </button></a>
                                    <button type="submit"
                                        class="btn btn-outline-primary me-1 mb-1">Update</button>
                                    {{-- <button type="reset"
                                        class="btn btn-light-secondary me-1 mb-1">Reset</button> --}}
                                </div>
                            </div>
                        </div>
                    </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!--Basic Modal -->
        <div class="modal fade text-left" id="password" tabindex="-1" aria-labelledby="myModalLabel1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel1">Update Password</h5>
                        <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form class="form form-horizontal" action="{{route('profile.update3',[Auth::user()->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Password Lama</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="password" class="form-control" name="current_password"  >

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Password Baru</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="password" class="form-control" name="new_password"  >

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Konfirmasi Password Baru</label>
                                </div>

                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="password" class="form-control" name="new_confirm_password">

                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit"
                                        class="btn btn-outline-primary me-1 mb-1">Update</button>
                                    {{-- <button type="reset"
                                        class="btn btn-light-secondary me-1 mb-1">Reset</button> --}}
                                </div>
                            </div>
                        </div>
                    </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="section-body">


        <div class="card">

          <div class="card-body">

                <div id="container"></div>
          </div>

        </div>
      </div>
      <a  href="{{ route('password.request') }}" > <button class="btn btn-outline-warning me-1 mb-1">Lupa Password </button></a>
</div>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<!-- Additional files for the Highslide popup effect -->
<script src="https://www.highcharts.com/samples/static/highslide-full.min.js"></script>
<script src="https://www.highcharts.com/samples/static/highslide.config.js" charset="utf-8"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">

    var users =  <?php echo json_encode($users) ?>;

    Highcharts.chart('container', {
        title: {
            text: {!! json_encode($tempatt->name) !!}
        },
        subtitle: {
            text:''
        },
         xAxis: {

            categories: {!! json_encode($datee) !!}

        },
        yAxis: {
            title: {
                text: ''
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },
        series: [{
            name: 'Pelanggan',
            data: users
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        },
        legend: {
            align: 'left',
            verticalAlign: 'top',
            borderWidth: 0
        },

        tooltip: {
            shared: true,
            crosshairs: true
        },
        plotOptions: {
            // DATA
            series: {
                cursor: 'pointer',
                point: {
                    events: {
                        click: function (e) {
                            hs.htmlExpand(null, {
                                pageOrigin: {
                                    x: e.pageX || e.clientX,
                                    y: e.pageY || e.clientY
                                },
                                headingText: this.series.name,
                                maincontentText: Highcharts.dateFormat( this.x) + ':<br/> ' +
                                    this.y +  ' antrian',
                                width: 200
                            });
                        }
                    }
                },
                marker: {
                    lineWidth: 1
                }
            }
        },
});
</script>
<canvas id="myChart" width="400" height="400"></canvas>
<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
@endsection
