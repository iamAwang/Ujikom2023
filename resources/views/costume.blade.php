@extends('layouts.app')
@section('content')
@if ($message =
Session::get('success'))
<div class="alert alert-success d-flex align-items-center" role="alert">
    {{ $message }}
</div>
@endif
<div class="m-5">
<a class="btn btn-primary" href="{{route('createCostume')}}" style="margin-bottom: 25px">Tambah Kostum +</a>
<a class="btn btn-primary" href="{{route('home')}}" style="margin-bottom: 25px">Home</a>
    @php
        function rupiah($angka){
            $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
            return $hasil_rupiah;
        }
    @endphp
    <table class="table table-bordered" style="text-align: center">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kostum</th>
                <th>Harga</th>
                <th colspan="2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no=$costumes->firstItem()
            @endphp
            @foreach ($costumes as $costume)
            <tr>
                <td>{{$no}}</td>
                <td>{{$costume->name}}</td>
                <td>{{rupiah($costume->price)}}</td>
                <td><button class="badge text-bg-warning"><a href="{{route('editCostume',$costume->id)}}" style="text-decoration: none; color:white">Edit</a></button></td>
                <td><form action="{{route('deleteCostume',@$costume->id)}}" method="POST" onsubmit="return confirm('Are you sure you want to delete this costume?')">
                @csrf
                <button type="submit" class="badge text-bg-danger">Delete</button></td>
            </tr>
            @php
                $no++;
            @endphp
            @endforeach
    </tbody>
    </table>
  {{$costumes->Links()}}
</div>
@endsection