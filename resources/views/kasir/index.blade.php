@extends('layouts.header')
<div class="container-fluid ">
    <div class="row">
        <div class="col-md-9 ">
            @include('kasir.menu')
        </div>
        <div class="col-md-3">
            @include('kasir.cart')
        </div>
    </div>

</div>
