@extends('layouts.app')
@section('content')
@php
    function rupiah($angka){
        $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
        return $hasil_rupiah;
    }
@endphp

<div class="m-5">
    <form action="<?php @$edit!=null? printf(route('updateCostume',[$edit->id])) : printf(route('storeCostume'))?>" method="POST">
        @csrf
        <div class="form-floating mb-3" >
            <input type="text" class="form-control" id="floatingInput" placeholder="nama kostum" name="name" value="<?php if(@$edit!=null) printf($edit->name)?>"/>
            <label for="floatingInput">Judul Kostum</label>
        </div>
        <div class="form-floating mb-3" >
            <input type="number" class="form-control" id="floatingInput" placeholder="harga kostum" name="price" value="<?php if(@$edit!=null) printf($edit->price)?>"/>
            <label for="floatingInput">Harga Kostum</label>
        </div>
        <button type="submit" class="btn btn-secondary btn-lg" style="float: right;">Tambahkan</button>
        <button type="submit" class="btn btn-secondary btn-lg" style="float: left"><a href="{{route('indexCostume')}}" style="text-decoration: none; color: white">Kembali</a></button>
    </form>
</div>
@endsection