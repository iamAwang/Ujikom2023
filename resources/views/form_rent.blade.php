@extends('layouts.app')
@section('content')

@php
    function rupiah($angka){
        $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
        return $hasil_rupiah;
    }
@endphp

<div class="m-5">
</div>
<form action="<?php @$edit!=null? printf(route('updateRent',[$edit->id])) : printf(route('storeRent'))?>" method="POST">
    @csrf
    <div class="form-floating">
        <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="costume" value="<?php if(@$edit!=null) printf($edit->costume)?>">
        <option selected>Pilih Kostum</option>
        @foreach ($costumes as $costume)
            @if (@$edit->costume->id == $costume->id)
                <option value="{{$costume->id}}" selected>{{$costume->name}}</option>
            @else
                <option value="{{$costume->id}}">{{$costume->name}}</option>
            @endif
        @endforeach
        </select>
        <label for="floatingSelect">Pilih Kostum</label>
    </div>
    <br>
    <div class="form-floating mb-3" >
        <input type="text" class="form-control" id="floatingInput" placeholder="nama penyewa" name="name" value="<?php if(@$edit!=null) printf($edit->name)?>"/>
        <label for="floatingInput">Nama Penyewa</label>
    </div>
    <div class="form-floating mb-3" >
        <input type="date" class="form-control" id="floatingInput" onfocus="this.showPicker()" placeholder="tanggal sewa" name="date" value="<?php if(@$edit!=null) printf($edit->date)?>"/>
        <label for="floatingInput">Tanggal Sewa</label>
    </div>
    <div class="form-floating mb-3" >
        <input type="number" class="form-control" id="floatingInput" placeholder="jumlah hari sewa" name="day" value="<?php if(@$edit!=null) printf($edit->day)?>"/>
        <label for="floatingInput">Jumlah Hari Sewa</label>
    </div>
    <button type="submit" class="btn btn-secondary btn-lg" style="float: right;">Tambahkan</button>
    <button type="submit" class="btn btn-secondary btn-lg" style="float: left"><a href="{{route('indexCostume')}}" style="text-decoration: none; color: white">Kembali</a></button>
</form>
@endsection