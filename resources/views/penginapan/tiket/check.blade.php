@extends('admin.layouts2.master')
@section('title','Check')
@section('content')
{{-- SCan --}}

<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>
<script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
{{-- <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" /> --}}


<link rel="stylesheet" href="{{ asset('assets/css/toastr.min.css') }}">
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/toastr.min.js') }}"></script>
{!! Toastr::message() !!}
@isset($cek)
<div class="row">
<div class="col-12 col-md-6 col-lg-6">
    <form action="{{url('/penginapan/checkp') }}" method="post">
        @csrf
        <div class="form-group">
            <h6>Checkin</h6>
            <div class="input-group">


                <input type="text" placeholder="Order id" class="form-control" id="order_id" name="order_id" value="@isset($default) {{ $default }} @endisset"/ required>
                <button class="btn btn-primary" type="submit" name="submit" value="todo" >Check</button>
            </div>
        </div>
        {{-- <button class="btn btn-success" type="submit" name="submit" value="table">Tabel</button> --}}

    </form>
</div>
<div class="col-md-6">
    <h6>Scan QR code</h6>
    <form action="{{url('/penginapan/checkp') }}" method="post">
        @csrf
        <div class="input-group">


            <input type="text" name="order_id" id="text" readonly="" placeholder="scan qrcode" class="form-control">
            <button class="btn btn-primary" type="submit" name="submit" value="todo" >Check</button>
        </div>
</form>
</div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <video id="preview" width="100%"></video>
        </div>
        <div class="col-md-6">

        </div>
    </div>
</div>
<div>
<script>
    let scanner = new Instascan.Scanner({ video: document.getElementById('preview')});
    Instascan.Camera.getCameras().then(function(cameras){
        if(cameras.length > 0 ){
            scanner.start(cameras[0]);
        } else{
            alert('No cameras found');
        }

    }).catch(function(e) {
        console.error(e);
    });

    scanner.addListener('scan',function(c){
        document.getElementById('text').value=c;
    });

 </script>
@endisset

@isset($kosong)

Kode tidak valid untuk tempat ini, coba cek invoice, atau hubungi admin
<a href="{{ route('checkp.index') }}" class='sidebar-link'>
    <i class="fas fa-clipboard-check"></i>
    <span>back</span>
</a>

@endisset


@isset ($data)
<section class="tasks">
<div class="row">
<div class="col-lg-7">
    <div class="card widget-todo">
        <div
            class="card-header border-bottom d-flex justify-content-between align-items-center">
            <h4 class="card-title d-flex">
                <i class="bx bx-check font-medium-5 pl-25 pr-75"></i> Order  {{ $id }}
            </h4>

        </div>
         <table class="table table-hover" id="admin">
            <thead>
                <tr >


                    <th scope="col">Name</th>
                    <th scope="col">Guest</th>
                    <th scope="col">Harga</th>
                    {{-- <th scope="col">Guest</th> --}}
                    {{-- <th scope="col">Status</th> --}}
                    <th scope="col"></th>
                </tr>
            </thead>
            {{-- @foreach ($data as $data) --}}
            <tbody
            <tr>
                <td class="col-5">Reservasi Penginapan</td>
                <td class="col-2"> {{ $db->jumlah_orang }}</td>
                <td class="col-3"> x {{ $data->harga }}</td>

                <td class="col-2">
                    @if ($data2->kedatangan == "0")
                    <i class="fas fa-times"></i>
                    @else
                    <i class="fas fa-check"></i>
                    @endif


                </td>
            </tr>
            {{-- @endforeach --}}
            </tbody>
        </table>

    </div>
</div>


<div class="col-lg-5">
    <div class="card widget-todo">
        <div
            class="card-header border-bottom d-flex justify-content-between align-items-center">
            <h4 class="card-title d-flex">
                <i class="bx bx-check font-medium-5 pl-25 pr-75"></i>{{$user->cust->name}}
            </h4>
            <i class="bx bx-check font-medium-5 pl-25 pr-75"></i>{{$user->cust->email}}

        </div>
        <div class="card-body px-0 py-1">
            <table class="table table-borderless">
                <tr>
                    <td class="col-10">
                    @if (!$pay == null )
                        @if ($pay->status_message == "settlement")


                            @if ($ck == 0)
                            Berhasil Dibayar
                            <a href="{{route('update.kedatanganp',[$id])}}"><button class="btn btn-outline-success"> Check In</button></a>
                            @elseif ($ck == 1)
                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            <a href="{{route('update.kedatanganp2',[$id])}}"><button class="btn btn-outline-warning"> Check Out</button></a>
                            @elseif ($ck == 2)

                             <button class="btn disabled btn-primary">   Selesai</button>
                            @endif


                        @elseif ($pay->status_message =="pending")
                        <a href="{{url('bayar/status',[$tiket->kode])}}"><button class="btn btn-warning">Menunggu Dibayar</button>
                        @elseif ($pay->status_message == null)

                        @elseif ($pay->status_message == "expire")
                        <button class="btn btn-danger"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Expire &nbsp; &nbsp; &nbsp; &nbsp;</button>
                        @elseif ($pay->status_message == "cancel")
                        <button class="btn btn-danger"> &nbsp; &nbsp;  &nbsp;Dibatalkan&nbsp; &nbsp; &nbsp; </button>
                        @endif
                    @else
                    Belum dibayar
                    @endif

                    <td class="col-6">
                        {{-- <button class="btn btn-success">Berhasil a</button> --}}
                        {{-- <div class="progress progress-info">
                            <div class="progress-bar" role="progressbar" style="width: 60%"
                                aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                        </div> --}}
                    </td>
                    <td class="col-3 text-center">


                    </td>
                </tr>

            </table>
        </div>
    </div>
</div>

</div>
<div class="col">
    <div class="card widget-todo">
        <div
            class="card-header border-bottom d-flex justify-content-between align-items-center">
            <h4 class="card-title d-flex">
                <i class="bx bx-check font-medium-5 pl-25 pr-75"></i>
            </h4>

                <table class="table table-hover" id="admin">
                    <thead>
                        <tr >
                            <th></th>

                            <th scope="col">Kamar </th>
                            <th scope="col">Check In</th>
                            <th scope="col">Check Out</th>
                            {{-- <th scope="col">Guest</th> --}}
                            <th scope="col">Status</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($db2 as $key => $value)
                        <tr>
                            <td>
                                <br>
                            </td>
                            <td>
                                {{ App\Models\Kamar::where('kode_kamar',$value->kamar_id)->pluck('name')->first() }}
                                {{-- {{  $value->kamar_id}}   x {{ $value->jumlah_kamar }} --}}
                            </td>
                            <td>
                                {{ $value->checkin }}
                            </td>
                            <td>
                                {{ $value->checkout }}
                            </td>
                            {{-- <td>
                                {{ $value->jumlah_orang }}
                            </td> --}}
                            <td>
                                @if ($value->status == 0)
                               Belum datang
                                 {{-- <button class="btn disabled btn-info">Belum datang</button> --}}
                                 @elseif ($value->status == 1)
                             Check In
                                 {{-- <button class="btn disabled btn-primary">Check In</button> --}}
                                 @elseif ($value->status == 2)
                                Check Out
                                 {{-- <button class="btn disabled btn-danger">Check Out</button> --}}
                                 @endif
                            </td>
                            <td>

                            </td>



                        </tr>
                        @endforeach




                    </tbody>
                </table>

        </div> <table class="table table-borderless">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; System
            <tr>

                <td scope="col"> Checkinn ( {{ $db->checkinn}} )</td>
                <td scope="col">  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td scope="col"> Checkoutt ( {{  $db->checkoutt }} )</td>



            </tr>


        </table>

    </div>
</div>
</section>
@endisset


@endsection
