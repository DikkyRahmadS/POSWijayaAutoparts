{{-- @extends('layouts.header')
<div class="container-fluid ">
    <div class="row">
        <div class="col-md-7 ">
            @include('kasir.menu')
        </div>
        <div class="col-md-5">
            @include('kasir.cart')
        </div>
    </div>

</div> --}}
@extends('layouts.header')
<nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top py 4 shadow sm">
    <div class="container">
        <a class="navbar-brand" href="#">Wijaya<span>Autoparts</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="input-group mx-auto">
                <input type="text" class="form-control" placeholder="Cari Barang...."
                    aria-label="Recipient's username" aria-describedby="button-addon2">
                <button class="btn btn-outline-info" type="button" id="button-addon2">
                    <i class='bx bx-search'></i>
                </button>
            </div>
            <div class="navbar-nav ms-auto">
                <a class="nav-link active" aria-current="page" href="#">
                    <i class='bx bxs-user-circle'> <span class="badge rounded-pill text-bg position-absolute">Nama
                            Karyawan</span></i>
                </a>
            </div>
        </div>
    </div>
</nav>

<div class="container menu-wrapper justify-content-center align-items-center">
    <div class="menu d-flex justify-content-center align-items-center">
        <a class="nav-link active" aria-current="page" href="#">All</a>
        <a class="nav-link" href="#">Dinamo</a>
        <a class="nav-link" href="#">Aki</a>
        <a class="nav-link" href="#">Busi</a>
    </div>
</div>

<div class="row">
    <div class="col-md-7">

        @include('kasir.menu')
    </div>
    <div class="col-md-5">

        @include('kasir.cart')
    </div>
</div>
