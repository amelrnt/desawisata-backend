@extends('admin.layouts2.master')
@section('title','Kamar')
@section('content')

<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>
<link rel="stylesheet" href="{{ asset('assets/css/toastr.min.css') }}">
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/toastr.min.js') }}"></script>

{!! Toastr::message() !!}

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Kamar</h3>
                <p class="text-subtitle text-muted">Halaman untuk mengelola data Kamar</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">

                        <li class="breadcrumb-item">    <a href="{{route('kamar.create')}}" class="btn btn-outline-primary "> <i class="fas fa-plus"></i>Tambah Kamar</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-right">

        </ol>
    </nav>
</div>
@if(!count($kamar)>0)
<div class="card">
    <div class="card-body">
    Tidak ada kamar di tempat ini, silahkan menambahkan kamar :)
    <div class="card-body">
</div>
@else
@foreach($kamar as $key=>$kamar)

<div class="row">
    <div class="col-md-6">

                <div class="card">
                    <div class="card-content">
                        <img class="card-img-top img-fluid" src="{{asset('images')}}/{{$kamar->image}}"
                            alt="Card image cap" style="height: 20rem" />

                        <div class="card-body">
                            <h4 class="card-title">{{ $kamar->name }}</h4>
                            {{ $kamar->deskripsi }}

                            <small class="breadcrumb breadcrumb-right"  >
                                @if($kamar->harga==0)
                                Free
                                @else
                                <a class="btn disabled  btn-outline-primary" href="#" >harga: Rp. {{  number_format($kamar->harga) }}</a>

                                @endif
                            </small>
                            <p class="card-text">

                            </p>
                            {{-- <button class="btn btn-primary block">Update now</button> --}}
                        </div>
                    </div>
                </div>
            </div>
    <div class="col-md-5">
        <div class="card-content">

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Detail kamar</h4>
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            @if($kamar->status==1)
                            <a href="{{route('update.status.kamar',[$kamar->id])}}"><button class="btn btn-warning"> Active</button></a>
                            @else
                            <a href="{{route('update.status.kamar',[$kamar->id])}}"><button class="btn btn-danger"> Inactive</button></a>
                            @endif
                        </ol>
                    </nav>
                </div>

                    <div class="card-body">



                        <form class="form form-horizontal" action="{{route('kamar.update',[$kamar->id])}} " method="POST" enctype="multipart/form-data">
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
                                            <input type="name" class="form-control" name="name"
                                                placeholder="Name" id="name" value="{{ $kamar->name }}" required>
                                            <div class="form-control-icon">
                                                <i class="bi bi-person"></i>
                                            </div>
                                        </div>
                                    </div>
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }} </div>
                                    @enderror
                                </div>


                                <div class="col-md-4">
                                    <label>Photo</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-lefts">
                                        <div class="position-relative">
                                            {{-- <div class="form-control-icon avatar avatar.avatar-im">
                                                <img src="{{asset('images')}}/{{$users->image}}">
                                            </div> --}}
                                            <input type="file" class="form-control file-upload-info @error('image') is-invalid @enderror"  " placeholder="Upload Image" name="image">
                                            <span class="input-group-append">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Deskripsi </label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="text" class="form-control" id="deskripsi" name="deskripsi"
                                                placeholder="deskripsi"  value="{{ $kamar->deskripsi }}"  >
                                            <div class="form-control-icon">
                                                <i class="far fa-file-alt"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label>Harga</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="text" class="form-control" id="harga" name="harga"
                                                placeholder="harga"  value="{{ $kamar->harga }}"  >
                                            <div class="form-control-icon">
                                                <i class="fas fa-dollar-sign"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Desc Harga </label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="text" class="form-control" id="deskripsi" name="deskripsi_harga"
                                                placeholder="deskripsi"  value="{{ $kamar->deskripsi_harga }}"  >
                                            <div class="form-control-icon">
                                                <i class="far fa-file-alt"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-mb-4">
                                    <br>
                                </div>



                                <div class="col-12 d-flex ">
                                    <button type="submit"
                                        class="btn btn-primary me-1 mb-1">Update</button>
                                    <button type="reset"
                                        class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                </div>
                            </div>

                        </div>

                    </form>
                    <form class="forms-sample col-12 d-flex justify-content-end" action="{{route('kamar.destroy',[$kamar->id])}}" method="post" >
                        @csrf
                        @method('DELETE')

                            <button type="submit" class="btn bt-danger"    onclick="return confirm('Are you sure to want to delete it?')"><i class="bi bi-trash"></i></span> </button>


                    </form>

                    </div>

            </div>
        </div>
    </div>
    </div>

@endforeach
@endif










@endsection
